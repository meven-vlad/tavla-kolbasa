<?php
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\Application;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if (!Loader::includeModule('meven.info')){
    throw new \Bitrix\Main\SystemException('Необходимо установить модуль');
}

$asset = Asset::getInstance();

$asset->addCss(SITE_TEMPLATE_PATH . '/css/fonts.css');
$asset->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.min.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/plugins.js');
$asset->addJs(SITE_TEMPLATE_PATH . '/js/script.js');

$path = $APPLICATION->GetCurPage(false);

?>

<!DOCTYPE html>
<html>
<head>
<?php $APPLICATION->ShowHead()?>
    <title><?php $APPLICATION->ShowTitle()?></title>
</head>
<body>
    <?php $APPLICATION->ShowPanel();?>  
    <header class="header header--home">
        <div class="container">
            <div class="header__row">
                <a class="btn btn--menu mr-20 mr-sm-24 d-xl-none" href="#menu" data-fancybox data-touch="false" data-slide-class="fancybox-menu"></a>
                <a class="header__logo" href="./">
                    <img src="./img/logo@2x.png" alt="">
                </a>
                <div class="flex-grow-1 d-none d-xl-block">
                    <nav class="menu d-xl-block" id="menu">
                        <div class="container px-xl-0">
                            <ul>
                                <li>
                                    <a href="#">Каталог</a>
                                </li>
                                <li>
                                    <a href="#">О ТМ Тавла</a>
                                </li>
                                <li>
                                    <a href="#">Сотрудничество</a>
                                </li>
                                <li>
                                    <a href="#">Трудоустройство</a>
                                </li>
                            </ul>
                            <div class="d-xl-none text-center">
                                <div class="header__contacts mb-20">
                                    <a class="font-weight-bold" href="tel:88342777454">8 (8342) 777-454</a>
                                    <br>
                                    <a href="mailto:agr.office@yandex.ru">agr.office@yandex.ru</a>
                                </div>
                                <a class="btn btn-primary px-24" href="#">Получить прайс-лист</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="header__contacts mr-md-20">
                    <a class="font-weight-bold" href="tel:88342777454">8 (8342) 777-454</a>
                    <br>
                    <a href="mailto:agr.office@yandex.ru">agr.office@yandex.ru</a>
                </div>
                <a class="btn btn-primary px-24 d-none d-md-inline-block" href="./popup-callme.html" data-fancybox data-type="ajax" data-touch="false">Получить прайс-лист</a>
            </div>
        </div>
    </header>