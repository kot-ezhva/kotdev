<?php
$yii = dirname(__FILE__) . '/yii/yii.php';
require_once($yii);
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
$config = dirname(__FILE__) . '/config/main.php';

Yii::createWebApplication($config)->run();
