<?php /* @var $item LuxContactInfo */ ?>
<?php /* @var  $cont_list array */ ?>

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
            <td class="td-tbl-clr action-td">Действия</td>
        </tr>

        <?php foreach($cont_list as $item): ?>
            <tr>

                <td class="td-tbl-clr"><?php echo $item->id; ?></td>
                <td class="td-tbl-clr"><?php echo $item->label;?></td>

                <td class="td-tbl-clr" style="text-align:center;">
                    <?php echo CHtml::link("Удалить",'/admin/inlux/condelete/id/'.$item->id,array('class' => 'button delete-lnk del-link', 'title' => 'удалить')); ?>
                    <?php echo CHtml::link("Изменить",'/admin/inlux/conedit/id/'.$item->id,array('class' => 'button edit-lnk', 'title' => 'редактировать')); ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <?php $prefix_special = !empty($prefix_special) ? $prefix_special : "" ; ?>
    <?php echo CHtml::link("Создать",'/admin/inlux/concreate'.$prefix_special,array('class' => 'button-submit-red red-button-settings')); ?>

</div>

