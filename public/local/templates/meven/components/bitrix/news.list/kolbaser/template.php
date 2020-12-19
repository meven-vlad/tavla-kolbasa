<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div class="row justify-content-center">
    <?php foreach ($arResult['ITEMS'] as $item):?>
    <div class="col-sm-6 col-lg-4 pb-24 d-flex">
        <div class="worker">
            <img class="worker__photo mb-24 mb-md-32" src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
            <div class="h4 mb-8"><?=$item['NAME']?></div>
            <div class="text-secondary font-weight-bold
            mb-8"><?=$item['PROPERTIES']['POSITION']['VALUE']?></div><?=$item['PROPERTIES']['EMAIL']['VALUE']?>
        </div>
    </div>
    <?php endforeach;?>
</div>