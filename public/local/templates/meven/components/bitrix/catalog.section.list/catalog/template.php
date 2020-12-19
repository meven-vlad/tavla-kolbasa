<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="row mx-n8 mx-lg-0 flex-lg-column pb-lg-32">
    <a class="btn btn--filter mb-16 mx-8 mx-lg-0 <?=($arParams['CURRENT_CODE'] != '' ? '' : 'is-active')?>"
       href="/catalog/">Все</a>
    <?php foreach ($arResult['SECTIONS'] as $section):?>
        <a class="btn btn--filter mb-16 mx-8 mx-lg-0 <?=($arParams['CURRENT_CODE'] == $section['CODE'] ? 'is-active' :
            '')?>"
           href="<?=$section['SECTION_PAGE_URL']?>"><?=$section['NAME']?></a>
    <?php endforeach;?>
</div>
