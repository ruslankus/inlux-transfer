<?php /* @var $item LuxContentUnit */ ?>
<?php /* @var $left_blocks array */?>
<?php /* @var $right_blocks array */?>
<?php /* @var $part int */ ?>

<?php if($part == 'left_first' && count($left_blocks) > 0): ?>
    <?php $item = $left_blocks[0]; ?>
    <div class="head-left">
        <h1><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h1>
        <h4><?php echo strip_tags($item->getLngObject(Yii::app()->language)->text); ?></h4>
    </div><!-- /head-left -->
<?php endif; ?>

<?php if($part == 'right_first' && count($right_blocks) > 0): ?>
    <?php $item = $right_blocks[0]; ?>
    <div class="head-right">
        <h1><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h1>
        <h4><?php echo strip_tags($item->getLngObject(Yii::app()->language)->text); ?></h4>
    </div><!-- /head-left -->
<?php endif; ?>

<?php if($part == 'left'): ?>
    <?php foreach($left_blocks as $index => $item): ?>

        <?php if($index > 0 && $index != 2): ?>
            <h3><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h3>
            <hr>
            <div>
                <?php echo $item->getLngObject(Yii::app()->language)->text; ?>
            </div>
        <?php endif; ?>

        <?php if($index == 2): ?>

        <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.ButtonsWid'); ?>

        <div class="block">
            <h4><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h4>
            <?php echo $item->getLngObject(Yii::app()->language)->text; ?>
        </div><!-- /block -->
        <?php endif; ?>

    <?php endforeach; ?>
<?php endif;?>

<?php if($part == 'right'): ?>
    <?php foreach($right_blocks as $index => $item): ?>

        <?php if($index > 0 && $index != 2): ?>
            <h3><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h3>
            <hr>
            <div>
                <?php echo $item->getLngObject(Yii::app()->language)->text; ?>
            </div>
        <?php endif; ?>

        <?php if($index == 2): ?>

            <?php $this->widget(Constants::CURRENTLY_USED_MODULE.'.widgets.ButtonsWid'); ?>

            <div class="block">
                <h4><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h4>
                <?php echo $item->getLngObject(Yii::app()->language)->text; ?>
            </div><!-- /block -->
        <?php endif; ?>

    <?php endforeach; ?>
<?php endif;?>
