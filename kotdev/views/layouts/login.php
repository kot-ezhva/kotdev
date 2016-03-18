<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="ru">
    <?php //Yii::app()->clientScript->registerCoreScript('bootstrap'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('bootstrap.material'); ?>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,cyrillic">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <title><?= CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container">
    <?= $content ?>
</div>
<script>
    $.material.init();
</script>
</body>
</html>