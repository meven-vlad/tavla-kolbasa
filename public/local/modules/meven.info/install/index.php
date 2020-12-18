<?
use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\Config\Option,
	Bitrix\Main\EventManager,
	Bitrix\Main\Application,
	Bitrix\Main\IO\Directory;

IncludeModuleLangFile(__FILE__);

Class meven_info extends CModule{ 

	const MODULE_ID = 'meven.info';
	var $MODULE_ID = 'meven.info'; 
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $strError = '';

	function __construct(){
		$arModuleVersion = array();
		include(dirname(__FILE__)."/version.php");
		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME = GetMessage("meven.info_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("meven.info_MODULE_DESC");
		$this->PARTNER_NAME = GetMessage("meven.info_PARTNER_NAME"); 
		$this->PARTNER_URI = GetMessage("meven.info_PARTNER_URI"); 
	}

	function InstallDB(){
		return true;
	}

	function UnInstallDB(){
		return true;
	}

	function InstallEvents()
	{
		EventManager::getInstance()->registerEventHandlerCompatible(
            "meven.form",
            "OnAfterRatingSend",
            $this->MODULE_ID,
            "Meven\Event\EventUser",
            "userRatingUpdate"
        );
		return true;
	}

	function UnInstallEvents()
	{
		EventManager::getInstance()->unRegisterEventHandler(
            "meven.form",
            "OnAfterRatingSend",
            $this->MODULE_ID,
            "Meven\Event\EventUser",
            "userRatingUpdate"
        );
		return true;
	}
	

	

	function InstallFiles($arParams = array()){
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/local/modules/'.self::MODULE_ID.'/install/components')){
			if ($dir = opendir($p)){
				while (false !== $item = readdir($dir)){
					if ($item == '..' || $item == '.')
						continue;
					CopyDirFiles($p.'/'.$item, $_SERVER['DOCUMENT_ROOT'].'/local/components/'.$item, $ReWrite = True, $Recursive = True);
				}
				closedir($dir);
			}
		}
		return true;
	}

	function UnInstallFiles(){
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/local/modules/'.self::MODULE_ID.'/install/components')){
			if ($dir = opendir($p)){
				while (false !== $item = readdir($dir)){
					if ($item == '..' || $item == '.' || !is_dir($p0 = $p.'/'.$item))
						continue;

					$dir0 = opendir($p0);
					while (false !== $item0 = readdir($dir0))
					{
						if ($item0 == '..' || $item0 == '.')
							continue;
						DeleteDirFilesEx('/local/components/'.$item.'/'.$item0);
					}
					closedir($dir0);
				}
				closedir($dir);
			}
		}
		return true;
	}
	
	function DoInstall(){
		$this->InstallFiles();
		RegisterModule(self::MODULE_ID);
		$this->InstallDB();
		$this->InstallEvents();
	}
	
	function DoUninstall(){
		UnRegisterModule(self::MODULE_ID);
		$this->UnInstallDB();
		$this->UnInstallFiles();
		$this->UnInstallEvents();
	}
}
?>
