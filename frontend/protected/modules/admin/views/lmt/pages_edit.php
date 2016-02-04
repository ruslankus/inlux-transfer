<?php /* @var $categories Array */ ?>
<?php /* @var $category Tree */ ?>

<?php /* @var $current_tree int */ ?>

<?php /* @var $item ContentUnit  */?>

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
    <form action="<?php echo AdminFunctions::GetAdminActionUrl('lmt','updatepage')?>" method="post" enctype="multipart/form-data">

        <?php if($item != null):?>
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
        <?else: ?>
            <?php $item = new ContentUnit(); ?>
        <?php endif; ?>


        <label class="top-field-label">Метка:</label>
        <div class="field-container-long"><input type="text" name="label" class="input-main float-left" value="<?php echo $item->label; ?>"></div>
        <div class="hr"></div>


        <label class="top-field-label">Выбор состояния:</label>
        <div class="select-box">
            <select name="status">
                <option <?php if(Constants::STATUS_VISIBLE == $item->status){echo " selected ";} ?> value="<?php echo Constants::STATUS_VISIBLE; ?>">Видимый</option>
                <option <?php if(Constants::STATUS_HIDDEN == $item->status){echo " selected ";} ?>value="<?php echo Constants::STATUS_HIDDEN; ?>">Скрытый</option>
            </select>
        </div>
        <div class="hr"></div>

        <label class="top-field-label">Выбор категории:</label>

        <?php $selected_cat = ''; if($item->getIsNewRecord()){$selected_cat = $current_tree;}else{$selected_cat = $item->tree_id;} ?>

        <div class="select-box">
            <select name="tree_id">
                <option <?php if($selected_cat == ''){echo " selected ";} ?> value="">Нет</option>
                <?php foreach($categories as $category): ?>
                    <option <?php if($selected_cat == $category->id){echo " selected ";} ?>value="<?php echo $category->id; ?>"><?php echo $category->getLngObject(DEFAULT_LANGUAGE)->name; ?> [<?php echo $category->label; ?>]</option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="hr"></div>

        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>
        <label class="top-field-label">Название <?php echo $label; ?>:</label>
        <div class="field-container-long"><input type="text" name="title[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $item->getLngObject($lng)->title; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>

        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>
            <label class="top-field-label">Текст <?php echo $label; ?>:</label>
            <div class="field-container-height">
                <textarea name="text[<?php echo $lng; ?>]" class="input-main text-area-440-80"><?php echo $item->getLngObject($lng)->text; ?></textarea>
                <script type="text/javascript">CKEDITOR.replace('text[<?php echo $lng ?>]');</script>
            </div>
        <?php endforeach; ?>

        <div class="hr"></div>

        <label class="top-field-label">Изображение:</label>
        <div class="image-box">
            <?php if($item->thumb == ''): ?>
                <img src="/img/admin/no-photo.jpg">
            <?php else: ?>
                <img src="<?php echo UrlHelper::GetUploadedImageUrl($item->thumb);?>">
            <?php endif; ?>
        </div>

        <input class="file-input" type="file" name="thumbnail">

        <div style="clear: both;"></div>
        <div class="hr"></div>
        <div style="clear: both;"></div>

        <input class="button-submit-red red-button-settings" type="submit" value="Сохранить">
        <div style="clear: both"></div>
    </form>
</div>

