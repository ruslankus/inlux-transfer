<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.4.custom.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/slide_down_menu.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/windows.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-lightness/jquery-ui-1.10.4.custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/tables_alt.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/buttons.css">

    <title>Admin Panel</title>

</head>

<body>

<div class="abs-menu">
    <div class="logo-part">
        <a class="logo-link" href="<?php echo AdminFunctions::GetAdminActionUrl('inlux','index');?>"></a>
    </div>

    <?php $this->widget('admin.widgets.AdminLeftMenuWidget',array('controller_name' => Yii::app()->controller->id)); ?>

</div>

<div class="main-wrapper">

    <div class="top-menu">
        <?php $this->widget('admin.widgets.AdminTopMenuWidget',array('current_action' => Yii::app()->controller->action->id, 'controller_name' => Yii::app()->controller->id)); ?>
    </div>

    <div class="content-block">
        <?php echo $content ?>
    </div>

</div>

<div class="dialog"></div>

</body>
</html>