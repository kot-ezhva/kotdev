<?php

class AdmController extends CController
{
    public function actionMain()
    {
        $blocks = AdmBlock::model()->findAll();
        $this->render('main', [
            'blocks' => $blocks,
        ]);
    }

    public function actionCreate()
    {
        $block = new AdmBlock();
        $block->save();
        echo 1;

    }

    public function actionSetVisible($id = null, $vis = null)
    {
        if ($id) {
            $block = AdmBlock::model()->findByPk($id);
            if ($vis) {
                $block->visible = false;
            } else {
                $block->visible = true;
            }
            $block->update();
        }
        $this->actionMain();
    }

    public function actionEdit($id)
    {
        $block = AdmBlock::model()->findByPk($id);
        $modelName = $block->model;
        if ($block->multiple) {
            $model = CActiveRecord::model($modelName)->findAll();
            echo 1;
        } else {
            $this->actionSEdit($modelName);
        }
    }
    public function actionSEdit($modelName)
    {
        $model = CActiveRecord::model($modelName)->find();
        $block = AdmBlock::model()->with('admAttributes')->findByAttributes(['model' => $modelName]);
        $this->render('single_edit', [
            'model' => $model,
            'block' => $block,
        ]);
    }
}