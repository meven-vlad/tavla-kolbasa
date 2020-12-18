<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AddTypeIblocks20201218142754880421 extends BitrixMigration
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
            'ID'=>'info',
            'SECTIONS'=>'Y',
            'IN_RSS'=>'N',
            'SORT'=>100,
            'LANG'=>Array(
                'ru'=>Array(
                    'NAME'=>'Информация',
                    'SECTION_NAME'=>'Разделы',
                    'ELEMENT_NAME'=>'Элементы'
                    )
                )
            );

        $obBlocktype = new \CIBlockType;
        $res = $obBlocktype->Add($arFields);
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
