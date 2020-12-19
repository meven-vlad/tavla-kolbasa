<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div class="product">
    <div class="product__row">
        <div class="product__img-wrap pb-24">
            <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="" />
        </div>
        <div class="product__content pb-24">
            <h4 class="mb-8"><?=$arResult['NAME']?></h4>
            <div class="text-muted mb-16">Вес: <?=$arResult['PROPERTIES']['WEIGHT']['VALUE']?></div>
            <div class="p-sm">
                <h5 class="mb-0">Состав:</h5>
                <p class="mb-16"><?=$arResult['PROPERTIES']['STRUCTURE']['VALUE']?></p>
                <h5 class="mb-0">Пищевая ценность в 100 г продукта (среднее значение): </h5>
                <p class="mb-16"><?=$arResult['PROPERTIES']['PISH_VAL']['VALUE']?></p>
                <h5 class="mb-0">Энергетическая ценность/калорийность:</h5>
                <p class="mb-16"><?=$arResult['PROPERTIES']['CALLOR']['VALUE']?></p>
            </div>
        </div>
    </div>
    <div class="px-16 px-sm-0">
        <div class="text-center">
            <h3>Получите прайс
                <br>по данной категории
            </h3>
            <p class="mb-24 mb-md-32">Напишите ваше имя и E-mail, и мы пришлем прайс-лист</p>
        </div>
        <form class="product__form" action="" method="">
            <div class="form-group">
                <input class="form-control" name="name" placeholder="Ваше имя" required="required" />
            </div>
            <div class="form-group">
                <input class="form-control" name="email" type="email" placeholder="E-mail" required="required" />
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="cc1" type="checkbox" required="required" />
                <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных данных</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Получить прайс-лист</button>
            </div>
        </form>
    </div>
</div>