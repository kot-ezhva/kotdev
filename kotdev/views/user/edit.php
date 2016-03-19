<?php
/**
 * @var $user User
 */
?>
    <div class="page-header">
        <h1>Изменить профиль</h1>
    </div>
<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'edit-form',
    'clientOptions' => [
        'validateOnSubmit' => true
    ]
]); ?>
<?= $form->errorSummary($user, null, null, ['class'=>'alert alert-dismissible alert-danger form-error']); ?>
    <div class="form-group label-floating">
        <?= $form->labelEx($user, 'name', ['class' => 'control-label']); ?>
        <?= $form->textField($user, 'name', ['class' => 'form-control']); ?>
        <?= $form->error($user, 'name'); ?>
    </div>

    <div class="form-group label-floating">
        <?= $form->labelEx($user, 'password', ['class' => 'control-label']); ?>
        <?= $form->passwordField($user, 'password', ['class' => 'form-control']); ?>
        <?= $form->error($user, 'password'); ?>
    </div>

<?= CHtml::submitButton('Сохранить', ['class' => 'btn btn-primary pull-right']); ?>
<?= CHtml::link('Отмена', ['settings/index'], ['class' => 'btn btn-default pull-right']); ?>
<?php $this->endWidget(); ?>