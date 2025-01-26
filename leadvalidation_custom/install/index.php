<?php
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\EventManager;

class leadvalidation_custom extends CModule
{
    public $MODULE_ID = 'leadvalidation_custom';
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;

    public function __construct()
    {
        $this->MODULE_NAME = 'Валидация поля лида';
        $this->MODULE_DESCRIPTION = 'Валидация поля лида';
    }

    public function DoInstall()
    {
        global $APPLICATION;
        $this->InstallFiles();
        $this->InstallDB();
        RegisterModule($this->MODULE_ID);

        // Регистрируем обработчики событий
        $eventManager = EventManager::getInstance();
        $eventManager->registerEventHandler(
            'crm',
            'OnBeforeCrmLeadAdd',
            $this->MODULE_ID,
            'Custom\\LeadValidator',
            'validateIdentifier',
			1
        );
        $eventManager->registerEventHandler(
            'crm',
            'OnBeforeCrmLeadUpdate',
            $this->MODULE_ID,
            'Custom\\LeadValidator',
            'validateIdentifier',
			1
        );

		return true;
    }

    public function DoUninstall()
    {
        global $APPLICATION;
        $this->UnInstallFiles();
        $this->UnInstallDB();

        // Отменяем регистрацию обработчиков событий
        $eventManager = EventManager::getInstance();
        $eventManager->unRegisterEventHandler(
            'crm',
            'OnBeforeCrmLeadAdd',
            $this->MODULE_ID,
            'Custom\\LeadValidator',
            'validateIdentifier'
        );
        $eventManager->unRegisterEventHandler(
            'crm',
            'OnBeforeCrmLeadUpdate',
            $this->MODULE_ID,
            'Custom\\LeadValidator',
            'validateIdentifier'
        );

        UnRegisterModule($this->MODULE_ID);
        
		return true;
    }

    public function InstallFiles()
    {
        return true;
    }

    public function UnInstallFiles()
    {
        return true;
    }

    public function InstallDB()
    {
        return true;
    }

    public function UnInstallDB()
    {
        return true;
    }
}
