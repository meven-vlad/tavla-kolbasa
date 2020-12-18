<?php


namespace Meven\Migrator;


class Props
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
    public $listType;
    /**
     * @var string
     */
    public $multiple;
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
     * @var array
     */
    private $values;

    /**
     * Migrator constructor.
     * @param int $iblock
     * @param string $name
     * @throws \Bitrix\Main\LoaderException
     */
    public function __construct(int $iblock, string $name)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $this->sort = 500;
        $this->active = 'Y';
        $this->type = 'S';
        $this->listType = 'L';
        $this->multiple = 'N';
        $this->iblock = $iblock;
        $this->name = $name;

        $arParams = ["replace_space" => "-", "replace_other" => "-"];
        $this->code = strtoupper(\Cutil::translit($this->name, "ru", $arParams));
    }

    /**
     * @return array
     */
    public function getPropArray(): array
    {
        $result = [
            'IBLOCK_ID' => $this->iblock,
            'NAME' => $this->name,
            'SORT' => $this->sort,
            'CODE' => $this->code,
            'ACTIVE' => $this->active,
            'PROPERTY_TYPE' => $this->type,
            'LIST_TYPE' => $this->listType,
            'MULTIPLE' => $this->multiple
        ];

        if (!empty($this->values)) {
            $result['VALUES'] = $this->values;
        }

        return $result;
    }

    /**
     * @param array $array
     */
    public static function createProp(array $array)
    {
        $ibp = new \CIBlockProperty();
        $ibp->Add($array);
    }


    /**
     * @param array $list
     */
    public function addList(array $list)
    {
        foreach ($list as $key => $l) {
            $this->values[] = [
                'VALUE' => $l,
                'DEF' => 'N',
                'SORT' => ($key + 1) * 100
            ];
        }
    }


    /**
     * @param string $name
     * @param int $iblock
     * @return int|null
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getPropFromName(string $name, int $iblock): ?int
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $prop = \Bitrix\Iblock\PropertyTable::getList(
            [
                'filter' => ['NAME' => $name, 'IBLOCK_ID' => $iblock],
                'select' => ['ID']
            ]
        )->fetch();

        return $prop['ID'];
    }


    /**
     * @param string $code
     * @param int $iblock
     * @return int|null
     */
    public static function getPropFromCode(string $code, int $iblock): ?int
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $prop = \Bitrix\Iblock\PropertyTable::getList(
            [
                'filter' => ['CODE' => $code, 'IBLOCK_ID' => $iblock],
                'select' => ['ID']
            ]
        )->fetch();

        return $prop['ID'];
    }

    /**
     * @param int $id
     * @throws \Bitrix\Main\LoaderException
     */
    public static function delete(int $id): void
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        \CIBlockProperty::Delete($id);
    }
}
