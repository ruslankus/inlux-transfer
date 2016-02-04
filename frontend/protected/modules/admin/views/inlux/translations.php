<?php /* @var $words Array */ ?>
<?php /* @var $word Translation */ ?>


<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>

<div class="block-container">
<table class="tbl-cont-list" cellpadding="0" cellspacing="0" border="0">

    <tr class="header-table">
        <td class="td-tbl-clr">ID</td>
        <td class="td-tbl-clr">Метка</td>
        <?php foreach(Constants::GetLngArray() as $lngIndex => $lng): ?>
        <td class="td-tbl-clr"><?php echo $lngIndex; ?></td>
        <?php endforeach;?>
        <td class="td-tbl-clr action-td">Действия</td>
    </tr>

    <?php foreach($words as $word): ?>
    <tr>

        <td class="td-tbl-clr"><?php echo $word->id; ?></td>
        <td class="td-tbl-clr"><?php echo $word->label;?></td>

        <?php foreach(Constants::GetLngArray() as $lngIndex => $lng): ?>
            <td class="td-tbl-clr"><?php echo $word->getWordByLng($lng); ?></td>
        <?php endforeach; ?>

        <td class="td-tbl-clr" style="text-align:center;">
            <?php echo CHtml::link("Удалить",'/admin/inlux/transdel/id/'.$word->id,array('class' => 'button delete-lnk del-link', 'title' => 'удалить')); ?>
            <?php echo CHtml::link("Изменить",'/admin/inlux/transedit/id/'.$word->id,array('class' => 'button edit-lnk', 'title' => 'редактировать')); ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<br>
    <?php echo CHtml::link("Создать",'/admin/inlux/transcreate',array('class' => 'button-submit-red red-button-settings')); ?>
</div>