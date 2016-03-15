<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">
	<?php Yii::app()->clientScript->registerCoreScript('bootstrap'); ?>

	<title><?= CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?= $content; ?>
</body>
</html>
