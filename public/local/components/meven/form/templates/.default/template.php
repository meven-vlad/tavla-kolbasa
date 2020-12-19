<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="form-poppup">
	<div class="form-poppup_title">
		<h3><?=$arParams["FORM_TITLE"]?></h3>
	</div>
	
	<form method="POST" class="form-poppup_form" action="/ajax/form.php">
		<?php if (!empty($arResult["ERRORS"]) && is_array($arResult["ERRORS"])): ?>
			<?php foreach ($arResult["ERRORS"] as $err):?>
				<div class="errormes">
		            <div class="message-box-wrap">
		                <i class="fa fa-exclamation-circle fa-lg"></i><?=$err?>
		            </div>
		        </div>
			<?php endforeach;?>
	        <?php foreach ($arResult["QUESTIONS"] as $que):?>
				<div class="form-poppup_question">				
					<?=$que["CAPTION"]?>
					<?=$que["HTML_CODE"]?>
				</div>
			<?php endforeach;?>
			<input type="hidden" name="form_submit" value="Y">
			<input type="submit" class="btn btn-primary" value="Отправить" />

		<?php else: ?>
			<?php foreach ($arResult["QUESTIONS"] as $que):?>
				<div class="form-poppup_question">				
					<?=$que["CAPTION"]?>
					<?=$que["HTML_CODE"]?>
				</div>
			<?php endforeach;?>
			<input type="hidden" name="form_submit" value="Y">
			<input type="submit" class="btn btn-primary" value="Отправить" />
		<?php endif; ?>
	</form>	
</div>