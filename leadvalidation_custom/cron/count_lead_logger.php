<?php

// Указываем корневой путь
$_SERVER["DOCUMENT_ROOT"] = dirname(__DIR__, 4);
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Loader;

// Подключаем модуль CRM
Loader::includeModule('crm');

// Получаем общее количество лидов
$leadCount = \CCrmLead::GetListEx([], [])->SelectedRowsCount();

// Используем текущую папку для записи лога
$logFile = __DIR__ . '/lead_count.log';

// Формируем строку для записи
$logEntry = date('Y-m-d H:i:s') . " - Кол-во лидов: " . $leadCount . PHP_EOL;

// Записываем в файл
file_put_contents($logFile, $logEntry, FILE_APPEND);

echo "Обновление лога: " . $logEntry;
