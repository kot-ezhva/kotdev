<?php

class HeaderWidget extends CWidget
{
    public function run()
    {
        $header = Header::model()->find();
        $this->render('index', [
            'header' => $header,
        ]);
    }
}