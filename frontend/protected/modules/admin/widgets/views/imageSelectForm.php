<?php /* @var $types Array */ ?>
<?php /* @var $parentType String */ ?>
<?php /* @var $parentId Int */ ?>
<?php /* @var $image Images */ ?>

<?php if(!empty($types)): ?>
<table class="tbl-cont-list" cellpadding="0" cellspacing="0" border="0">

    <tr class="header-table">
        <td class="td-tbl-clr"><?php echo Translations::Translate("Image type");?></td>
        <td class="td-tbl-clr"><?php echo Translations::Translate("Preview");?></td>
        <td class="td-tbl-clr"><?php echo Translations::Translate("Select file");?></td>
        <td class="td-tbl-clr"><?php echo Translations::Translate("Actions");?></td>
    </tr>

    <?php foreach($types as $typeIndex => $fieldName): ?>

    <?php $image = Images::getImage($parentType,$parentId, $typeIndex); ?>
    <tr>
        <td class="td-tbl-clr" style="width:183px;">
            <?php echo Translations::Translate(Constants::getNameOfImgType($typeIndex));?>
        </td>

        <td class="td-tbl-clr" style="width: 189px;">
            <?php if($image != null): ?>
            <img class="image-preview" src="<?php echo AdminFunctions::GetImageUrl($image->picture)?>" alt="">
            <?php endif; ?>
        </td>

        <td class="td-tbl-clr" style="width: 576px;">
            <input type="file" name="<?php echo $fieldName; ?>" class="form-control" style="width: 300px;">
        </td>

        <td class="td-tbl-clr action-td" style="width: 200px;">
            <?php if($image != null): ?>
            <a href='<?php echo 'javascript:OpenWindowWarningDel('.$image->id.',"/admin/panel/delpic");'; ?>'><button type="button" class="btn btn-xs btn-danger"><?php echo Translations::Translate("Delete Image");?></button></a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
<?php endif; ?>
