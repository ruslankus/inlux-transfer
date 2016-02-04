<?php /* @var $contacts LuxContactInfo */ ?>

<?php if($contacts != null): ?>
    <h3><?php echo $contacts->getLngObject(Yii::app()->language)->text; ?></h3>
    <hr>
    <div class="contact-i">
        <?php echo $contacts->getLngObject(Yii::app()->language)->small_text; ?>
    </div><!-- /contact-i -->

    <?php if($contacts->map_image != ''): ?>
        <div class="map ">
            <a href="<?php echo $contacts->map_link; ?>"><img src="<?php echo UrlHelper::GetUploadedImageUrl($contacts->map_image); ?>" alt="map" border="0"></a>
        </div><!-- /map -->
    <?php endif; ?>
<?php endif; ?>
