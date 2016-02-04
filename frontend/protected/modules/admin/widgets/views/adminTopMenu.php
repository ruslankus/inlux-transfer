<?php /* @var $controller_name string */ ?>
<?php /* @var $current_action string */ ?>

<div class="path-line">
    <a href="#" class="path-element">Админ Панель</a>
    <a href="#" class="path-element"><?php echo AdminFunctions::GetControllerNameById($controller_name); ?></a>
    <?php $name_part = AdminFunctions::GetMenuItemNameByActionName($current_action);?>
    <?php if(!is_array($name_part)): ?>
        <a href="#" class="path-element-last"><?php echo AdminFunctions::GetMenuItemNameByActionName($current_action); ?></a>
    <?php else: ?>
        <?php foreach($name_part as $index => $value): ?>
            <?php $class = "path-element"; if($index == count($name_part)-1){$class="path-element-last";} ?>
            <a href="#" class="<?php echo $class; ?>"><?php echo $value ?></a>
        <?php endforeach;?>
    <?php endif;?>
</div>

<div class="button-line">

    <ul class="menu-list-in-top" style="list-style: none;">

        <?php foreach(AdminFunctions::ListAdminMenuLinks() as $name => $item_array): ?>
            <li class="menu-slide-down">
                <?php if(array_key_exists('action',$item_array)): ?>
                    <a href="<?php echo Yii::app()->request->baseUrl.'/admin/'.$controller_name.'/'.$item_array['action']; ?>" class="button-element <?php echo $item_array['icon']; ?>"><?php echo $name; ?></a>
                <?php else: ?>
                    <span class="button-element <?php echo $item_array['icon']; ?>"><?php echo $name ?></span>
                <?php endif; ?>
                <?php if(array_key_exists('links',$item_array)): ?>
                    <?php foreach($item_array['links'] as $link_name => $action): ?>
                    <a href="<?php echo Yii::app()->request->baseUrl.'/admin/'.$controller_name.'/'.$action; ?>" class="button-element-sub"><?php echo $link_name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>