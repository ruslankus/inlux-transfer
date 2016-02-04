<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.10.2.js"></script>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/inner_page.css" rel="stylesheet" type="text/css">

    <link rel="icon" type="image/png" href="" />
    <link rel="apple-touch-icon-precomposed" type="image/png" href="" />

    <meta name="keywords" content="<?php echo $this->keywords; ?>">
    <meta name="description" content="<?php echo $this->description;?>">
    <title><?php echo $this->title;?></title>
</head>

<body>

<div class="all-top-bar">
    <div class="top-bar">

        <div class="logo"><a href="<?php echo UrlHelper::GetIndexUrl(); ?>"><img src="<?php echo UrlHelper::GetImageUrl('logo.png'); ?>" alt="Inlux"></a></div>
        <?php $this->widget(Constants::CURRENTLY_USED_MODULE .'.widgets.LanguagesWid'); ?>
        <?php $this->widget(Constants::CURRENTLY_USED_MODULE .'.widgets.TopMenu'); ?>
    </div><!-- /top-bar -->
</div><!-- /all-top-bar -->




<div id="home" class="big-block clearfix">
    <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.TitlePart',array('part' => 'left_first')); ?>
    <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.TitlePart',array('part' => 'right_first')); ?>

    <div class="wrapper clearfix">
        <div class="left">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.TitlePart',array('part' => 'left')); ?>
        </div><!-- /left -->
        <div class="right title">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.TitlePart',array('part' => 'right')); ?>
        </div><!-- /right -->
    </div><!-- /wrapper -->
</div><!-- /big-block -->



<div id="services" class="big-block clearfix">

    <div class="big-title">
        <h2><?php echo Translations::Translate('Services'); ?></h2>
    </div><!-- /big-title -->

    <div class="wrapper clearfix">

        <div class="left">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.ServicesPart',array('part' => 'left')); ?>
        </div><!-- /left -->

        <div class="right title">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.ServicesPart',array('part' => 'right')); ?>
        </div><!-- /right -->

    </div><!-- /wrapper -->

</div><!-- /big-block -->

<div id="about" class="big-block clearfix">

    <div class="big-title">
        <h2><?php echo Translations::Translate("About"); ?></h2>
    </div><!-- /big-title -->

    <div class="wrapper clearfix">

        <div class="left">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.AboutPart',array('part' => 'left')); ?>
        </div><!-- /left -->

        <div class="right title">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.AboutPart',array('part' => 'right')); ?>
        </div><!-- /right -->

    </div><!-- /wrapper -->

</div><!-- /big-block -->




<div id="contacts" class="big-block clearfix">
    <div class="big-title">
        <h2><?php echo Translations::Translate('Contacts'); ?></h2>
    </div><!-- /big-title -->

    <div class="wrapper clearfix">
        <div class="left clearfix">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.ContactsPart',array('part' => 'left')); ?>
        </div><!-- /left -->

        <div class="right title clearfix">
            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.ContactsPart',array('part' => 'right')); ?>
        </div><!-- /right -->
    </div><!-- /wrapper -->
</div><!-- /big-block -->

<div class="big-block clearfix">

    <div class="big-title">
        <h2><?php echo Translations::Translate('Feedback'); ?></h2>
    </div><!-- /big-title -->

    <?php echo $content; ?>

</div><!-- /big-block -->

<div class="footer">
    <p>&copy; 2014 Lookout, Inc.<br>Lookout and the Shield Logo are registered trademarks</p>
</div><!-- /footer -->

</body>

</html>