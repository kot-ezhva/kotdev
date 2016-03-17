<?php

class DemoWidget extends CWidget
{
    public function run()
    {
        $item = Demo::model()->find();
        $this->render('index', [
            'item' => $item,
        ]);
    }
}