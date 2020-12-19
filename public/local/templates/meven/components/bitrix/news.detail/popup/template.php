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
    <?
    $APPLICATION->IncludeComponent(
        "meven:form",
        "detail",
        array(
            "COMPONENT_TEMPLATE" => "head",
            "IBLOCK_TYPE" => "forms",
            "IBLOCK_ID" => \Bitrix\Main\Config\Option::get('meven.info', 'iblock_form'),
            "SUCCESS_MESSAGE" => "Спасибо! Ваше сообщение отправлено!",
            "SEND_BUTTON_NAME" => "Задать вопрос",
            "SEND_BUTTON_CLASS" => "btn btn-primary",
            "DISPLAY_CLOSE_BUTTON" => "Y",
            "SHOW_LICENCE" => "Y",
            "LICENCE_TEXT" => "btn btn-primary",
            "CLOSE_BUTTON_NAME" => "Закрыть",
            "CLOSE_BUTTON_CLASS" => "btn btn-primary",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "AJAX_OPTION_ADDITIONAL" => "",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "CACHE_GROUPS" => "Y",
            "FORM_TITLE" => "",
            "HIDDEN_FIELDS" => ['SECTION'],
            "USE_CAPTCHA" => "N",
        ),
        false
    );
    ?>

</div>