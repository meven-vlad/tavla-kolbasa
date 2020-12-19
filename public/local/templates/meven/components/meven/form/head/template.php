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
    <div class="popup">
        <div class="text-center">
            <h3>Заявка на
                <br>обратный звонок
            </h3>
            <p class="mb-24 mb-md-32">Оставьте свои контактные данные, чтобы мы с вами связались</p>
        </div>
        <form class="popup__form ajax-form" action="" method="">
            <?php
            if ($arParams['AJAX'] == 'Y'){
                $APPLICATION->RestartBuffer();
            }
            ?>
            <div class="form-group">
                <input class="form-control" name="NAME" placeholder="Ваше имя" required="required" />
            </div>
            <div class="form-group">
                <input class="form-control" name="PHONE" type="tel" placeholder="Телефон" required="required"
                       data-inputmask="'mask': '+7(999)999-99-99','clearIncomplete':'true'" />
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="cc1" type="checkbox" required="required" />
                <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных данных</label>
            </div>
            <input type="hidden" name="form_submit" value="Y">
            <input type="hidden" name="template" value="footer">
            <input type="hidden" name="iblock" value="<?=$arParams['IBLOCK_ID']?>">
            <div class="text-center">
                <button class="btn btn-primary" type="submit">Отправить</button>
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