<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$templateData = $arResult;

if ($arResult['FORM_RESULT'] == 'ADDOK'):
    ?>
    <div class="popup popup--thx">
        <div class="text-center">
            <h3>Заявка отправлена</h3>
            <p class="mb-24 mb-md-32">Мы свяжемся с вами в ближайшее время</p>
            <button class="btn btn-primary" type="button">Спасибо</button>
        </div>
    </div>
<?php else:?>
    <section class="section section--leedform">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <h2 class="mb-8 mb-lg-0">Остались вопросы?</h2>
                </div>
                <div class="col-md-6 mb-32 mb-md-0">
                    <form class="section__form ajax-form" action="" method="">
                        <?php
                        if ($arParams['AJAX'] == 'Y'){
                            $APPLICATION->RestartBuffer();
                        }
                        ?>
                        <p class="mb-24 mb-md-48">Оставьте свои контактные данные, и наш менеджер свяжется с вами в ближайшее время</p>
                        <div class="form-group">
                            <input class="form-control" name="NAME" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="PHONE" type="tel" placeholder="Телефон" required
                                   data-inputmask="'mask': '+7(999)999-99-99','clearIncomplete':'true'">
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="cc1" type="checkbox" required>
                            <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных данных</label>
                        </div>
                        <button class="btn btn-primary" type="submit">Отправить</button>
                        <?php
                        if ($arParams['AJAX'] == 'Y'){
                            die();
                        }
                        ?>
                    </form>
                </div>
                <div class="col-md-6">
                    <img src="<?=SITE_TEMPLATE_PATH?>/img/img-1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>

<?php endif;?>