<?php
Yii::setPathOfAlias('kotdev', realpath(dirname(__FILE__).'/../..'));
Yii::setPathOfAlias('project', dirname(__FILE__).'/../../protected');
$kotdevConfig = array(
    //'basePath' => dirname(__FILE__) . '/../../protected',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '../',
    'language' => 'ru',
    'defaultController' => 'block',

    // preloading 'log' component
    'preload' => array('log'),

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

        'clientScript' => array(
            'corePackages' => require dirname(__FILE__).DIRECTORY_SEPARATOR.'packages.php',
        ),

        'urlManager' => [
            'urlFormat' => 'path',
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],

        'log' => array(
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
        ),

    ),
);

$projectConfig = require(dirname(__FILE__).'/../../protected/config/main.php');
//print_r($kotdevConfig);
//exit;
return CMap::mergeArray($projectConfig, $kotdevConfig);