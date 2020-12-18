<?php
namespace Meven\Helper;

class Migrator
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
        $this->code = 'randcode'.rand(100,999);
    }

    /**
     * @return array
     */
    public function getPropArray(): array
    {
        return [
            'IBLOCK_ID' => $this->iblock,
            'NAME' => $this->name,
            'SORT' => $this->sort,
            'CODE' => $this->code,
            'ACTIVE' => $this->active,
            'PROPERTY_TYPE' => $this->type,
            'LIST_TYPE' => $this->listType,
            'MULTIPLE' => $this->multiple
        ];
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

        $iblock = \Bitrix\Iblock\IblockTable::getList([
              'filter' => ['NAME' => $name, 'LID' => $siteid],
              'select' => ['ID']
        ])->fetch();

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

        $iblock = \Bitrix\Iblock\IblockTable::getList([
              'filter' => ['CODE' => $code, 'LID' => $siteid],
              'select' => ['ID']
        ])->fetch();
   
        return $iblock['ID'];
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

        $prop = \Bitrix\Iblock\PropertyTable::getList([
            'filter' => ['NAME' => $name, 'IBLOCK_ID' => $iblock],
            'select' => ['ID']
        ])->fetch();

        return $prop['ID'];
    }

    /**
     * @param int $id
     * @throws \Bitrix\Main\LoaderException
     */
    public static function deleteProp(int $id): void
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        \CIBlockProperty::Delete($id);
    }
}
