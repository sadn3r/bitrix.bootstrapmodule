<?php

use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class bitrix_bootstrapmodule extends CModule
{

    public function __construct()
    {
        $arModuleVersion = [];
        include __DIR__ . '/version.php';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_ID = str_replace("_", ".", self::class);
        $this->MODULE_NAME = Loc::getMessage($this->MODULE_ID . '_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage($this->MODULE_ID . '_MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';
        $this->PARTNER_NAME = Loc::getMessage($this->MODULE_ID . '_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage($this->MODULE_ID . '_MODULE_PARTNER_URI');
    }

    public function isCompatible(): bool
    {
        return CheckVersion(ModuleManager::getVersion("main"), '14.00.00');
    }

    public function DoInstall()
    {
        global $APPLICATION;

        if ($this->isCompatible()) {
            $this->InstallFiles();
            $this->InstallDB();
            ModuleManager::registerModule($this->MODULE_ID);
            $this->InstallEvents();
        } else {
            $APPLICATION->ThrowException(Loc::getMessage($this->MODULE_ID . '_INSTALL_ERROR_VERSION'));
        }

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage($this->MODULE_ID . '_INSTALL_TITLE') . " \"" . Loc::getMessage($this->MODULE_ID . '_MODULE_NAME') . "\"",
            __DIR__ . "/step.php"
        );

    }

    public function DoUninstall()
    {
        global $APPLICATION;

        $this->UnInstallEvents();
        $this->UnInstallFiles();
        $this->UnInstallDB();
        ModuleManager::unRegisterModule($this->MODULE_ID);

        $APPLICATION->IncludeAdminFile(
            Loc::getMessage($this->MODULE_ID . '_UNINSTALL_TITLE') . " \"" . Loc::getMessage($this->MODULE_ID . '_MODULE_NAME') . "\"",
            __DIR__ . "/unstep.php"
        );
    }

    public function InstallFiles()
    {

    }

    public function UnInstallFiles()
    {

    }

    public function InstallDB()
    {

    }

    public function UnInstallDB()
    {
        Option::delete($this->MODULE_ID);
    }

    public function InstallEvents()
    {

    }

    public function UnInstallEvents()
    {

    }
}
