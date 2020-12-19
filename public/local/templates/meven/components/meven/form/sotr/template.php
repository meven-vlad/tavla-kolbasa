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
    <form class="section__form ajax-form" action="" method="">
        <?php
        if ($arParams['AJAX'] == 'Y'){
            $APPLICATION->RestartBuffer();
        }
        ?>
        <div class="form-group">
            <input class="form-control" name="NAME" placeholder="Ваше имя" required>
        </div>
        <div class="form-group">
            <input class="form-control" name="EMAIL" type="email" placeholder="E-mail" required>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="TEXT" placeholder="Текст сообщения"></textarea>
        </div>
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="cc1" type="checkbox" required>
            <label class="custom-control-label" for="cc1">Я соглашаюсь на обработку персональных
                данных</label>
        </div>
        <input type="hidden" name="form_submit" value="Y">
        <input type="hidden" name="template" value="sotr">
        <input type="hidden" name="iblock" value="<?=$arParams['IBLOCK_ID']?>">
        <button class="btn btn-primary" type="submit">Отправить</button>
        <?php
        if ($arParams['AJAX'] == 'Y'){
            die();
        }
        ?>
    </form>
<?php endif;?>