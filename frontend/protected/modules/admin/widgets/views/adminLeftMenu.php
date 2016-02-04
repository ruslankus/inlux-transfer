<?php /* @var $controllers array */ ?>
<?php /* @var $current_controller string */ ?>

<ul class="menu-ul">
    <?php foreach($controllers as $index => $name): ?>
        <?php $user_token = "none"; ?>
        <?php if(!Yii::app()->user->isGuest){$user_token = Yii::app()->user->getState('token');}?>
        <?php $link= ""; ?>
        <?php if(!is_numeric($index)){$link = $index."/admin/".$name."/index/token/".$user_token;}else{$link = Yii::app()->request->baseUrl.'/admin/'.$name;} ?>
        <li class="<?php if($current_controller == $name):?>active-li-menu <?php endif; ?>button_ico_main"><a href="<?php echo $link; ?>"><?php echo AdminFunctions::GetControllerNameById($name); ?></a></li>
    <?php endforeach; ?>
</ul>