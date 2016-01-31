<?php
/* @var $this PagesController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Страницы'
);
?>
<?=CHtml::link('Добавить', array('create'), array('class' => 'admin-button-add'));?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'alias',
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
