<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class CreateWorks20201219132200743173 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Трудоустройство");
        $banner->code = 'works';
        $banner->type = 'info';
        $id = $banner->create();

        $prop1 = new \Meven\Migrator\Props($id, 'Заголовок вакансии');
        $prop1->code = 'TITLE';
        $arrProp = $prop1->getPropArray();
        \Meven\Migrator\Props::createProp($arrProp);


        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Заголовок слева",
            "CODE"              => "krakov1",
            "PROPERTY_VALUES"   => [
                'TITLE' => 'Вакансия колбасного дегустатора',
            ],
            "PREVIEW_TEXT" => "Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.<br>Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.<br>Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.",
            "PREVIEW_TEXT_TYPE" => 'html'
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Заголовок слева1",
            "CODE"              => "krakov12",
            "PROPERTY_VALUES"   => [
                'TITLE' => 'Вакансия колбасного дегустатора',
            ],
            "PREVIEW_TEXT" => "Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.<br>Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.<br>Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.",
            "PREVIEW_TEXT_TYPE" => 'html'
        ];
        $el->Add($arLoadProductArray);

        $el = new \CIBlockElement;
        $arLoadProductArray = [
            "IBLOCK_SECTION_ID" => false,
            "IBLOCK_ID"         => $id,
            "NAME"              => "Заголовок слева1",
            "CODE"              => "krakov13",
            "PROPERTY_VALUES"   => [
                'TITLE' => 'Вакансия колбасного дегустатора',
            ],
            "PREVIEW_TEXT" => "Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.<br>Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём.<br>Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца.",
            "PREVIEW_TEXT_TYPE" => 'html'
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
