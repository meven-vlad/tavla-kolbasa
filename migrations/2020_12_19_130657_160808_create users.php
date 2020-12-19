<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class CreateUsers20201219130657160808 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Колбасеры");
        $banner->code = 'kolbas-master';
        $banner->type = 'info';
        $iblockId = $banner->create();

        $prop1 = new \Meven\Migrator\Props($iblockId, 'Должность');
        $prop1->code = "POSITION";
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $prop1 = new \Meven\Migrator\Props($iblockId, 'Email');
        $prop1->code = "EMAIL";
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "Клюкина Ольга",
            "CODE"              => "klukina1",
            "PROPERTY_VALUES"   => [
                'POSITION' => 'Заведующая производством',
                'EMAIL' => 'info@tavla.ru',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/worker.jpg"),
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "Клюкина1 Ольга",
            "CODE"              => "klukina12",
            "PROPERTY_VALUES"   => [
                'POSITION' => 'Заведующая производством',
                'EMAIL' => 'info1@tavla.ru',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/worker.jpg"),
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "Клюкина13 Ольга",
            "CODE"              => "klukina123",
            "PROPERTY_VALUES"   => [
                'POSITION' => 'Заведующая производством',
                'EMAIL' => 'info112@tavla.ru',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/worker.jpg"),
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
