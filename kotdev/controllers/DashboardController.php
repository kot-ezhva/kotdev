<?php

class DashboardController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return [
            [
                'allow',
                'actions' => ['index'],
                'users' => ['@'],
            ],
            [
                'deny',
                'users' => ['*'],
            ],
        ];
    }
    public function actionIndex()
    {
        $this->render('index');
    }
}