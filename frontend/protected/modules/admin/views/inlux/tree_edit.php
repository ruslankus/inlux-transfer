<?php /* @var $item LuxTree */ ?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>
<div class="block-container">
    <form action="<?php echo AdminFunctions::GetAdminActionUrl('inlux','updatetree')?>" method="post" enctype="multipart/form-data">

        <?php if($item != null):?>
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
        <?else: ?>
            <?php $item = new LuxTree(); ?>
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

        <label class="top-field-label">Выбор типа:</label>
        <div class="select-box">
                <select name="type">
                    <?php foreach(Constants::TypesArray() as $typeName => $value): ?>
                        <option <?php if($value == $item->type){echo " selected ";} ?> value="<?php echo $value; ?>"><?php echo $typeName; ?></option>
                    <?php endforeach; ?>
                </select>
        </div>
        <div class="hr"></div>

        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>
        <label class="top-field-label">Название <?php echo $label; ?>:</label>
        <div class="field-container-long"><input type="text" name="name[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $item->getLngObject($lng)->name; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>

        <input class="button-submit-red red-button-settings" type="submit" value="Сохранить">
    </form>
</div>

