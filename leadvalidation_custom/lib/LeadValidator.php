<?php
namespace Custom;

use Bitrix\Main\Loader;


class LeadValidator
{
    /**
     * Функция валидации поля
     * @param $fields - набор полей лида
     * @return bool | false - предотвращение сохранения (ошибка) | true - корректно поведение
     */
    public static function validateIdentifier(&$fields)
    {
        // Код пользовательского поля
        $fieldIdentifier = $fields[FIELD_IDENTIFIER];

        // Проверка соответствия заданному формату
        if (empty($fieldIdentifier) || !preg_match('/^[a-z]{4}-\d{4}$/', mb_strtolower($fieldIdentifier))) {
            $fields['RESULT_MESSAGE'] = 'Значение поля «Идентификатор» не задано или задано неверно!';
            return false;
        }
        return true;
    }
}
