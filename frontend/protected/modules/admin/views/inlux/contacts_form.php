<?php /* @var $item LuxContactInfo */ ?>


<?php
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/js/ckeditor/ckeditor.js');
?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>
<div class="block-container">
    <form action="<?php echo AdminFunctions::GetAdminActionUrl('inlux','updatecontacts')?>" method="post" enctype="multipart/form-data">

        <?php if(!empty($item)):?>
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
        <?else: ?>
            <?php $item = new LuxContactInfo(); ?>
        <?php endif; ?>

        <label class="top-field-label">Метка:</label>
        <div class="field-container-long"><input type="text" name="label" class="input-main float-left" value="<?php echo $item->label; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Эл. почта:</label>
        <div class="field-container-long"><input type="text" name="email_1" class="input-main float-left" value="<?php echo $item->email_1; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Телефон:</label>
        <div class="field-container-long"><input type="text" name="phone_1" class="input-main float-left" value="<?php echo $item->phone_1; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Мобиьный:</label>
        <div class="field-container-long"><input type="text" name="phone_2" class="input-main float-left" value="<?php echo $item->phone_2; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Изображение карты:</label>
        <div class="image-box">
            <?php if($item->map_image == ''): ?>
                <img src="/img/admin/no-photo.jpg">
            <?php else: ?>
                <img src="<?php echo UrlHelper::GetUploadedImageUrl($item->map_image);?>">
            <?php endif; ?>
        </div>

        <input class="file-input" type="file" name="map_img">
        <div style="clear: both;"></div>
        <br>
        <label class="top-field-label">Ссылка на карту:</label>
        <div class="field-container-long"><input type="text" name="map_link" class="input-main float-left" value="<?php echo $item->map_link; ?>"></div>
        <div class="hr"></div>
        <div style="clear: both;"></div>

        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>
            <label class="top-field-label">Заголовок <?php echo $label; ?>:</label>
            <div class="field-container-long"><input type="text" name="title[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $item->getLngObject($lng)->text; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>

        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>
            <label class="top-field-label">Информация <?php echo $label; ?>:</label>
            <div class="field-container-height">
                <textarea name="info[<?php echo $lng; ?>]" class="input-main text-area-440-80"><?php echo $item->getLngObject($lng)->small_text; ?></textarea>
                <script type="text/javascript">CKEDITOR.replace('info[<?php echo $lng ?>]');</script>
            </div>
        <?php endforeach; ?>
        <div class="hr"></div>

        <label class="top-field-label">Эл. почта администратора (для обратной связи):</label>
        <div class="field-container-long"><input type="text" name="email_admin" class="input-main float-left" value="<?php echo $item->administrator_email; ?>"></div>
        <div class="hr"></div>

        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>
            <label class="top-field-label">Тема сообщения (для обратной связи) <?php echo $label; ?>:</label>
            <div class="field-container-long"><input type="text" name="subject[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $item->getLngObject($lng)->feedback_subject; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>

        <input class="button-submit-red red-button-settings" type="submit" value="Сохранить">
        <div style="clear: both"></div>
    </form>
</div>

