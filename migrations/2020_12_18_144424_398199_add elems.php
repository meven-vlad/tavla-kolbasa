<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AddElems20201218144424398199 extends BitrixMigration
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

        global $USER;
        $iblockId = \Meven\Migrator\Iblocks::getIblockFromCode('banner-top', 's1');

        $prop2 = new \Meven\Migrator\Props($iblockId, 'Надпись на ссылке');
        $arrProp2 = $prop2->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp2);

        $prop1 = new \Meven\Migrator\Props($iblockId, 'Ссылка');
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "Тавла - то что мы едим",
            "CODE"              => "tavla2",
            "PROPERTY_VALUES"   => [
                'LINK' => '/',
                'NAME_LINK' => 'Скачать презентация',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/slide-1.jpg"),
            "PREVIEW_TEXT" => "Тавла - то что мы едим"
        ];
        $el->Add($arLoadProductArray);


        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "Тавла - то что мы едим",
            "CODE"              => "tavla1",
            "PROPERTY_VALUES"   => [
                'LINK' => '/',
                'NAME_LINK' => 'Скачать презентация',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/slide-2.jpg"),
            "PREVIEW_TEXT" => "Тавла - то что мы едим 1"
        ];
        $el->Add($arLoadProductArray);
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
