<?php
namespace Meven\Migrator;


class Sections
{
    /**
     * @param string $name
     * @param string $siteid
     * @return int
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getIdFromName(string $name): ?int
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $iblock = \Bitrix\Iblock\SectionTable::getList(
            [
                'filter' => ['NAME' => $name],
                'select' => ['ID']
            ]
        )->fetch();

        return $iblock['ID'];
    }

    public static function deleteFromName(string $name)
    {
        $id = self::getIdFromName($name);
        \CIBlockSection::Delete($id);
    }

    /**
     * @param string $name
     * @param string $siteid
     * @return int
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getIdFromCode(string $code): ?int
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $iblock = \Bitrix\Iblock\SectionTable::getList(
            [
                'filter' => ['CODE' => $code],
                'select' => ['ID']
            ]
        )->fetch();

        return $iblock['ID'];
    }
}
