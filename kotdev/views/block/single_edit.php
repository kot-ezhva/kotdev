<?php
/**
 * @var $model CActiveRecord
 */
?>
<?php
$pk = $model->getTableSchema()->primaryKey;
$attributes = $block->admAttributes;
?>
<div class="page-header">
    <h1><?= $block->name ?></h1>
</div>
<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'edit-form',
    'clientOptions' => [
        'validateOnSubmit' => true
    ]
]); ?>
<?= $form->errorSummary($model); ?>
<?php foreach ($model as $key => $value) : ?>
    <?php if ($key == $pk) continue; ?>
    <?php $type = AdmAttribute::getType($block->primaryKey, $key); ?>
    <div class="form-group">
        <?= $form->labelEx($model, $key, ['class' => 'control-label']); ?>
        <?php
        switch($type){
            case "string" :
                echo $form->textField($model, $key, ['class' => 'form-control']);
                break;
            case "text" :
                echo $form->textArea($model, $key, ['class' => 'form-control']);
                break;
            case "int" :
                echo $form->textField($model, $key, ['class' => 'form-control']);
                break;
            case "image" :
                echo '<input type="text" readonly="" class="form-control" placeholder="Выберите файл">';
                echo $form->fileField($model, $key, ['class' => 'form-control']);
                break;
        }
        ?>

        <?= $form->error($model, $key); ?>
    </div>
<?php endforeach; ?>
<?= CHtml::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']); ?>
<?= CHtml::link('Отмена', ['block/index'], ['class' => 'btn btn-default pull-right']); ?>
<?php $this->endWidget(); ?>
