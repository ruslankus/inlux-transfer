<?php /* @var $seo Seo */ ?>

<div class="block-header">
    <?php $names = AdminFunctions::GetMenuItemNameByActionName(Yii::app()->controller->action->id); ?>
    <?php $name = $names[count($names)-1]; ?>
    <?php echo $name; ?>
    <a href="#" class="close-button"></a>
</div>
<div class="block-container">
    <p>Вы успешно подключились к пульту управления INLUX. Для редактирования информации на сайте - используйте раздел "блоки". Каждый блок принадлежит своей категории. Категория определяет положеие блоков информации на странице сайта и стиль их отображения. Категории могут быть разных типов</p>
</div>

