<?php
/* @var $this PagesController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
        <? $this->widget('ext.ckeditor.CKEditorWidget', array(
            'model' => $model,
            'attribute' => "content",
            'defaultValue' => $model->content,
            'config' => array(
                'height' => "400px",
                'width' => "100%",
                'language' => "ru",
                'filebrowserImageUploadUrl' => '/admin/file/uploadImg/',
                'filebrowserUploadUrl' => '/admin/file/uploadImg/',
            ),
        )
    )
    ;?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить',array('class' => 'admin-submit')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->