<?php /* @var $seo Seo */ ?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>
<div class="block-container">
    <p>Вы успешно подключились к пульту управления Arrington. Для редактирования ссылок меню - используйте разед "категории". Для редактирования текстовых блоков на страницах - используйте раздел "блоки". Каждый блок привязан к своей категории.</p>
</div>

