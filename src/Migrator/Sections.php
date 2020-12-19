<?php

namespace Meven\Migrator;


class Sections
{
    /**
     * @var \CIBlockSection
     */
    private $sec;
    /**
     * @var string
     */
    public $active;
    /**
     * @var id
     */
    private $iblock;
    /**
     * @var string
     */
    private $name;
    /**
     * @var false
     */
    public $iblocksectionid;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $code;

    /**
     * Sections constructor.
     * @param int $iblock
     * @param string $name
     */
    public function __construct(int $iblock, string $name)
    {
        $this->active = 'Y';
        $this->iblock = $iblock;
        $this->name = $name;
        $this->iblocksectionid = false;
        $this->description = '';

        $arParams = ["replace_space" => "_", "replace_other" => "_"];
        $this->code = \Cutil::translit($this->name, "ru", $arParams);
    }

    /**
     * @return array
     */
    public function getFromArray(): array
    {
        return [
            "ACTIVE" => $this->active,
            "IBLOCK_SECTION_ID" => $this->iblocksectionid,
            "IBLOCK_ID" => $this->iblock,
            "CODE" => $this->code,
            "NAME" => $this->name,
            "SORT" => 500,
            "DESCRIPTION" => $this->description,
        ];
    }

    public static function create(array $section)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $sec = new \CIBlockSection;

        return $sec->Add($section);
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
