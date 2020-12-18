<?php
namespace Meven\Info;

use Bitrix\Main\PhoneNumber\Format;
use Bitrix\Main\PhoneNumber\Parser;

class Metods
{

    // сохраняем телефон
    public static function getPhone(string $phone)
    {
        $phone = Metods::sanitizer($phone);
        return $phone;
    }

    //sanitizer
    public static function sanitizer($phone)
    {
        $parsedPhone = Parser::getInstance()->parse($phone);
        if (!$parsedPhone->isValid()) {
            throw new \Bitrix\Main\SystemException('Некорректный телефон');
        }
        $resPhone = $parsedPhone->format(Format::NATIONAL);
        return $resPhone;
    }
}
