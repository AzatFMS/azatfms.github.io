<?php
/**
 * @var $this SiteController
 * @var $form CActiveForm
 * @var $model LoginForm
 */
$this->pageTitle = Yii::app()->name . ' - Вход';
$this->breadcrumbs = array(
    'Вход',
);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4" style="padding-bottom: 50px">
            <h1>Вход</h1>
            <?php $form = $this->beginWidget(
            'CActiveForm',
            array(
                'id' => 'login-form',
                'htmlOptions' => array(
                    'role' => 'form',
                ),
            )
        ); ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'username'); ?>
                <?php echo $form->textField($model, 'username', array(
                    'class' => 'form-control',
                )); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array(
                    'class' => 'form-control',
                )); ?>
            </div>
            <div class="checkbox">
                <label>
                    <?php echo $form->checkBox($model, 'rememberMe');?> <?php echo $model->getAttributeLabel('rememberMe'); ?>
                </label>
            </div>
            <?php echo CHtml::submitButton('Войти', array('class' => 'btn'));?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
