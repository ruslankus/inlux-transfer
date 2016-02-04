<?php /* @var $capObj CaptchaObject */  ?>
<?php /* @var $error bool */ ?>

<form method="post" action="<?php echo UrlHelper::GetActionUrl('feedback','send'); ?>">
    <div class="feedback-data">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="mail" placeholder="Mail">

        <div class="captcha">
            <p><?php echo Translations::Translate('Enter symbols'); ?> <br> <?php echo Translations::Translate('in the picture'); ?></p>
            <?php $cap = new DwCaptcha(); $capObj = $cap->GetRandomCaptcha(); ?>
            <input type="hidden" name="cap_id" value="<?php echo $capObj->GetId(); ?>">
            <img style="width: 90px; height: 40px" src="<?php echo $capObj->GetImgUrl(); ?>" alt="kaptcha">
            <input name="cap" type="text" >
        </div><!-- /captcha -->

    </div><!-- /feedback-data -->

    <div class="feedback-message">
        <textarea name="message" placeholder="Message"></textarea>

        <?php if($error == true): ?>
            <p><?php echo Translations::Translate('Error: Something gone wrong'); ?></p>
        <?php endif; ?>

        <input type="submit" value="<?php echo Translations::Translate("Send"); ?>" alt="send">
    </div><!-- /feedback-message -->
</form>