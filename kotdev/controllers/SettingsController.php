<?php

class SettingsController extends Controller
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
                'actions' => ['index', 'create', 'edit', 'delete'],
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
        $criteria = new CDbCriteria();
        $criteria->order = 'id_settings DESC';
        $settings = AdmSiteSettings::model()->findAll($criteria);
        $this->render('index', [
            'settings' => $settings,
        ]);
    }
    public function actionCreate()
    {
        $settingsItem = new AdmSiteSettings();
        if (isset($_POST['AdmSiteSettings'])) {
            $settingsItem->attributes = $_POST['AdmSiteSettings'];
            if ($settingsItem->save()) {
                $this->redirect($this->createUrl('settings/index'));
            }
        }
        $this->render('create', [
            'item' => $settingsItem,
        ]);
    }

    public function actionEdit($id)
    {
        $item = AdmSiteSettings::model()->findByPk($id);
        if (isset($_POST['AdmSiteSettings'])) {
            $item->attributes = $_POST['AdmSiteSettings'];
            if ($item->save()) {
                $this->redirect($this->createUrl('settings/index'));
            }
        }
        $this->render('edit', [
            'item' => $item
        ]);
    }

    public function actionDelete($id)
    {
        $item = AdmSiteSettings::model()->findByPk($id);
        $item->delete();
        $this->redirect($this->createUrl('settings/index'));
    }
}