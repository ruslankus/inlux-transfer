<?php /* @var $items Array */ ?>
<?php /* @var $item ContentUnit */ ?>

<?php /* @var $categories Array */ ?>
<?php /* @var $category Tree */ ?>

<?php /* @var $current_tree int */ ?>


<div class="block-header" xmlns="http://www.w3.org/1999/html">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>
<div class="block-container">

    <form method="post" action="<?php echo AdminFunctions::GetAdminActionUrl('panel','pageslist') ?>">
    <label class="top-field-label">Выбор категории:</label>
    <div class="select-box float-left">
        <select name="cat">
            <option <?php if($current_tree == ''){echo " selected ";} ?> value="">Все</option>
            <?php foreach($categories as $category): ?>
                <option <?php if($current_tree == $category->id){echo " selected ";} ?>value="<?php echo $category->id; ?>"><?php echo $category->getLngObject(Yii::app()->language)->name;?> [<?php echo $category->label; ?>]</option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="right-box-mod float-right">
        <input type="submit" value="Фильтровать" class="button-submit-default default-button-settings">
    </div>
    <div style="clear: both;"></div>

    <div class="hr"></div>
    </form>

    <?php if($current_tree == null){$prefix_special = "";}else{$prefix_special = '/cat/'.$current_tree;} ?>

    <table class="tbl-cont-list" cellpadding="0" cellspacing="0" border="0">

        <tr class="header-table">
            <td class="td-tbl-clr">Id</td>
            <td class="td-tbl-clr">Метка</td>
            <td class="td-tbl-clr action-td">Действия</td>
        </tr>

        <?php foreach($items as $item): ?>
            <tr>

                <td class="td-tbl-clr"><?php echo $item->id; ?></td>
                <td class="td-tbl-clr"><?php echo $item->label;?></td>

                <td class="td-tbl-clr" style="text-align:center;">

                    <?php if($item->status == Constants::STATUS_VISIBLE): ?>
                        <?php echo CHtml::link("Скрыть",'/admin/panel/statuspage/id/'.$item->id.'/status/'.Constants::STATUS_HIDDEN.$prefix_special,array('class' => 'button hide-btn', 'title' => 'скрыть')); ?>
                    <?php else: ?>
                        <?php echo CHtml::link("Показать",'/admin/panel/statuspage/id/'.$item->id.'/status/'.Constants::STATUS_VISIBLE.$prefix_special,array('class' => 'button show-btn', 'title' => 'показать')); ?>
                    <?php endif; ?>

                    <?php if($current_tree != null && $current_tree != ''): ?>
                        <?php echo CHtml::link("⇑",'/admin/panel/orderpage/dir/up/id/'.$item->id.$prefix_special,array('class' => 'button top-arrow', 'title' => 'сдвинуть вверх')); ?>
                        <?php echo CHtml::link("⇓",'/admin/panel/orderpage/dir/down/id/'.$item->id.$prefix_special,array('class' => 'button bot-arrow', 'title' => 'сдвинуть вниз')); ?>
                    <?php endif;?>

                    <?php echo CHtml::link("Удалить",'/admin/panel/deletepage/id/'.$item->id.$prefix_special,array('class' => 'button delete-lnk del-link', 'title' => 'удалить')); ?>
                    <?php echo CHtml::link("Изменить",'/admin/panel/editpage/id/'.$item->id.$$prefix_special,array('class' => 'button edit-lnk', 'title' => 'редактировать')); ?>

                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <br>
    <?php echo CHtml::link("Создать",'/admin/panel/createpage'.$prefix_special,array('class' => 'button-submit-red red-button-settings')); ?>

</div>

