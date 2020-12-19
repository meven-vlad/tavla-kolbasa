<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div class="carousel">
    <div class="js-carousel-card">
        <?php foreach ($arResult['ITEMS'] as $item):?>
        <div class="carousel__item">
            <div class="card">
                <a class="card__img-wrap" href="/local/ajax/product/detail.php?id=<?=$item['ID']?>" data-fancybox
                   data-type="ajax"
                   data-touch="false" data-auto-focus="false">
                    <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="<?=$item['NAME']?>">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="/local/ajax/product/detail.php?id=<?=$item['ID']?>" data-fancybox
                       data-type="ajax" data-touch="false" data-auto-focus="false">Колбаса Краковская по-тавлински</a>
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
        <div class="carousel__item">
            <div class="card">
                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                    <img src="./img/product-2.png" alt="">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Сардельки Тавлинские</a>
                    <ul class="card__opt">
                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                    </ul>
                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel__item">
            <div class="card">
                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                    <img src="./img/product-1.png" alt="">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Колбаса Краковская по-тавлински</a>
                    <ul class="card__opt">
                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                    </ul>
                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel__item">
            <div class="card">
                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                    <img src="./img/product-2.png" alt="">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Сардельки Тавлинские</a>
                    <ul class="card__opt">
                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                    </ul>
                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel__item">
            <div class="card">
                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                    <img src="./img/product-1.png" alt="">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Колбаса Краковская по-тавлински</a>
                    <ul class="card__opt">
                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                    </ul>
                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="carousel__item">
            <div class="card">
                <a class="card__img-wrap" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                    <img src="./img/product-2.png" alt="">
                </a>
                <div class="card__panel">
                    <a class="card__name" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">Сардельки Тавлинские</a>
                    <ul class="card__opt">
                        <li>Пищевая ценность в 100 г продукта: белок - 14,0 г., жир -41,0г</li>
                        <li>Энергетическая ценность/калорийность: 1926 кДж/460 ккал.</li>
                    </ul>
                    <a class="card__more text-primary" href="./popup-product.html" data-fancybox data-type="ajax" data-touch="false" data-auto-focus="false">
                        Подробнее <svg class="ml-8" width="9" height="14" viewBox="0 0 9 14" fill="none">
                            <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>