<?php /* @var $languages array */ ?>
<div class="lang">
    <?php foreach($languages as $label => $lng): ?>
        <a href="<?php echo UrlHelper::GetChangingLanguageUrl($lng); ?>"><img src="<?php echo LuxLanguages::getFlagUrlByPrefix($lng); ?>" alt="<?php echo LuxLanguages::getLngNameByPrefix($lng); ?>"></a>
    <?php endforeach; ?>
</div><!-- /lang -->