<?php
/**
 * @var $this SiteController
 * @var $model RequestForm
 * @var $form CActiveForm
 */
$this->pageTitle = 'Заявка';
?>
<div id="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <h1>Заявка</h1>
                <?php $form = $this->beginWidget(
                'CActiveForm',
                array(
                    'id' => 'request-form',
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array(
                        'role' => 'form',
                    ),
                )
            ); ?>
                <?php
                $this->renderPartial('/layouts/_flash');
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'name'); ?>
                    <?php echo $form->textField(
                    $model,
                    'name',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'phone'); ?>
                    <?php echo $form->textField(
                    $model,
                    'phone',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email'); ?>
                    <?php echo $form->textField(
                    $model,
                    'email',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'type'); ?>
                    <?php echo $form->textField(
                    $model,
                    'type',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'period'); ?>
                    <?php echo $form->textField(
                    $model,
                    'period',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'pages'); ?>
                    <?php echo $form->textField(
                    $model,
                    'pages',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'comment'); ?>
                    <?php echo $form->textArea(
                    $model,
                    'comment',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <?php if (CCaptcha::checkRequirements()): ?>
                <div class="form-group">
                <?php $this->widget('CCaptcha', array(
                        'buttonLabel' => ''
                    )) ?><br/>
                <?php echo $form->textField($model, 'verifyCode', array(
                        'class' => 'form-control',
                        'placeholder' => 'Введите код с картинки',
                    )
                ) ?>
                </div>
                <? endif?>
                <?php echo CHtml::submitButton('Отправить', array('class' => 'btn btn-success'));?>
                <?php $this->endWidget(); ?>
                <br/>
                <p>Примечание: ответ вышлем на почту или смс-оповещением.</p>
            </div>
        </div>
    </div>
</div>