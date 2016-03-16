<?php

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

    'preload'=>array('log'),

    'components'=>array(

        'db' => require(dirname(__FILE__).'/../../protected/config/database.php'),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),

    ),
);
