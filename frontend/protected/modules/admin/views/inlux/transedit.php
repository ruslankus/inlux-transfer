<?php /* @var $item Translation*/ ?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>

<div class="block-container">
    <form action="<?php echo AdminFunctions::GetAdminActionUrl('inlux','transupdate')?>" method="post" enctype="multipart/form-data">

        <?php if($item != null):?>
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
        <?php endif; ?>


        <label class="top-field-label">Метка:</label>
        <div class="field-container-long"><input type="text" name="label" class="input-main float-left" value="<?php echo $item->label; ?>"></div>
        <div class="hr"></div>


        <?php if($item != null): ?>
            <?php foreach(Constants::GetLngArray() as $indexLng=> $lng): ?>
                <label class="top-field-label"><?php echo $indexLng; ?> :</label>
                <div class="field-container-long"><input type="text" name="word[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $item->getWordByLng($lng); ?>"></div>
            <?php endforeach; ?>
            <div class="hr"></div>
        <?php else: ?>
            <?php foreach(Constants::GetLngArray() as $indexLng=> $lng): ?>
                <label class="top-field-label"><?php echo $indexLng; ?> :</label>
                <div class="field-container-long"><input type="text" name="word[<?php echo $lng; ?>]" class="input-main float-left" value=""></div>
            <?php endforeach; ?>
            <div class="hr"></div>
        <?php endif;?>

        <input class="button-submit-red red-button-settings" type="submit" value="Сохранить">
    </form>
</div>