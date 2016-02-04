<?php /* @var $seo Seo */ ?>



<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>

<div class="block-container">
    <form action="<?php echo AdminFunctions::GetAdminActionUrl('inlux','updateseo')?>" method="post" enctype="multipart/form-data">

        <?php if($seo != null):?>
            <input type="hidden" name="id" value="<?php echo $seo->id; ?>">
        <?else: ?>
            <?php $seo = new Seo(); ?>
        <?php endif; ?>


        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>

            <?php $val = ""; ?>
            <?php if($seo->site_title != ""): ?>
                <?php $lngTitleArrJson = $seo->site_title;?>
                <?php $lngTitleArr = json_decode($lngTitleArrJson,true); ?>
                <?php $val = $lngTitleArr[$lng]; ?>
            <?php endif; ?>

            <label class="top-field-label">Название сайта <?php echo $label; ?>:</label>
            <div class="field-container-long"><input type="text" name="title[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $val; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>


        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>

            <?php $val = ""; ?>
            <?php if($seo->site_description != ""): ?>
                <?php $lngTitleArrJson = $seo->site_description;?>
                <?php $lngTitleArr = json_decode($lngTitleArrJson,true); ?>
                <?php $val = $lngTitleArr[$lng]; ?>
            <?php endif; ?>

            <label class="top-field-label">Описание сайта <?php echo $label; ?>:</label>
            <div class="field-container-long"><input type="text" name="description[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $val; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>


        <?php foreach(Constants::GetLngArray() as $label => $lng): ?>

            <?php $val = ""; ?>
            <?php if($seo->site_keywords != ""): ?>
                <?php $lngTitleArrJson = $seo->site_keywords;?>
                <?php $lngTitleArr = json_decode($lngTitleArrJson,true); ?>
                <?php $val = $lngTitleArr[$lng]; ?>
            <?php endif; ?>

            <label class="top-field-label">Ключевые слова <?php echo $label; ?>:</label>
            <div class="field-container-long"><input type="text" name="keywords[<?php echo $lng; ?>]" class="input-main float-left" value="<?php echo $val; ?>"></div>
        <?php endforeach; ?>
        <div class="hr"></div>


        <input class="button-submit-red red-button-settings" type="submit" value="Сохранить">
    </form>
</div>