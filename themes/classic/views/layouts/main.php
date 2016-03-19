<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">
	<?php //Yii::app()->clientScript->registerCoreScript('bootstrap'); ?>
	<?php Yii::app()->clientScript->registerCoreScript('bootstrap.material'); ?>
	<?php HU::registerCss('main.css') ?>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,cyrillic">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<?php Yii::app()->clientScript->registerMetaTag(HU::getSettings('keywords'), 'keywords'); ?>
	<?php Yii::app()->clientScript->registerMetaTag(HU::getSettings('description'), 'description'); ?>

	<title><?= HU::getSettings('title') ?></title>
</head>

<body>
<?= $content; ?>
</body>
</html>
