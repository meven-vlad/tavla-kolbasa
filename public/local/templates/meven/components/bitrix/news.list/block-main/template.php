<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>


<div class="section__bg-title">
    <div class="row align-items-center mb-40">
        <div class="col-lg-6 mb-36">
            <h2 class="mb-24 mb-xl-40"><?=$arResult['ITEMS'][0]['NAME']?></h2>
            <p class="mb-0"><?=$arResult['ITEMS'][0]['PREVIEW_TEXT']?></p>
        </div>
        <div class="col-lg-6 text-center">
            <img src="<?=$arResult['ITEMS'][0]['DETAIL_PICTURE']['SRC']?>" alt="">
        </div>
    </div>
</div>
<div class="row align-items-center mb-40 mb-lg-128">
    <div class="col-lg-6 text-center order-1 order-lg-0">
        <img src="<?=$arResult['ITEMS'][1]['DETAIL_PICTURE']['SRC']?>" alt="">
    </div>
    <div class="col-lg-6 mb-36">
        <h2 class="mb-24 mb-xl-40"><?=$arResult['ITEMS'][1]['NAME']?></h2>
        <p class="mb-0"><?=$arResult['ITEMS'][1]['PREVIEW_TEXT']?></p>
    </div>
</div>

