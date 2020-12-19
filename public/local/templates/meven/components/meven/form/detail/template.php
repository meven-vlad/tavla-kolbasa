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
    <div class="px-16 px-sm-0">
        <div class="text-center">
            <h3>Получите прайс
                <br>по данной категории
            </h3>
            <p class="mb-24 mb-md-32">Напишите ваше имя и E-mail, и мы пришлем прайс-лист</p>
        </div>
        <form class="product__form ajax-form" action="" method="">
            <?php
            if ($arParams['AJAX'] == 'Y'){
                $APPLICATION->RestartBuffer();
            }
            ?>
            <div class="form-group">
                <input class="form-control" name="NAME" placeholder="Ваше имя" required="required" />
            </div>
            <div class="form-group">
                <input class="form-control" name="PHONE" type="tel" placeholder="Телефон" required="required" />
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="cc1" type="checkbox" required="required" />
                <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных данных</label>
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Получить прайс-лист</button>
            </div>
            <?php
            if ($arParams['AJAX'] == 'Y'){
                die();
            }
            ?>
        </form>
        <script>
            initMask();
        </script>
    </div>
<?php endif;?>