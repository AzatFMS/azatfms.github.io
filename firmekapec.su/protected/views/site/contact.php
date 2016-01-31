<?php
/**
 * @var $this SiteController
 * @var $model ContactForm
 * @var $form CActiveForm
 * @var $news News[]
 */
$this->pageTitle = 'Контакты';
?>
<div id="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1>Обратная связь</h1>
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
                    <?php echo $form->labelEx($model, 'text'); ?>
                    <?php echo $form->textArea(
                    $model,
                    'text',
                    array(
                        'class' => 'form-control',
                    )
                ); ?>
                </div>
                <?php if (CCaptcha::checkRequirements()): ?>
                <div class="form-group">
                    <?php $this->widget(
                    'CCaptcha',
                    array(
                        'buttonLabel' => ''
                    )
                ) ?><br/>
                    <?php echo $form->textField(
                    $model,
                    'verifyCode',
                    array(
                        'class' => 'form-control',
                        'placeholder' => 'Введите код с картинки',
                    )
                ) ?>
                </div>
                <? endif?>
                <?php echo CHtml::submitButton('Отправить', array('class' => 'btn btn-success'));?>
                <?php $this->endWidget(); ?>
            </div>
            <div class="col-lg-4">
                <h1>Контакты</h1>
                <p>
                    По всем интересующим вопросам вы можете связаться с нами по телефону,
                    или написав нам через форму обратной связи
                </p>

                <p>
                    г. Казань, ул. Тестовая, д. 11, кв. 111
                </p>
                <p>
                    тел. 890000000
                </p>
                <p>
                    text@text.ru
                </p>
            </div>
        </div>
    </div>
</div>