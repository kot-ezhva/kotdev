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
        return [
            [
                'allow',
                'actions' => [
                    'index',
                    'create',
                    'setvisible',
                    'edit',
                    'delete',
                    'setsequence',
                    'recordlist',
                    'recordedit',
                    'recorddelete',
                    'recordcreate',
                ],
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
        $cr = new CDbCriteria();
        $cr->order = "sequence ASC";
        $blocks = AdmBlock::model()->findAll($cr);
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

    public function actionEdit($modelName)
    {
        $model = CActiveRecord::model($modelName)->find();
        $block = AdmBlock::model()->with('admAttributes')->findByAttributes(['model' => $modelName]);
        if (!$model) {
            $model = new $modelName();
        } elseif (isset($_POST[$modelName])) {
            $model->attributes = $_POST[$modelName];
            if ($model->save()) {
                $this->redirect($this->createUrl('block/index'));
            }
        }
        $this->render('edit', [
            'model' => $model,
            'block' => $block,
        ]);
    }

    public function actionDelete($id)
    {
        $block = AdmBlock::model()->findByPk($id);
        $table = $block->table_name;
        if ($block->delete()) {
            $command = Yii::app()->db->createCommand();
            $command->dropTable($table);
        }
        $this->redirect($this->createUrl('block/index'));
    }

    public function actionRecordList($modelName)
    {
        $recordsExists = CActiveRecord::model($modelName)->find();
        $cr = new CDbCriteria();
        if($recordsExists){
            $pk = $recordsExists->getTableSchema()->primaryKey;
            $cr->order = $pk . ' DESC';
        }
        $models = CActiveRecord::model($modelName)->findAll($cr);
        $block = AdmBlock::model()->findByAttributes(['model' => $modelName]);
        $this->render('record_list', [
            'models' => $models,
            'block' => $block,
        ]);

    }

    public function actionRecordEdit($id, $modelName)
    {
        $model = CActiveRecord::model($modelName)->findByPk($id);
        if($model){
            $block = AdmBlock::model()->with('admAttributes')->findByAttributes(['model' => $modelName]);
            if (isset($_POST[$modelName])) {
                $model->attributes = $_POST[$modelName];
                if ($model->save()) {
                    $this->redirect($this->createUrl('block/recordlist', ['modelName' => $modelName]));
                }
            }
            $this->render('edit', [
                'model' => $model,
                'block' => $block,
            ]);
        }
    }

    public function actionRecordCreate($modelName)
    {
        $model = new $modelName();
        $block = AdmBlock::model()->with('admAttributes')->findByAttributes(['model' => $modelName]);
        if (isset($_POST[$modelName])) {
            $model->attributes = $_POST[$modelName];
            if ($model->save()) {
                $this->redirect($this->createUrl('block/recordlist', ['modelName' => $modelName]));
            }
        }
        $this->render('edit', [
            'model' => $model,
            'block' => $block,
        ]);
    }

    public function actionRecordDelete($id, $modelName)
    {
        $model = CActiveRecord::model($modelName)->findByPk($id);
        $model->delete();
        $this->redirect($this->createUrl('block/recordlist', ['modelName' => $modelName]));
    }

    public function actionSetSequence()
    {
        if (isset($_POST['block'])) {
            $postsIds = $_POST['block'];
            foreach ($postsIds as $seq => $id) {
                $block = AdmBlock::model()->findByPk($id);
                $block->sequence = $seq;
                $block->update();
            }
        }
    }
}