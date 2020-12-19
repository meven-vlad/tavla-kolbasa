<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div id="front-slider">
    <?php foreach ($arResult['ITEMS'] as $item):?>
        <div class="front__slide" style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)">
            <div class="container">
                <div class="front__content">
                    <h1 class="mb-24 mb-md-56"><?=$item['PREVIEW_TEXT']?></h1>
                    <a class="btn btn-primary" href="<?=$item['PROPERTIES']['SSYLKA']['VALUE']?>"><?=$item['PROPERTIES']['NADPIS_NA_SSYLKE']['VALUE']?></a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>
