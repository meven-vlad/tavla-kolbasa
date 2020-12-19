<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->addJs($templateFolder.'/dist/app.bundle.js');

?>
<script>
    new Kidrest.Components.FormFooter();
</script>
<?