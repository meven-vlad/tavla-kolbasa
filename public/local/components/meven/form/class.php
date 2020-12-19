<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use Bitrix\Main\Loader,
	Bitrix\Main\Localization\Loc,
    Bitrix\Main\Application, 
    Bitrix\Main\Request, 
	Bitrix\Main\Data\Cache,
	Bitrix\Main\Config\Option;

Loc::loadLanguageFile(__FILE__);

Loader::includeModule('iblock');

class midowForm extends CBitrixComponent
{

	private static $error = [];
	protected $request = null;
	protected static $siteId = null;
	protected static $bCache = null;
	protected static $cacheId = null;
	protected static $token = "";
    protected static $proxyIP = '173.249.43.105:3128';
    protected static $secretKeyGoogle = '';
	private static $instance = null;
	
	public function onPrepareComponentParams($params)
	{
		return $params;
	}

	protected function getCache()
	{
		$request = $this->request;

		if (!isset($this->arParams["CACHE_TIME"]))
		{
			$this->arParams["CACHE_TIME"] = 0;
		}
		$bcache = false;

		if (
			!( !empty( $request->getPost("form_submit") ) || $request->getPost('formresult') == 'ADDOK') &&
			!( $this->arParams["CACHE_TYPE"] == "N" || ( $this->arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "N" ) ||
			( $this->arParams["CACHE_TYPE"] == "Y" && intval($this->arParams["CACHE_TIME"]) <= 0 ))
		)
		{
			$bcache = true;
		}

		return $bcache;
	}

	private function checkBlock($id)
	{

		if ($id > 0)
		{
			$this->arResult["F_RIGHT"] = \CIBlock::GetPermission($id);

			if( $this->arResult["F_RIGHT"] == "D" ){
				self::$error[] = "FORM_ACCESS_DENIED";
			}		
		}
		else
		{			
			self::$error[] = "FORM_NOT_FOUND";
		}
	}

	protected function checkEmailTemplates()
	{
		$arResult = &$this->arResult;
		$arResult["EVENT_TYPE"] = "MIDOW_SEND_FORM";

		$eventDesc = $eventDescAdmin = $messBody = $messBodyAdmin = '';
		if (is_array($arResult["QUESTIONS"]))
		{
			foreach ($arResult["QUESTIONS"] as $FIELD_CODE => $arQuestion)
			{
				$eventDesc .= $arQuestion["NAME"].": "."#".$FIELD_CODE."#\n";
				if ($arQuestion["FIELD_TYPE"] == "html")
				{
					$messBody .= $arQuestion["NAME"].":\n"."#".$FIELD_CODE."#\n";
				}
				else
				{
					$messBody .= $arQuestion["NAME"].": "."#".$FIELD_CODE."#\n";
				}
			}
		}

		$eventDesc .= Loc::getMessage("FORM_ET_DESCRIPTION");
		$eventDescAdmin = $eventDesc.Loc::getMessage("FORM_ET_DESCRIPTION_ADMIN");

		$event_name = $arResult["EVENT_TYPE"]."_".$this->arParams["IBLOCK_ID"];
		$arEvent = CEventType::GetByID( $event_name, $arResult["SITE"]["LANGUAGE_ID"] )->Fetch();

		if (!is_array($arEvent))
		{
			$et = new CEventType;
			$arEventFields = array(
				"LID" => $arResult["SITE"]["LANGUAGE_ID"],
				"EVENT_NAME" => $event_name,
				"NAME" => Loc::getMessage("FORM_ET_NAME")." \"".$arResult["IBLOCK_TITLE"]."\"",
				"DESCRIPTION" => $eventDesc,
			);

			$et->Add($arEventFields);
			$arEventFields["LID"] = ($arResult["SITE"]["LANGUAGE_ID"] == 'ru' ? 'en' : 'ru');
			$et->Add($arEventFields);
		}

		$arMess = CEventMessage::GetList( $arResult["SITE"]["ID"], $order="desc", array( "TYPE_ID" => $event_name ) )->Fetch();
		if (!is_array($arMess))
		{
			$em = new CEventMessage;
			$arMess = array();
			$arMess["ID"] = $em->Add( array(
				"ACTIVE" => "Y",
				"EVENT_NAME" => $event_name,
				"LID" => array( $arResult["SITE"]["LID"] ),
				"EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
				"EMAIL_TO" => "#EMAIL#",
				"BCC" => "",
				"SUBJECT" => Loc::getMessage("FORM_EM_NAME"),
				"BODY_TYPE" => "text",
				"MESSAGE" => Loc::getMessage("FORM_EM_START").$messBody.Loc::getMessage("FORM_EM_END"),
			) );
			$arMess["EVENT_NAME"] = $event_name;
		}
		$this->arMess = $arMess;
		$this->arEvent = $arEvent;
	}

	protected function cacheProp($result = array()) {
		if( self::$bCache ){
			$this->obFormCache->startDataCache();

			if (empty($result))
				$this->obFormCache->abortDataCache();

			$this->obFormCache->endDataCache(
				array(
					"arResult" => $result,
				)
			);
		}
	}

	protected function getProps() {
		$arResult = &$this->arResult;
		$iblock = \CIBlock::GetList( false, array( "ID" => $this->arParams["IBLOCK_ID"] ) )->Fetch();
		$arResult["IBLOCK_CODE"] = $iblock["CODE"];
		$arResult["IBLOCK_TITLE"] = $iblock["NAME"];
		$arResult["IBLOCK_DESCRIPTION"] = $iblock["DESCRIPTION"];
		$arResult["IBLOCK_DESCRIPTION_TYPE"] = $iblock["DESCRIPTION_TYPE"];

		if($iblock['IBLOCK_TYPE_ID']){
			$arResult["IBLOCK_TYPE_STRING"] = \CIBlockType::GetByID($iblock['IBLOCK_TYPE_ID'])->Fetch();
		}

		$rsProp = CIBlock::GetProperties( $this->arParams["IBLOCK_ID"], array( "SORT"=> "ASC" ) , array("ACTIVE" => "Y", "SORT" <= "10000"));
		while( $arProp = $rsProp->Fetch() ){
			$arResult["arQuestions"][] = $arProp;
		}

		if(is_array($arResult["arQuestions"])){
			foreach( $arResult["arQuestions"] as $key => $arQuestion ){
				$tmp = array(
					"NAME" => $arQuestion["NAME"],
					"CODE" => $arQuestion["CODE"],
					"IS_REQUIRED" => $arQuestion["IS_REQUIRED"],
					"HINT" => $arQuestion["HINT"],
					"DEFAULT" => $arQuestion["DEFAULT_VALUE"],
					"ICON" => $arQuestion["XML_ID"],
					"SORT" => $arQuestion["SORT"]
				);
				
				if( $arQuestion["PROPERTY_TYPE"] == "S" && empty( $arQuestion["USER_TYPE"] ) ){
					$tmp["FIELD_TYPE"] = "text";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "E" ){
					$propertyCode = $arQuestion['CODE'];
					$tmp["FIELD_TYPE"] = "elements";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "S" && !empty( $arQuestion["USER_TYPE"] ) && $arQuestion["USER_TYPE"] == "Date" ){
					$tmp["FIELD_TYPE"] = "date";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "S" && !empty( $arQuestion["USER_TYPE"] ) && $arQuestion["USER_TYPE"] == "DateTime" ){
					$tmp["FIELD_TYPE"] = "datetime";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "S" && !empty( $arQuestion["USER_TYPE"] ) && $arQuestion["USER_TYPE"] == "HTML" ){
					$tmp["FIELD_TYPE"] = "html";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "N" ){
					$tmp["FIELD_TYPE"] = "integer";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "L" && $arQuestion["LIST_TYPE"] == "L" ){
					$tmp["FIELD_TYPE"] = "list";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "L" && $arQuestion["LIST_TYPE"] == "C" ){
					$tmp["FIELD_TYPE"] = "checkbox";
				}elseif( $arQuestion["PROPERTY_TYPE"] == "F" ){
					$tmp["FIELD_TYPE"] = "file";
				}else{
					continue;
				}

				$tmp["MULTIPLE"] = $arQuestion["MULTIPLE"];

				if( $tmp["FIELD_TYPE"] != 'checkbox' ){
					$tmp["CAPTION"] = '<label for="'.$arQuestion["CODE"].'">'.$arQuestion["NAME"].': '.($arQuestion["IS_REQUIRED"] == "Y" ? '<span class="required-star">*</span>' : '').'</label>';
				}

				$arResult["QUESTIONS"][$arQuestion["CODE"]] = $tmp;
			}
		}


		$this->cacheProp($arResult);
	}

	private function action() {
		$bVarsFromCache = false;

		$this->checkBlock($this->arParams["IBLOCK_ID"]);

		//$this->sendForm();	

		$this->getProps();
	}

	public function testCaptcha()
	{
		$key = "03AOLTBLQ0ZNWDMhjpOXX_RQDl4gn8L2AkepaKTgIDfZA4upfo8DG83PrRJ9Fpyru-3VXCWflA25pLpWapDr1ojAE_glyzdda9FHPNTDUqjVPHQZ3f_fWbBcmqX_FBrNOg479JK0_DTWLbtew54fd8j5CsPa8y0XU16iVwjPrUm4vgkCGvVc0gIxtP2fdOXcQiEzuOfXOqrLnSvYh7YYnViLT8j6wopKQdRbz8soeAunXp7FSNfsEj8QbgeZ7VEpn4s_8rDSKvkysKSbjwaoRuhN1cohk5rtflNs1WZMSdxXy-JxwruRyrHbtby17ryzcDo_6L6ja7RvwI";
		$successCaptcha = $this->checkGoogleCaptcha($request['g-recaptcha-response']);

		return $successCaptcha;
	}

	protected function submit()
	{
		global $APPLICATION;

		$arResult = &$this->arResult;
		$request = $this->request;
		$requestList = $this->request->getPostList()->toArray();

		/*
		if ($arResult["CAPTCHA_TYPE"] != "NONE")
		{
			if($arResult["CAPTCHA_TYPE"] == "IMG" && ( empty( $request->getPost("captcha_word") ) || !$APPLICATION->CaptchaCheckCode( $request->getPost("captcha_word"), $request->getPost("captcha_sid") ) ) )
			{
				self::$error[] = Loc::getMessage("FORM_CAPTCHA");
				$captcha_error = true;
			}
			elseif($arResult["CAPTCHA_TYPE"] == "HIDE" && strlen($_REQUEST["nspm"]))
			{
				self::$error[] = Loc::getMessage("FORM_CAPTCHA");
				$captcha_error = true;
			}
		}

		if (self::$secretKeyGoogle != "")
		{
			if ($request->getPost('g-recaptcha-response') != "")
			{
				$successCaptcha = $this->checkGoogleCaptcha($request->getPost('g-recaptcha-response'));			
				$resultCaptcha = json_decode($successCaptcha, true);
				if ($resultCaptcha['success'] != 1) {
					self::$error[] = Loc::getMessage("FORM_CAPTCHA");
				}			
			}
			else
			{
				self::$error[] = Loc::getMessage("FORM_CAPTCHA");
			}
		}
		*/

		if ($this->arParams['USE_CAPTCHA'] == 'Y')
		{
			if (strlen($this->request["captcha_word"]) < 1 && strlen($this->request["captcha_sid"]) < 1)
			{
				self::$error[] = Loc::getMessage('MEVEN_MSG_CAPTCHA_EMPRTY');
			}
			elseif (!$APPLICATION->CaptchaCheckCode(
				$this->request["captcha_word"],
				$this->request["captcha_sid"])
			)
			{
				self::$error[] = Loc::getMessage('MEVEN_MSG_CAPTCHA_WRONG');
			}
		}

		if (is_array($_REQUEST))
		{
			foreach ($_REQUEST as $code => $value)
			{
				if ($arResult["QUESTIONS"][$code]["FIELD_TYPE"] == "html")
				{
					$_REQUEST[$code] = array( "VALUE" => array ("TEXT" => $value, "TYPE" => $arResult["QUESTIONS"][$code]["FIELD_TYPE"]) );
				}
				elseif ($arResult["QUESTIONS"][$code]["FIELD_TYPE"] == "date")
				{
					$_REQUEST[$code] = array("VALUE" => str_replace(array('-', '/', ' ', ':'), array('.', '.', '.', '.'), $value));
				}
				elseif ($arResult["QUESTIONS"][$code]["FIELD_TYPE"] == "datetime")
				{
					$arDateTime = explode(' ', $value);
					$_REQUEST[$code] = array("VALUE" => str_replace(array('-', '/', ' ', ':'), array('.', '.', '.', '.'), $arDateTime[0]).' '.str_replace(array('-', '/', ' ', ':'), array(':', ':', ':', ':'), $arDateTime[1]));
				}
			}
		}

		$arPropFields = $_REQUEST;

		if (is_array($_FILES))
		{
			foreach ($arResult["QUESTIONS"] as $FIELD_CODE => $arQuestion)
			{
				if ($arQuestion["FIELD_TYPE"] === 'file')
				{
					$bMultiple = $arQuestion["MULTIPLE"] === "Y";
					$arFiles = array();
					if (isset($_FILES[$FIELD_CODE]) && !$bMultiple)
					{
						$arFiles[$FIELD_CODE] = $_FILES[$FIELD_CODE];
					}
					elseif (isset($_FILES[$FIELD_CODE.'_n1']) && $bMultiple)
					{
						foreach ($_FILES as $key => $arFile)
						{
							if (is_numeric(str_replace(array($FIELD_CODE, '_', 'n'), '', $key))){
								$arFiles[$key] = $_FILES[$key];
							}
						}
					}

					if ($arFiles)
					{
						foreach ($arFiles as $key => $arFile)
						{
							if ($arFile['name'])
							{
								if ($arFile['error'])
								{
									self::$error[] = Loc::getMessage('FORM_FILE_UPLOAD_ERROR').$arFile['name'];
								}
								else
								{
									$code = explode('_', $key);
									$tmp = $code[$cntCode - 1];
									$arPropFields[$FIELD_CODE][($tmp ? $tmp : count($arPropFields[$FIELD_CODE]))] = $arFile;
								}
							}
						}
					}
				}
			}
		}

		if (is_array($arResult["QUESTIONS"]))
		{
			foreach ($arResult["QUESTIONS"] as $FIELD_CODE => $arQuestion){
				if (empty($arPropFields[$FIELD_CODE]) && $arQuestion["IS_REQUIRED"] == "Y" )
				{
                    $arResult["QUESTIONS"][$FIELD_CODE]["error"] = Loc::getMessage("FORM_REQUIRED_INPUT").$arQuestion["NAME"];
					self::$error[] = Loc::getMessage("FORM_REQUIRED_INPUT").$arQuestion["NAME"];
				}
				elseif (strtolower($arQuestion["CODE"])  == "email")
				{
					if (!filter_var($arPropFields[$FIELD_CODE], FILTER_VALIDATE_EMAIL))
					{
                        self::$error[] = Loc::getMessage("FORM_EMAIL_ERROR");
                        $arResult["QUESTIONS"][$FIELD_CODE]["error"] = Loc::getMessage("FORM_EMAIL_ERROR");
                    }
				}
				elseif
				($arQuestion['FIELD_TYPE'] == 'html' && $arQuestion["IS_REQUIRED"] == "Y" && empty($arPropFields[$FIELD_CODE]['VALUE']['TEXT']))
				{
                    $arResult["QUESTIONS"][$FIELD_CODE]["error"] = Loc::getMessage("FORM_REQUIRED_INPUT").$arQuestion["NAME"];
                    self::$error[] = Loc::getMessage("FORM_REQUIRED_INPUT").$arQuestion["NAME"];
                }
			}
		}

		if (count(self::$error) <= 0)
		{
			//if( check_bitrix_sessid() ){
            $el = new CIBlockElement;

			$arFields = array(
				"IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
				"ACTIVE" => "Y",
				"NAME" => Loc::getMessage("DEFAULT_NAME").ConvertTimeStamp(),
				"PROPERTY_VALUES" => $arPropFields,
			);

			if ($RESULT_ID = $el->Add($arFields))
			{
				$arResult["FORM_RESULT"] = "ADDOK";
				$arFields["result"] = $RESULT_ID;


				$arEventFields = array(
					"SITE_NAME" => $arResult["SITE"]["NAME"],
					"FORM_NAME" => $arResult["IBLOCK_TITLE"],
					"ADMIN_RESULT_URL" => (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].'/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='.$arParams['IBLOCK_ID'].'&type='.$arResult["IBLOCK_TYPE_STRING"]['ID'].'&ID='.$RESULT_ID.'&lang='.$arResult["SITE"]["LANGUAGE_ID"].'&find_section_section=0&WF=Y',
				);

				if(is_array($arResult["QUESTIONS"])){
					foreach( $arResult["QUESTIONS"] as $FIELD_CODE => $arQuestion ){
						if($arQuestion["FIELD_TYPE"] == "list"){
							$arEventFields[$FIELD_CODE] = $arQuestion["ENUMS"][$arQuestion["VALUE"]];
						}
						else{
							$arEventFields[$FIELD_CODE] = $arQuestion["VALUE"];
						}
					}

				}

				if (self::$token != "") {
					$textTG = "";
					if ($arParams['TG_NAME'] != "") {
	                    $textTG .= $arParams['TG_NAME']."\r\n";
	                } else {
	                    $textTG = "NEW EVENT \r\n";
	                }


	                foreach ($arPropFields as $kfieldT=>$fieldT) {
					    if (strlen($fieldT) > 2 && array_key_exists($kfieldT, $arResult["QUESTIONS"])) {
	                        $textTG .= $kfieldT.": ".$fieldT."\r\n";
	                    } elseif(isset($fieldT['VALUE']['TEXT']) && $fieldT['VALUE']['TEXT'] != "") {
	                    	$textTG .= $kfieldT.": ".$fieldT['VALUE']['TEXT']."\r\n";
	                    }
	                }

	                $this->sendMessage(62305003, $textTG);
				}
				
                $arEventFields = array_merge($arPropFields, $arEventFields);

				\Bitrix\Main\Mail\Event::send(array(
					'EVENT_NAME' =>$this->arMess["EVENT_NAME"],
					"LID" => self::$siteId,
					"C_FIELDS" => $arEventFields,
				));

			} else {
				self::$error[] = $el->LAST_ERROR;
			}
			//}
		}
	}

	private function checkGoogleCaptcha($key) {
		$secret = self::$secretKeyGoogle;
		$post = "secret=".$secret."&response=".$key;
		$result = $this->useCurl('https://www.google.com/recaptcha/api/siteverify', false, $post);

		return $result;
	}

	protected function useCurl($url, $proxy = false, $post = false) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url");
        if ($proxy) {
        	curl_setopt($ch, CURLOPT_PROXY, self::$proxyIP);	
        }
        if ($post) {
        	curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function sendMessage($chatId, $text) {
        $text = urlencode($text);
        $url = "https://api.telegram.org/bot".self::$token."/sendMessage?disable_web_page_preview=true&chat_id=".$chatId."&text=".$text;
        return $this->useCurl($url, true);
    }

	protected function prepareProp() {
		$arResult = &$this->arResult;

		global $USER;

		if ( is_array($arResult["QUESTIONS"]) ) {
			foreach ( $arResult["QUESTIONS"] as $FIELD_CODE => $arQuestion ) {

				if(isset($this->request[$FIELD_CODE])){
					$val = !empty( $this->request[$FIELD_CODE] ) ? $this->request[$FIELD_CODE] : $arQuestion["DEFAULT"];
					if(!is_array($val)){
						$val = htmlspecialchars($val, (ENT_COMPAT | ENT_HTML401), LANG_CHARSET);
					}
				}
				elseif($arQuestion["FIELD_TYPE"] === "file"){
					$val = $valFile = $arQuestion["DEFAULT"];
					if($arQuestion["MULTIPLE"] == "Y"){
						$valFile = array('n0' => $arQuestion["DEFAULT"], 'n1' => $arQuestion["DEFAULT"], 'n2' => $arQuestion["DEFAULT"], 'n3' => $arQuestion["DEFAULT"]);
					}
				} elseif ($USER->IsAuthorized() && $arQuestion["CODE"] == "NAME") {
					$val = $USER->GetFullName();
				} elseif ($USER->IsAuthorized() && $arQuestion["CODE"] == "PHONE") {
					$rsUser = \CUser::GetList($by, $order, array("ID" => $USER->GetID()));
			        if($arUser = $rsUser->Fetch()) {
			            $val = $arUser["PERSONAL_PHONE"];
			        }
				}

				$required = $arQuestion["IS_REQUIRED"] == "Y" ? 'required' : '';
				$phone = strpos( $arQuestion["CODE"], "PHONE" ) !== false ? 'phone' : '';
				$placeholder = $this->arParams["IS_PLACEHOLDER"] == "Y" ? 'placeholder="'.$arQuestion["NAME"].'"' : '';
				$icon = !empty( $arQuestion["ICON"] ) ? '<i class="fa '.$arQuestion["ICON"].'"></i>' : '';
				$html = '';
				$hidden = false;
				if (strpos($arQuestion["CODE"], 'HIDDEN') !== false)
					$hidden = true;

				switch ( $arQuestion["FIELD_TYPE"] ):

					case "text":
	                    $html = '<input type="'.( $arQuestion["CODE"] == "EMAIL" ? "email" : "text" ).'" id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].'" class="form-control '.$required.' '.$phone.'" '.$placeholder.' value="'.$val.'" />'.$icon;
	                    break;

					case "integer":
						$html = '<input type="number" id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].'" class="form-control '.$required.'" '.$placeholder.' value="'.$val.'" />'.$icon;
						break;

					case "date":
						$html = '<input type="text" id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].'" class="form-control date '.$required.'" '.$placeholder.' value="'.$val.'" />'.$icon;
						break;

					case "datetime":
						$html = '<input type="text" id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].'" class="form-control datetime '.$required.'" '.$placeholder.' value="'.$val.'" />'.$icon;
						break;

					case "html":
						$cur_val = (isset($val['TEXT']) ? $val['TEXT'] : $val);
						$html = '<textarea id="'.$arQuestion["CODE"].'" rows="3" name="'.$arQuestion["CODE"].'" class="form-control '.$required.'" '.$placeholder.'>'.$cur_val.'</textarea>'.$icon;
						break;

					case "list":
						$rsValue = CIBlockProperty::GetPropertyEnum( $arQuestion["CODE"], array("SORT" => "ASC"), array("IBLOCK_ID" => $this->arParams["IBLOCK_ID"]));
						$multiple = $arQuestion["MULTIPLE"] == "Y" ? ' multiple ' : '';
						$html = '<select id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].($arQuestion["MULTIPLE"] == "Y" ? '[]' : '').'" class="form-control '.$required.'" '.$multiple.$placeholder.'>';
						while( $arValue = $rsValue->Fetch() ){
							$selected = '';
							if( !empty( $val ) && (!is_array($val) ? ($arValue["ID"] == $val) : (in_array($arValue["ID"], $val))) ){
								$selected = 'selected="selected"';
							}
							if( empty( $val ) && $arValue["DEF"] == "Y" ){
								$selected = 'selected="selected"';
							}
							$html .= '<option value="'.$arValue["ID"].'" '.$selected.' >'.$arValue["VALUE"].'</option>';
							$arResult["QUESTIONS"][$FIELD_CODE]["ENUMS"][$arValue["ID"]] = $arValue["VALUE"];
						}
						$html .= '</select>'.$icon;
						break;

					case "checkbox":
						$html = '';
						$rsValue = CIBlockProperty::GetPropertyEnum( $arQuestion["CODE"], array( "SORT" => "ASC", "ID" => "ASC" ), array("IBLOCK_ID" => $this->arParams["IBLOCK_ID"]));
						$count = 0;
						while( $arValue = $rsValue->Fetch() ){
							$count++;
						}
						$rsValue = CIBlockProperty::GetPropertyEnum( $arQuestion["CODE"], array( "SORT" => "ASC", "ID" => "ASC" ), array("IBLOCK_ID" => $this->arParams["IBLOCK_ID"]) );
						while( $arValue = $rsValue->Fetch() ){
							$artmpValue = $arValue;
							$checked = '';
							if( !empty( $val ) && (!is_array($val) ? ($arValue["ID"] == $val) : (in_array($arValue["ID"], $val))) ){
								$checked = 'checked="checked"';
							}
							if( empty( $val ) && $arValue["DEF"] == "Y" ){
								$checked = 'checked="checked"';
							}
							$html .= '<input class="'.$required.'" id="'.$arValue["ID"].'" name="'.$arQuestion["CODE"].($arQuestion["MULTIPLE"] == "Y" ? '[]' : '').'" type="checkbox" value="'.$arValue["ID"].'" '.$checked.' />';
							if( $count == 1 ){
								$html .= '<label for="'.$arValue["ID"].'">'.$arQuestion["NAME"].'</label>';
							}else{
								$html .= '<label for="'.$arValue["ID"].'">'.$arValue["VALUE"].'</label><br />';
							}
						}
						break;

					case "file":
						if( $arQuestion["MULTIPLE"] == "Y" ){
							$html = '';
							for( $i = 0; $i < 4; ++$i ){
								$html .= '<input type="file" id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].'_n'.$i.'" '.$required.' '.$placeholder.' class="inputfile" value="'.$valFile['n'.$i].'" />'.$icon;
							}
						}else{
							$html = '<input type="file" id="'.$arQuestion["CODE"].'" name="'.$arQuestion["CODE"].'" '.$required.' '.$placeholder.' class="inputfile" value="'.$valFile.'" />'.$icon;
						}
						break;

				endswitch;

				$arResult["QUESTIONS"][$FIELD_CODE]["HIDDEN"] = $hidden;
				$arResult["QUESTIONS"][$FIELD_CODE]["VALUE"] = $val;
				$arResult["QUESTIONS"][$FIELD_CODE]["HTML_CODE"] = $html;

				unset($val);

			}
		}
	}

	protected function finalAction()
	{
		global $APPLICATION;

		$context = Application::getInstance()->getContext();
		$request = $context->getRequest();
		$this->request = $request;
		self::$siteId = $this->getSiteId();
		$componentName = "midowForm";

		self::$bCache = $this->getCache();

		if (self::$bCache)
		{
			global $USER;
			if($this->arParams["CACHE_GROUPS"] == "Y")
				$arCacheParams["USER_GROUPS"] = $USER->GetGroups();

			$obFormCache = Cache::createInstance();
			$cacheId = self::$siteId."|".$componentName."|".md5(serialize($arCacheParams));
			self::$cacheId = $cacheId;

			$cachePath = "/".self::$siteId.CComponentEngine::MakeComponentPath( $componentName );

			if (self::$bCache && $obFormCache->InitCache($this->arParams["CACHE_TIME"], $cacheId, $cachePath))
			{
				$arCacheVars = $obFormCache->GetVars();
				$bVarsFromCache = true;

				$this->arResult = $arCacheVars["arResult"];
				$this->arResult["FORM_NOTE"] = "";
				$this->arResult["isFormNote"] = "N";
			}
			else
			{
				$this->obFormCache = $obFormCache;
				$this->action();
			}
		}
		else
		{
			$this->action();
		}

		$this->prepareProp();

		if ($request->getPost("form_submit") == "Y")
		{
			$this->checkEmailTemplates();

			$this->submit();
		}

		$this->arResult["ERRORS"] = self::$error;

        if ($this->arParams['USE_CAPTCHA'] == 'Y')
		{
            $this->arResult['CAPTCHA_CODE'] = $this->captchaInclude();
		}

		$this->includeComponentTemplate();
	}

    protected function captchaInclude()
    {
        include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
        $cpt = new CCaptcha();
        $captchaPass = Option::get("main", "captcha_password", "");

		if (strlen($captchaPass) <= 0)
		{
            $captchaPass = randString(10);
            Option::set("main", "captcha_password", $captchaPass);
        }

		$cpt->SetCodeCrypt($captchaPass);
		
		$captchaCode = htmlspecialchars($cpt->GetCodeCrypt());

        return $captchaCode;
    }

	public function executeComponent()
	{
		$this->finalAction();
	}

}
