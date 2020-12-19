<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class FeaturesMain20201219105832443654 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Фичи на главной");
        $banner->code = 'features-on-main';
        $banner->type = 'info';
        $id = $banner->create();

        $prop1 = new \Meven\Migrator\Props($id, 'Название картинки');
        $prop1->code = 'PICTURE';
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Миссия компании",
            "CODE"              => "mission",
            "PROPERTY_VALUES"   => [
                'PICTURE' => 'p-1.svg',
            ],
            "PREVIEW_TEXT" => "Улучшение качества жизни"
        ];
        $el->Add($arLoadProductArray);


        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Стратегия",
            "CODE"              => "strategy",
            "PROPERTY_VALUES"   => [
                'PICTURE' => 'p-2.svg',
            ],
            "PREVIEW_TEXT" => "Делать продукт с качеством немного выше цены"
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Принципы",
            "CODE"              => "princip",
            "PROPERTY_VALUES"   => [
                'PICTURE' => 'p-3.svg',
            ],
            "PREVIEW_TEXT" => "Развитие, улучшение, доступность"
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Ценности",
            "CODE"              => "cenn",
            "PROPERTY_VALUES"   => [
                'PICTURE' => 'p-4.svg',
            ],
            "PREVIEW_TEXT" => "Человек, его потребности и безопасность"
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
        $id = \Meven\Migrator\Iblocks::getIblockFromCode('features-on-main', 's1');
        \Meven\Migrator\Iblocks::delete($id);
    }
}
