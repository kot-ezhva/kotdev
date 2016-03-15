<?php

Yii::setPathOfAlias('kotdev', dirname(__FILE__) . '/../../kotdev/');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'language' => 'ru',
    'theme' => 'classic',

    'preload' => array('log'),

    'import' => array(
        'application.models.*',
        'application.components.*',
        'kotdev.models.*',
        'kotdev.components.*',
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),

    'components' => array(

        'clientScript' => array(
            'corePackages' => require dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../kotdev/config/packages.php',
        ),

        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),

        'db' => require(dirname(__FILE__) . '/database.php'),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),

    ),
);
