<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AddCatalog20201219112412734533 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Каталог");
        $banner->code = 'catalog';
        $banner->type = 'info';
        $id = $banner->create();

        $prop1 = new \Meven\Migrator\Props($id, 'Вес');
        $prop1->code = 'WEIGHT';
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $prop1 = new \Meven\Migrator\Props($id, 'Состав');
        $prop1->code = 'STRUCTURE';
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $prop1 = new \Meven\Migrator\Props($id, 'Пищевая ценность в 100 г продукта (среднее значение):');
        $prop1->code = 'PISH_VAL';
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $prop1 = new \Meven\Migrator\Props($id, 'Энергетическая ценность/калорийность:');
        $prop1->code = 'CALLOR';
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);

        $section = new Meven\Migrator\Sections($id, 'Колбасная продукция');
        $arr = $section->getFromArray();
        $id1 = Meven\Migrator\Sections::create($arr);

        $section = new Meven\Migrator\Sections($id, 'Замороженная продукция');
        $arr = $section->getFromArray();
        $id2 = Meven\Migrator\Sections::create($arr);

        $section = new Meven\Migrator\Sections($id, 'Свинина и говядина');
        $arr = $section->getFromArray();
        $id3 = Meven\Migrator\Sections::create($arr);


        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => $id1,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Колбаса Краковская по-тавлински",
            "CODE"              => "krakov1",
            "PROPERTY_VALUES"   => [
                'WEIGHT' => '150 г',
                'STRUCTURE' => 'свинина, говядина, мясо птицы, шпик, нитритно-посолочная смесь (соль, фиксатор окраски Е250), сахар-песок, чеснок, пряности (перец черный, перец душистый), регулятор кислотности (Е451), усилитель вкуса и аромата (Е621)',
                'PISH_VAL' => 'белок—14,0 г, жир—41,0 г',
                'CALLOR' => '1926 кДж/460 ккал.',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-1.png"),
            "DETAIL_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-2.png"),
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => $id1,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Колбаса Краковская по-тавлински",
            "CODE"              => "krakov2",
            "PROPERTY_VALUES"   => [
                'WEIGHT' => '150 г',
                'STRUCTURE' => 'свинина, говядина, мясо птицы, шпик, нитритно-посолочная смесь (соль, фиксатор окраски Е250), сахар-песок, чеснок, пряности (перец черный, перец душистый), регулятор кислотности (Е451), усилитель вкуса и аромата (Е621)',
                'PISH_VAL' => 'белок—14,0 г, жир—41,0 г',
                'CALLOR' => '1926 кДж/460 ккал.',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-2.png"),
            "DETAIL_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-2.png"),
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => $id1,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Колбаса Краковская по-тавлински",
            "CODE"              => "krakov3",
            "PROPERTY_VALUES"   => [
                'WEIGHT' => '150 г',
                'STRUCTURE' => 'свинина, говядина, мясо птицы, шпик, нитритно-посолочная смесь (соль, фиксатор окраски Е250), сахар-песок, чеснок, пряности (перец черный, перец душистый), регулятор кислотности (Е451), усилитель вкуса и аромата (Е621)',
                'PISH_VAL' => 'белок—14,0 г, жир—41,0 г',
                'CALLOR' => '1926 кДж/460 ккал.',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-1.png"),
            "DETAIL_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-2.png"),
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => $id1,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Колбаса Краковская по-тавлински",
            "CODE"              => "krakov4",
            "PROPERTY_VALUES"   => [
                'WEIGHT' => '150 г',
                'STRUCTURE' => 'свинина, говядина, мясо птицы, шпик, нитритно-посолочная смесь (соль, фиксатор окраски Е250), сахар-песок, чеснок, пряности (перец черный, перец душистый), регулятор кислотности (Е451), усилитель вкуса и аромата (Е621)',
                'PISH_VAL' => 'белок—14,0 г, жир—41,0 г',
                'CALLOR' => '1926 кДж/460 ккал.',
            ],
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-2.png"),
            "DETAIL_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/product-2.png"),
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
