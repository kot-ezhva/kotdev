<?php
Yii::setPathOfAlias('kotdev', dirname(__FILE__).'/..');
Yii::setPathOfAlias('project', dirname(__FILE__).'/../../protected');
$kotdevConfig = array(
    //'basePath' => dirname(__FILE__) . '/../../protected',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../',
    'language' => 'ru',
    'defaultController' => 'block',

    // preloading 'log' component
    //'preload' => array('log'),

    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
        'project.models.*',
    ],

    'modules' => array(
        /*'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),*/
    ),

    'components' => array(

        'user' => [
            'allowAutoLogin' => true,
        ],

        'db' => require(dirname(__FILE__).'/../../protected/config/database.php'),

        'assetManager' => [
            'basePath' => dirname(__FILE__).'/../../assets',
            'baseUrl' => '/assets',
        ],

        'clientScript' => array(
            'corePackages' => require dirname(__FILE__).DIRECTORY_SEPARATOR.'packages.php',
            'class' => 'kotdev.ext.ExtendedClientScript.ExtendedClientScript',
            'combineCss' => true,
            'compressCss' => !YII_DEBUG,
            'combineJs' => true,
            'compressJs' => !YII_DEBUG,
            'jsMinPath' => 'kotdev.ext.ExtendedClientScript.jsmin.JSMin',
            'cssMinPath' => 'kotdev.ext.ExtendedClientScript.cssmin.cssmin',
            //'basePath' => dirname(__FILE__).'/../../assets',

            'autoRefresh' => !YII_DEBUG,
        ),

        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '/',
            'caseSensitive' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

        /*'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class'=>'CWebLogRoute',
                ),
            ),
        ),*/

    ),
);
return $kotdevConfig;