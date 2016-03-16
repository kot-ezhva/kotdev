<?php

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

    'components'=>array(

        'db' => require(dirname(__FILE__).'/../../protected/config/database.php'),
    ),
);
