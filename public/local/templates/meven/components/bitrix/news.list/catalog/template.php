<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div class="col-lg-9">
    <div class="row">
        <?php foreach ($arResult['ITEMS'] as $item):?>
        <div class="col-sm-6 col-md-4 pb-24 d-flex">
            <div class="card">
                <a class="card__img-wrap" href="/local/ajax/product/detail.php?id=<?=$item['ID']?>" data-fancybox data-type="ajax" data-touch="false"
                   data-auto-focus="false">
                    <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="/local/ajax/product/detail.php?id=<?=$item['ID']?>" data-fancybox
                       data-type="ajax" data-touch="false" data-auto-focus="false"><?=$item['NAME']?></a>
                    <ul class="card__opt">
                        <li>Пищевая ценность в 100 г продукта: <?=$item['PROPERTIES']['PISH_VAL']['VALUE']?></li>
                        <li>Энергетическая ценность/калорийность: <?=$item['PROPERTIES']['CALLOR']['VALUE']?></li>
                    </ul>
                    <a class="card__more text-primary" href="/local/ajax/product/detail.php?id=<?=$item['ID']?>" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>