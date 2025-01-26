<?php

// Код поля для проверки
define('FIELD_IDENTIFIER', 'YOUR_ID_FIELD_HERE');

use Bitrix\Main\Loader;

\Bitrix\Main\Loader::registerAutoLoadClasses(
    'leadvalidation_custom',
    [
        'Custom\\LeadValidator' => 'lib/LeadValidator.php',
    ]
);

?>
