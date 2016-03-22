<?php

class NewsWidget extends CWidget
{
    public function run()
    {
        $cr = new CDbCriteria();
        $cr->limit = 3;
        $cr->order = 'id_news DESC';
        $news = News::model()->findAll($cr);
        $this->render('index', [
            'news' => $news,
        ]);
    }
}