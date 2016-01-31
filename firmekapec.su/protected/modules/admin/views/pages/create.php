<?php
/* @var $this PagesController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	'Создание',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>