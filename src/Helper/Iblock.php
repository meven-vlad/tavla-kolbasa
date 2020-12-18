<?php
namespace Meven\Helper;

class Iblock
{
    const MODULE_ID = 'meven.info';

    public function __construct()
    {

    }

    // Установка id инфоблока
    public static function setIblockId(string $code, int $iblockId): void
    {
        \Bitrix\Main\Config\Option::set(self::MODULE_ID, $code, $iblockId);
    }

    // Получение id инфоблока
    public static function getIblockId(string $code): int
    {
        return (int) \Bitrix\Main\Config\Option::get(self::MODULE_ID, $code);
    }
}
