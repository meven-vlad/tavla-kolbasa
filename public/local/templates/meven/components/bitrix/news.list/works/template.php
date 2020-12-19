<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?>
<div class="row">
    <div class="col-lg-4">
        <ul class="nav d-flex flex-nowrap flex-lg-column overflow-auto">
            <?php foreach ($arResult['ITEMS'] as $key=>$item):?>
            <li class="nav-item flex-shrink-0 mb-32">
                <a class="btn btn--cv <?=($key == 0 ? 'active' : '')?>" href="#cv<?=$item['ID']?>"
                   data-toggle="tab"><?=$item['NAME']?></a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="col-lg-8 d-flex">
        <div class="tab-content d-flex">
            <?php foreach ($arResult['ITEMS'] as $key=>$item):?>
                <div class="tab-pane fade <?=($key == 0 ? 'active show' : '')?>" id="cv<?=$item['ID']?>">
                    <div class="panel">
                        <h4><?=$item['NAME']?></h4>
                        <br>
                        <p><?=$item['PREVIEW_TEXT']?></p>
                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>