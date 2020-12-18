<?php


namespace Meven\Migrator;


class Iblocks
{
    /**
     * @var int
     */
    public $sort;
    /**
     * @var string
     */
    public $active;
    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $code;
    /**
     * @var string
     */
    public $iblock;
    /**
     * @var string
     */
    public $name;

    /**
     * Migrator constructor.
     * @param int $iblock
     * @param string $name
     * @throws \Bitrix\Main\LoaderException
     */
    public function __construct(string $name)
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $this->name = $name;
        $this->sort = 500;
        $this->active = 'Y';
        $this->type = 'Info';

        $arParams = ["replace_space"=>"-", "replace_other"=>"-"];
        $this->code = \Cutil::translit($this->name, "ru", $arParams);
    }

    public function create()
    {
        $ib = new \CIBlock;

        $arAccess = ["2" => "R"];

        $arFields = [
            "ACTIVE" => $this->active,
            "NAME" => $this->name,
            "CODE" => $this->code,
            "IBLOCK_TYPE_ID" => $this->type,
            "SITE_ID" => 's1',
            "SORT" => $this->sort,
            "GROUP_ID" => $arAccess,
            "FIELDS" => [
                "CODE" => [
                    "IS_REQUIRED" => "Y", // Обязательное
                    "DEFAULT_VALUE" => [
                        "UNIQUE" => "Y", // Проверять на уникальность
                        "TRANSLITERATION" => "Y", // Транслитерировать
                        "TRANS_LEN" => "30", // Максмальная длина транслитерации
                        "TRANS_CASE" => "L", // Приводить к нижнему регистру
                        "TRANS_SPACE" => "-", // Символы для замены
                        "TRANS_OTHER" => "-",
                        "TRANS_EAT" => "Y",
                        "USE_GOOGLE" => "N",
                    ],
                ],
                "SECTION_CODE" => [
                    "IS_REQUIRED" => "Y",
                    "DEFAULT_VALUE" => [
                        "UNIQUE" => "Y",
                        "TRANSLITERATION" => "Y",
                        "TRANS_LEN" => "30",
                        "TRANS_CASE" => "L",
                        "TRANS_SPACE" => "-",
                        "TRANS_OTHER" => "-",
                        "TRANS_EAT" => "Y",
                        "USE_GOOGLE" => "N",
                    ],
                ],
            ],
            "LIST_PAGE_URL" => "#SITE_DIR#/catalog/",
            "SECTION_PAGE_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/",
            "DETAIL_PAGE_URL" => "#SITE_DIR#/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
        ];

        $id = $ib->Add($arFields);
        
        \Bitrix\Main\Config\Option::set("meven.info", "iblock_".$this->code, $id);

        return $id;
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
    public static function getIblockFromName(string $name, string $siteid): ?int
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $iblock = \Bitrix\Iblock\IblockTable::getList(
            [
                'filter' => ['NAME' => $name, 'LID' => $siteid],
                'select' => ['ID']
            ]
        )->fetch();

        return $iblock['ID'];
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
    public static function getIblockFromCode(string $code, string $siteid): ?int
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $iblock = \Bitrix\Iblock\IblockTable::getList(
            [
                'filter' => ['CODE' => $code, 'LID' => $siteid],
                'select' => ['ID']
            ]
        )->fetch();

        return $iblock['ID'];
    }

    public static function delete(int $id): void
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        \CIBlock::Delete($id);
    }
}
