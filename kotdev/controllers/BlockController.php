<?php

class BlockController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions'=>array('index', 'create', 'setvisible', 'edit', 'sedit', 'delete'),
                'users'=>array('?'),
            ),
            array('deny',
                'actions'=>array('*'),
                'users'=>array('*'),
            ),
        );
    }

    public function actionIndex()
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
                $command = Yii::app()->db->createCommand();
                $command->createTable(
                    $admBlock->table_name,
                    [
                        $pkName => 'pk',
                    ]
                );

                $this->redirect($this->createUrl('block/index'));
            }
        }
        $this->render('create', [
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
        $this->actionIndex();
    }

    public function actionEdit($id)
    {
        $block = AdmBlock::model()->findByPk($id);
        $modelName = $block->model;
        if ($block->multiple) {
            $model = CActiveRecord::model($modelName)->findAll();
        } else {
            $this->actionSEdit($modelName);
        }
    }

    public function actionSEdit($modelName)
    {
        $model = CActiveRecord::model($modelName)->find();
        $block = AdmBlock::model()->with('admAttributes')->findByAttributes(['model' => $modelName]);
        if(!$model){
            $model = new $modelName();
        }elseif (isset($_POST[$modelName])) {
            $model->attributes = $_POST[$modelName];
        if ($model->save()) {
            $this->redirect($this->createUrl('block/index'));
        }
    }
        $this->render('single_edit', [
            'model' => $model,
            'block' => $block,
        ]);
    }

    public function actionDelete($id)
    {
        $block = AdmBlock::model()->findByPk($id);
        $table = $block->table_name;
        if($block->delete()){
            $command = Yii::app()->db->createCommand();
            $command->dropTable($table);
        }
        $this->redirect($this->createUrl('block/index'));
    }
}