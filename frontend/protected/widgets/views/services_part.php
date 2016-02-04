<?php /* @var $item LuxContentUnit */ ?>
<?php /* @var $left_blocks array */?>
<?php /* @var $right_blocks array */?>
<?php /* @var $part int */ ?>

<?php if($part == 'left'): ?>
    <?php foreach($left_blocks as $index => $item): ?>
        <h3><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h3>
        <hr>
        <div>
            <?php echo $item->getLngObject(Yii::app()->language)->text; ?>
        </div>
    <?php endforeach; ?>
<?php elseif($part == 'right'): ?>
    <?php foreach($right_blocks as $index => $item): ?>
        <h3><?php echo $item->getLngObject(Yii::app()->language)->title; ?></h3>
        <hr>
        <div>
            <?php echo $item->getLngObject(Yii::app()->language)->text; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>