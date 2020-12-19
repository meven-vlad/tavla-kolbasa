<?php
use Bitrix\Main\Config\Option;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>
<main>
    <section class="section pt-32 pt-md-44 mb-24 mb-lg-92">
        <div class="container">
            <div class="row mb-40 mb-md-60 mb-lg-100">
                <div class="col-lg-6 pb-32 pb-lg-0">
                    <h1 class="h2 mb24 mb-md-32"><?= $APPLICATION->GetTitle() ?></h1>
                    <p class="mb-0">
                        <?
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => "/include/about/descr.php"
                            )
                        ); ?>
                    </p>
                </div>
                <div class="col-lg-6 d-flex">
                    <div class="section__img-fill">
                        <img src="<?=SITE_TEMPLATE_PATH?>/img/img-22.jpg">
                    </div>
                </div>
            </div>
            <a class="d-block mb-40 mb-md-60 mb-lg-128" href="<?=Option::get('meven.info', 'about_youtube')?>"
               data-fancybox data-touch="false">
                <img src="<?=SITE_TEMPLATE_PATH?>/img/video.jpg" alt="">
            </a>
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "features-main",
                array(
                    "COMPONENT_TEMPLATE" => "banner",
                    "IBLOCK_TYPE" => "info",
                    "IBLOCK_ID" => \Bitrix\Main\Config\Option::get('meven.info', 'iblock_features-on-main'),
                    "NEWS_COUNT" => "200",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "ID",
                        1 => "CODE",
                        2 => "XML_ID",
                        3 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "PICTURE",
                        1 => "SSYLKA",
                        2 => "",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "Y",
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "STRICT_SECTION_CHECK" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "PAGER_TEMPLATE" => ".default",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => ""
                ),
                false
            );
            ?>
        </div>
    </section>
    <section class="section mb-16 mb-md-44 mb-lg-100">
        <div class="container">
            <h2 class="text-center mb-24 mb-md-48">Наши колбасеры</h2>
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "kolbaser",
                array(
                    "COMPONENT_TEMPLATE" => "banner",
                    "IBLOCK_TYPE" => "info",
                    "IBLOCK_ID" => \Bitrix\Main\Config\Option::get('meven.info', 'iblock_kolbas-master'),
                    "NEWS_COUNT" => "200",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "DESC",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER2" => "ASC",
                    "FILTER_NAME" => "",
                    "FIELD_CODE" => array(
                        0 => "ID",
                        1 => "CODE",
                        2 => "XML_ID",
                        3 => "",
                    ),
                    "PROPERTY_CODE" => array(
                        0 => "PICTURE",
                        1 => "SSYLKA",
                        2 => "",
                    ),
                    "CHECK_DATES" => "Y",
                    "DETAIL_URL" => "",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "36000000",
                    "CACHE_FILTER" => "N",
                    "CACHE_GROUPS" => "Y",
                    "PREVIEW_TRUNCATE_LEN" => "",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "SET_TITLE" => "Y",
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_LAST_MODIFIED" => "N",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "PARENT_SECTION" => "",
                    "PARENT_SECTION_CODE" => "",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "STRICT_SECTION_CHECK" => "N",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "PAGER_TEMPLATE" => ".default",
                    "DISPLAY_TOP_PAGER" => "N",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "PAGER_TITLE" => "Новости",
                    "PAGER_SHOW_ALWAYS" => "N",
                    "PAGER_DESC_NUMBERING" => "N",
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "SET_STATUS_404" => "N",
                    "SHOW_404" => "N",
                    "MESSAGE_404" => ""
                ),
                false
            );
            ?>
            </div>
        </div>
    </section>
    <section class="section section--notepad mb-40 mb-md-60 mb-lg-100">
        <div class="container">
            <div class="col-sm-10 col-md-8 col-lg-6 px-0">
                <h2 class="mb-24 mb-md-32">Реквизиты</h2>
                <p class="mb-0">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => "/include/about/req.php"
                        )
                    ); ?>

                </p>
            </div>
        </div>
    </section>
    <?
    $APPLICATION->IncludeComponent(
        "meven:form",
        "foot",
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
    <div class="map">
        <div class="container position-relative">
            <div class="map__panel">
                <h2 class="mb-24 mb-md-32">Контакты</h2>
                <div class="mb-24">Телефон: <a href="tel:<?=Option::get('meven.info', 'phone')?>"
                                               class="text-primary"><?=Option::get('meven.info', 'phone')?></a>
                    <br>E-mail:

                    <a class="text-primary" href="<?=Option::get('meven.info', 'email')?>"><?=Option::get('meven.info',
                                                                                                        'email')?></a>
                </div>
                <div class="mb-24">
                    Режим работы:
                    <br>
                    <?=Option::get('meven.info', 'work_time')?>
                </div>
                <div class="mb-24"><?=Option::get('meven.info', 'adres')?></div>
            </div>
        </div>
        <div class="map__wrap" id="map"></div>
        <script>
            let iconConfig = {
                // iconLayout: 'default#image',
                // iconImageHref: './img/map-marker@2x.png',
                // iconImageSize: [43, 60],
                // iconImageOffset: [-21, -60]
            };

            function initMap() {
                let map;
                let map2;
                map = new ymaps.Map('map', {
                    center: ['54.209417', '45.118757'],
                    controls: ['default'],
                    zoom: 14
                });
                map.behaviors.disable('scrollZoom');
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    map.behaviors.disable('drag');
                }
                let adr = new ymaps.Placemark(['54.209417', '45.118757'], {
                        balloonContent: 'Тавла - колбасные изделия; <br>Саранск, Пролетарский район, Коваленко, 52а',
                        iconCaption: 'Тавла'
                    },
                    iconConfig
                );
                map.geoObjects.add(adr);
            }
        </script>
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;onload=initMap" type="text/javascript" async></script>
    </div>
</main>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>