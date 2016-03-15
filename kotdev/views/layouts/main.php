<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <?php
    Yii::app()->clientScript->registerCoreScript('bootstrap.material');
    Yii::app()->clientScript->registerCoreScript('admin.css');
    ?>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <title><?= CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/kotdev">kotDev</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Андрей <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/">Перейти на сайт</a></li>
                        <li><a href="#">Изменить профиль</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Выйти</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="col-xs-3">
        <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
            <li><?= CHtml::link('Блоки', Yii::app()->createUrl('block/index')); ?></li>
            <li><a href="javascript:void(0)">Profile</a></li>
            <li class="disabled"><a href="javascript:void(0)">Disabled</a></li>
        </ul>
    </div>
    <div class="col-xs-9 b-content">
        <?= $content; ?>
    </div>


</div>

<script>
    $.material.init();
</script>
</body>
</html>
