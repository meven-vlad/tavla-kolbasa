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
                        <form class="section__form" action="" method="">
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
                                <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных
                                    данных</label>
                            </div>
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </form>
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