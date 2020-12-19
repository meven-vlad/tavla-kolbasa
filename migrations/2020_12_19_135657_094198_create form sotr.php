<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class CreateFormSotr20201219135657094198 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Форма сотрудничества");
        $banner->code = 'form_sotr';
        $banner->type = 'forms';
        $id = $banner->create();

        $prop1 = new \Meven\Migrator\Props($id, 'Имя');
        $prop1->code = 'NAME';
        $arrProp = $prop1->getPropArray();
        $arrProp['REQUIRED'] = 'Y';
        \Meven\Migrator\Props::createProp($arrProp);

        $prop1 = new \Meven\Migrator\Props($id, 'E-mail');
        $prop1->code = 'EMAIL';
        $arrProp = $prop1->getPropArray();
        $arrProp['REQUIRED'] = 'Y';
        \Meven\Migrator\Props::createProp($arrProp);

        $arFields = Array(
            "NAME" => "Текст сообщения",
            "ACTIVE" => "Y",
            "SORT" => "600",
            "CODE" => "TEXT",
            "PROPERTY_TYPE" => "S",
            "USER_TYPE" => "HTML",
            "IBLOCK_ID" => $id,
        );

        $ibp = new \CIBlockProperty;
        $PropID = $ibp->Add($arFields);
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
