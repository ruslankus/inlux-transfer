<?php /* @var $language Languages */ ?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>

<div class="block-container">
    <form action="<?php echo AdminFunctions::GetAdminActionUrl('lmt','updatelng')?>" method="post" enctype="multipart/form-data">

        <?php if($language != null):?>
            <input type="hidden" name="id" value="<?php echo $language->id; ?>">
        <?else: ?>
            <?php $language = new Languages(); ?>
        <?php endif; ?>


        <label class="top-field-label">Метка:</label>
        <div class="field-container-long"><input type="text" name="label" class="input-main float-left" value="<?php echo $language->label; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Выбор состояния:</label>
        <div class="select-box">
            <select name="status">
                <option <?php if(Constants::STATUS_VISIBLE == $language->status){echo " selected ";} ?> value="<?php echo Constants::STATUS_VISIBLE; ?>">Видимый</option>
                <option <?php if(Constants::STATUS_HIDDEN == $language->status){echo " selected ";} ?>value="<?php echo Constants::STATUS_HIDDEN; ?>">Скрытый</option>
            </select>
        </div>
        <div class="hr"></div>

        <label class="top-field-label">Обозначение:</label>
        <div class="field-container-long"><input type="text" name="prefix" class="input-main float-left" value="<?php echo $language->prefix; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Краткое название:</label>
        <div class="field-container-long"><input type="text" name="notification" class="input-main float-left" value="<?php echo $language->notification; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Оригинальное название:</label>
        <div class="field-container-long"><input type="text" name="original_name" class="input-main float-left" value="<?php echo $language->original_language_name; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Английское название:</label>
        <div class="field-container-long"><input type="text" name="english_name" class="input-main float-left" value="<?php echo $language->english_language_name; ?>"></div>
        <div class="hr"></div>

        <label class="top-field-label">Русское название:</label>
        <div class="field-container-long"><input type="text" name="russian_name" class="input-main float-left" value="<?php echo $language->russian_language_name; ?>"></div>
        <div class="hr"></div>

        <input class="button-submit-red red-button-settings" type="submit" value="Сохранить">
    </form>
</div>