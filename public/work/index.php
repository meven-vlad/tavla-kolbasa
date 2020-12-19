<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>
    <main>
        <section class="section py-32 py-md-64 mb-md-44">
            <div class="container">
                <h1 class="h2 mb-24 mb-md-64">Трудоустройство</h1>
                <h3 class="mb-16 mb-md-32">Доступные вакансии:</h3>
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "works",
                    array(
                        "COMPONENT_TEMPLATE" => "banner",
                        "IBLOCK_TYPE" => "info",
                        "IBLOCK_ID" => \Bitrix\Main\Config\Option::get('meven.info', 'iblock_works'),
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
        <section class="section section--leedform">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h3 class="mb-8">Хотите работать с нами?</h3>
                    </div>
                    <div class="col-md-6 mb-32 mb-md-0">
                        <form class="section__form" action="" method="">
                            <p class="mb-24 mb-md-48">Оставьте свои контактные данные, чтобы мы могли с вами связаться</p>
                            <div class="form-group">
                                <input class="form-control" name="name" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" type="email" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="msg" placeholder="Текст сообщения"></textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="cc1" type="checkbox" required>
                                <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных данных</label>
                            </div>
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <img src="./img/img-11.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>