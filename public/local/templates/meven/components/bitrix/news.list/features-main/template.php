<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>

<div class="row">
    <?php foreach ($arResult['ITEMS'] as $item):?>
        <div class="col-md-6 col-lg-3 pb-40 d-flex">
            <div class="privilege">
                <img class="privilege__ic mb-16" src="<?=SITE_TEMPLATE_PATH.'/img/'
                .$item['PROPERTIES']['PICTURE']['VALUE']?>"
                     alt="">
                <div class="privilege__title h4 mb-8"><?=$item['NAME']?></div>
                <div class="privilege__text"><?=$item['PREVIEW_TEXT']?></div>
            </div>
        </div>
    <?php endforeach;?>
</div>