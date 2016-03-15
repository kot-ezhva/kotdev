<?php
/**
 * @var $admAttribute AdmAttribute
 */
?>
<div class="page-header">
    <h1>Создать свойство блока</h1>
</div>
<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'edit-form',
    'clientOptions' => [
        'validateOnSubmit' => true
    ]
]); ?>
<?= $form->errorSummary($admAttribute, null, null, ['class'=>'alert alert-dismissible alert-danger form-error']); ?>
<div class="form-group label-floating">
    <?= $form->labelEx($admAttribute, 'name', ['class' => 'control-label']); ?>
    <?= $form->textField($admAttribute, 'name', ['class' => 'form-control']); ?>
    <?= $form->error($admAttribute, 'name'); ?>
</div>

<div class="form-group label-floating">
    <?= $form->labelEx($admAttribute, 'type', ['class' => 'control-label']); ?>
    <?= $form->dropDownList($admAttribute, 'type',[
        'int' => 'Число',
        'string' => 'Строка',
        'text' => 'Текст',
        'image' => 'Изображение'], ['class' => 'form-control']); ?>
    <?= $form->error($admAttribute, 'type'); ?>
</div>

<?= CHtml::submitButton('Создать', ['class' => 'btn btn-primary']); ?>
<?php $this->endWidget(); ?>
