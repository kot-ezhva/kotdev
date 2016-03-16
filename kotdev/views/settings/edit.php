<?php
/**
 * @var $item AdmSiteSettings
 */
?>
    <div class="page-header">
        <h1>Изменить настройку</h1>
    </div>
<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'edit-form',
    'clientOptions' => [
        'validateOnSubmit' => true
    ]
]); ?>
<?= $form->errorSummary($item, null, null, ['class'=>'alert alert-dismissible alert-danger form-error']); ?>
    <div class="form-group label-floating">
        <?= $form->labelEx($item, 'name', ['class' => 'control-label']); ?>
        <?= $form->textField($item, 'name', ['class' => 'form-control']); ?>
        <?= $form->error($item, 'name'); ?>
        <p class="help-block">Например: keywords</p>
    </div>

    <div class="form-group label-floating">
        <?= $form->labelEx($item, 'name_for_user', ['class' => 'control-label']); ?>
        <?= $form->textField($item, 'name_for_user', ['class' => 'form-control']); ?>
        <?= $form->error($item, 'name_for_user'); ?>
        <p class="help-block">Например: Ключевые слова</p>
    </div>
    <div class="form-group label-floating">
        <?= $form->labelEx($item, 'value', ['class' => 'control-label']); ?>
        <?= $form->textField($item, 'value', ['class' => 'form-control']); ?>
        <?= $form->error($item, 'value'); ?>
        <p class="help-block">Например: слово1, слово2, слово3</p>
    </div>
    <div class="form-group label-floating">
        <?= $form->labelEx($item, 'description', ['class' => 'control-label']); ?>
        <?= $form->textField($item, 'description', ['class' => 'form-control']); ?>
        <?= $form->error($item, 'description'); ?>
        <p class="help-block">Подсказка для администратора</p>
    </div>

<?= CHtml::submitButton('Сохранить', ['class' => 'btn btn-primary']); ?>
<?php $this->endWidget(); ?>