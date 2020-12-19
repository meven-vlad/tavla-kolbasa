<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class MainBanners20201219105505662536 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Блоки на главной");
        $banner->code = 'block-on-main';
        $banner->type = 'info';
        $iblockId = $banner->create();

        global $USER;

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "О бренде",
            "CODE"              => "brand",
            "PREVIEW_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/list-bg.png"),
            "DETAIL_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/img-2.jpg"),
            "PREVIEW_TEXT" => "Мы в компании «Агрика» после 13 лет успешной работы на колбасном рынке в качестве дистрибьютора различных марок и производителей решили в дополнение заняться изготовлением собственной мясной и колбасной продукции."
        ];
        $el->Add($arLoadProductArray);


        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $iblockId,
            "NAME"              => "Наш опыт",
            "CODE"              => "opit",
            "DETAIL_PICTURE" => \CFile::MakeFileArray("https://realize-project-as.gitlab.io/tavla/img/img-3.jpg"),
            "PREVIEW_TEXT" => "Используя свой опыт, мы делаем продукцию под торговой маркой «Тавла». Производство осуществляется ООО «Араповская мясная мануфактура», входящим в группу компаний ООО «Агрика». Производство расположено в городе Ковылкино Республики Мордовия."
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
        $id = \Meven\Migrator\Iblocks::getIblockFromCode('block-on-main', 's1');
        \Meven\Migrator\Iblocks::delete($id);
    }
}
