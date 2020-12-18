<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AddIblockBanners20201218143629580704 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function up()
    {
        $banner = new \Meven\Migrator\Iblocks("Баннер сверху");
        $banner->code = 'banner-top';
        $banner->type = 'info';
        $banner->create();
    }

    /**
     * Reverse the migration.
     *
     * @return mixed
     * @throws \Exception
     */
    public function down()
    {
        $id = \Meven\Migrator\Iblocks::getIblockFromCode('banner-top', 's1');
        \Meven\Migrator\Iblocks::delete($id);
    }
}
