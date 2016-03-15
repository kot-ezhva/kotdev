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
        $admBlock = new AdmBlock();
        if (isset($_POST['AdmBlock'])) {
            $admBlock->attributes = $_POST['AdmBlock'];
            if ($admBlock->save()) {
                $pkName = "id_" . $admBlock->table_name;
                Yii::app()->db->createCommand(
                    "CREATE TABLE " . $admBlock->table_name . "(
                      " . $pkName . " INT(11) NOT NULL AUTO_INCREMENT,
                      PRIMARY KEY (" . $pkName . ")); ")->execute();

                $this->redirect($this->createUrl('adm/main'));
            }
        }
        $this->render('create_block', [
            'admBlock' => $admBlock,
        ]);
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

    public function actionAttributes($id)
    {
        $attributes = AdmAttribute::model()->findAllByAttributes([
            'id_block' => $id,
        ]);
        $this->render('attributes_list', [
            'attributes' => $attributes,
            'idBlock' => $id,
        ]);
    }

    public function actionAddAttribute($idBlock)
    {
        $admAttribute = new AdmAttribute();
        if (isset($_POST['AdmAttribute'])) {
            $admAttribute->id_block = $idBlock;
            $admAttribute->attributes = $_POST['AdmAttribute'];
            if ($admAttribute->save()) {
                $this->redirect($this->createUrl('adm/main', []));
            }
        }
        $this->render('create_attribute', [
            'admAttribute' => $admAttribute,
        ]);
    }
}