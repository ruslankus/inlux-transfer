<?php /* @var $item Tree */ ?>
<?php /* @var $treeItems array */ ?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>
<div class="block-container">

    <table class="tbl-cont-list" cellpadding="0" cellspacing="0" border="0">

        <tr class="header-table">
            <td class="td-tbl-clr">Id</td>
            <td class="td-tbl-clr">Метка</td>
            <td class="td-tbl-clr action-td">Действия</td>
        </tr>

        <?php foreach($treeItems as $item): ?>
            <tr>

                <td class="td-tbl-clr"><?php echo $item->id; ?></td>
                <td class="td-tbl-clr"><?php echo $item->label;?></td>

                <td class="td-tbl-clr" style="text-align:center;">

                    <?php if($item->status == Constants::STATUS_VISIBLE): ?>
                        <?php echo CHtml::link("Скрыть",'/admin/inlux/statustree/id/'.$item->id.'/status/'.Constants::STATUS_HIDDEN,array('class' => 'button hide-btn', 'title' => 'скрыть')); ?>
                    <?php else: ?>
                        <?php echo CHtml::link("Показать",'/admin/inlux/statustree/id/'.$item->id.'/status/'.Constants::STATUS_VISIBLE,array('class' => 'button show-btn', 'title' => 'показать')); ?>
                    <?php endif; ?>

                    <?php echo CHtml::link("⇑",'/admin/inlux/ordertree/dir/up/id/'.$item->id,array('class' => 'button top-arrow', 'title' => 'сдвинуть вверх')); ?>
                    <?php echo CHtml::link("⇓",'/admin/inlux/ordertree/dir/down/id/'.$item->id,array('class' => 'button bot-arrow', 'title' => 'сдвинуть вниз')); ?>

                    <?php echo CHtml::link("Удалить",'/admin/inlux/deletetree/id/'.$item->id,array('class' => 'button delete-lnk del-link', 'title' => 'удалить')); ?>
                    <?php echo CHtml::link("Изменить",'/admin/inlux/edittree/id/'.$item->id,array('class' => 'button edit-lnk', 'title' => 'редактировать')); ?>

                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <?php echo CHtml::link("Создать",'/admin/inlux/createtree',array('class' => 'button-submit-red red-button-settings')); ?>

</div>

