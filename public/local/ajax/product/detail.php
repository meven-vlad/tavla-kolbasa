<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$request = Bitrix\Main\Context::getCurrent()->getRequest();

if ((int) $request->get('id') < 1 || !$request->isAjaxRequest()) {
    Throw new Exception('error');
}

$id = $request->get('id');

$APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "popup",
    Array(
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "IBLOCK_TYPE" => 'info',
        "IBLOCK_ID" => \Bitrix\Main\Config\Option::get('meven.info', 'iblock_catalog'),
        "FIELD_CODE" => ['ID', 'NAME'],
        "PROPERTY_CODE" => [
            0 => "WEIGHT",
            1 => "STRUCTURE",
            2 => "PISH_VAL",
            3 => "CALLOR",
        ],
        "DETAIL_URL" => '/',
        "SECTION_URL" => '/',
        "MESSAGE_404" => "Y",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "N",
        "FILE_404" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => 3600,
        "CACHE_GROUPS" => "Y",
        "USE_PERMISSIONS" => "N",
        "GROUP_PERMISSIONS" => "N",
        "CHECK_DATES" => "Y",
        "ELEMENT_ID" => $id,
        "ELEMENT_CODE" => "",
    ),
    false
);