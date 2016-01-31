<?php
/* @var $this AdminController */
$this->setPageTitle('Админка');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="icon" href="/images/favicon_admin.ico" type="image/x-icon" />

    <!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="admin-header">
    <?=CHtml::link('На сайт', Yii::app()->request->getBaseUrl(true).'/', array('class' => 'admin-link-style'));?>
    <?=CHtml::link('Выход', Yii::app()->request->getBaseUrl(true).'/logout', array('class' => 'fr admin-link-style'));?>

</div>
<div class="admin-navigation">
    <div class="admin-nav-header">Управление админкой</div>
    <?=CHtml::link('Страницы', Yii::app()->request->getBaseUrl(true).'/admin/pages/' );?>
</div>

<div class="admin-main">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'homeLink' => CHtml::link('Админка', array('/admin')),
			'links'=>$this->breadcrumbs,
            'separator' => ' <span>&rarr;</span> ',
		)); ?><!-- breadcrumbs -->
	<?php endif?>
    <?php  ?>
<?php echo $content; ?>
</div><!-- page -->

</body>
</html>
