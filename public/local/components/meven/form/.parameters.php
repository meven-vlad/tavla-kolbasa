<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if(!CModule::IncludeModule('iblock')) return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array();
$rsIBlock = CIBlock::GetList( array('sort' => 'asc'), array('TYPE' => $arCurrentValues['IBLOCK_TYPE'], 'ACTIVE' => 'Y') );
while($arr = $rsIBlock->Fetch()){
	$arIBlock[$arr['ID']] = '['.$arr['ID'].'] '.$arr['NAME'];
}

$arComponentParameters = array(
	'GROUPS' => array(
		'IBLOCK_PARAMS' => array(
			'SORT' => 110,
			'NAME' => GetMessage('IBLOCK_PARAMS'),
		),
		'FORM_PARAMS' => array(
			'SORT' => 120,
			'NAME' => GetMessage('FORM_PARAMS'),
		),
		'BUTTON_PARAMS' => array(
			'SORT' => 130,
			'NAME' => GetMessage('BUTTON_PARAMS'),
		),
	),
	'PARAMETERS' => array(
		'AJAX_MODE' => array(),
		'IBLOCK_TYPE' => array(
			'PARENT' => 'IBLOCK_PARAMS',
			'NAME' => GetMessage('BN_P_IBLOCK_TYPE'),
			'TYPE' => 'LIST',
			'VALUES' => $arIBlockType,
			'REFRESH' => 'Y',
		),
		'IBLOCK_ID' => array(
			'PARENT' => 'IBLOCK_PARAMS',
			'NAME' => GetMessage('BN_P_IBLOCK'),
			'TYPE' => 'LIST',
			'VALUES' => $arIBlock,
			'REFRESH' => 'Y',
			'ADDITIONAL_VALUES' => 'Y',
		),
		'CACHE_TIME' => array('DEFAULT' => '3600'),
		"CACHE_GROUPS" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BNL_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
		'SUCCESS_MESSAGE' => array(
			'PARENT' => 'FORM_PARAMS',
			'NAME' => GetMessage('SUCCESS_MESSAGE'),
			'TYPE' => 'STRING',
			'DEFAULT' => GetMessage('DEFAULT_SUCCESS_MESSAGE'),
		),
		'SEND_BUTTON_NAME' => array(
			'PARENT' => 'BUTTON_PARAMS',
			'NAME' => GetMessage('SEND_BUTTON_NAME'),
			'TYPE' => 'STRING',
			'DEFAULT' => GetMessage('DEFAULT_SEND_BUTTON_NAME'),
		),
		'SEND_BUTTON_CLASS' => array(
			'PARENT' => 'BUTTON_PARAMS',
			'NAME' => GetMessage('SEND_BUTTON_CLASS'),
			'TYPE' => 'STRING',
			'DEFAULT' => 'btn btn-primary',
		),
		'DISPLAY_CLOSE_BUTTON' => array(
			'PARENT' => 'BUTTON_PARAMS',
			'NAME' => GetMessage('DISPLAY_CLOSE_BUTTON'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
			'REFRESH' => 'Y',
		),
		'SHOW_LICENCE' => array(
			'PARENT' => 'BUTTON_PARAMS',
			'NAME' => GetMessage('SHOW_LICENCE'),
			'TYPE' => 'CHECKBOX',
			'DEFAULT' => 'Y',
		),
		'LICENCE_TEXT' => array(
			'PARENT' => 'BUTTON_PARAMS',
			'NAME' => GetMessage('LICENCE_TEXT'),
			'TYPE' => 'STRING',
			'DEFAULT' => 'btn btn-primary',
		),
	)
);

if($arCurrentValues['DISPLAY_CLOSE_BUTTON'] == 'Y'){
	$arComponentParameters['PARAMETERS']['CLOSE_BUTTON_NAME'] = array(
		'PARENT' => 'BUTTON_PARAMS',
		'NAME' => GetMessage('CLOSE_BUTTON_NAME'),
		'TYPE' => 'STRING',
		'DEFAULT' => GetMessage('DEFAULT_CLOSE_BUTTON_NAME'),
	);
	$arComponentParameters['PARAMETERS']['CLOSE_BUTTON_CLASS'] = array(
		'PARENT' => 'BUTTON_PARAMS',
		'NAME' => GetMessage('CLOSE_BUTTON_CLASS'),
		'TYPE' => 'STRING', 
		'DEFAULT' => 'btn btn-primary',
	);
}
?>