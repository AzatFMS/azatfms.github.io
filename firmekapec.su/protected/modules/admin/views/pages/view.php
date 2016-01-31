<?php
/* @var $this PagesController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'=>array('index'),
	$model->title,
    'Редактирование' => array('update', 'id' => $model->id),
);

?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'alias',
		'title',
		'keywords',
        'created',
		'content:html',
	),
)); ?>
