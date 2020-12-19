<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class CreateForms20201219133357815443 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $arFields = Array(
            'ID'=>'forms',
            'SECTIONS'=>'Y',
            'IN_RSS'=>'N',
            'SORT'=>100,
            'LANG'=>Array(
                'ru'=>Array(
                    'NAME'=>'Формы',
                    'SECTION_NAME'=>'Разделы',
                    'ELEMENT_NAME'=>'Элементы'
                )
            )
        );

        $obBlocktype = new \CIBlockType;
        $res = $obBlocktype->Add($arFields);

        $banner = new \Meven\Migrator\Iblocks("Форма");
        $banner->code = 'form';
        $banner->type = 'forms';
        $id = $banner->create();

        $prop1 = new \Meven\Migrator\Props($id, 'Имя');
        $prop1->code = 'NAME';
        $arrProp = $prop1->getPropArray();
        $arrProp['REQUIRED'] = 'Y';
        \Meven\Migrator\Props::createProp($arrProp);

        $prop1 = new \Meven\Migrator\Props($id, 'Телефон');
        $prop1->code = 'PHONE';
        $arrProp = $prop1->getPropArray();
        $arrProp['REQUIRED'] = 'Y';
        \Meven\Migrator\Props::createProp($arrProp);
    }

    /**
     * Reverse the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function down()
    {
        //
    }
}
