<?php
/* @var $this PagesController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Редактирвоание',
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>