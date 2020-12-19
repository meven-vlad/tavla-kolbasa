<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Сотрудничество с нами");
?>
    <main>
        <section class="section py-32 py-md-64 mb-md-44">
            <div class="container">
                <h1 class="h2 mb-24 mb-md-32"><?= $APPLICATION->GetTitle() ?></h1>
                <div class="row justify-content-between">
                    <div class="col-lg-6 pb-40">
                        <p class="mb-24 mb-md-64">
                            <?
                            $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => "/include/coop/descr.php"
                                )
                            ); ?>

                        </p>
                        <?
                        $APPLICATION->IncludeComponent(
                            "meven:form",
                            "sotr",
                            array(
                                "COMPONENT_TEMPLATE" => "head",
                                "IBLOCK_TYPE" => "forms",
                                "IBLOCK_ID" => \Bitrix\Main\Config\Option::get('meven.info', 'iblock_form_sotr'),
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
                    <div class="col-lg-6 text-center text-lg-right">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/img/cat.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>