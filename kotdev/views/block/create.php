<?php
/**
 * @var $admBlock AdmBlock
 */
?>
<div class="page-header">
    <h1>Создать блок</h1>
</div>
<?php $form = $this->beginWidget('CActiveForm', [
    'id' => 'edit-form',
    'clientOptions' => [
        'validateOnSubmit' => true
    ]
]); ?>
    <?= $form->errorSummary($admBlock, null, null, ['class'=>'alert alert-dismissible alert-danger form-error']); ?>
    <div class="form-group label-floating">
        <?= $form->labelEx($admBlock, 'name', ['class' => 'control-label']); ?>
        <?= $form->textField($admBlock, 'name', ['class' => 'form-control']); ?>
        <?= $form->error($admBlock, 'name'); ?>
        <p class="help-block">Например: Контакты</p>
    </div>

    <div class="form-group label-floating">
        <?= $form->labelEx($admBlock, 'model', ['class' => 'control-label']); ?>
        <?= $form->textField($admBlock, 'model', ['class' => 'form-control']); ?>
        <?= $form->error($admBlock, 'model'); ?>
        <p class="help-block">Например: Contact</p>
    </div>
    <div class="form-group label-floating">
        <?= $form->labelEx($admBlock, 'table_name', ['class' => 'control-label']); ?>
        <?= $form->textField($admBlock, 'table_name', ['class' => 'form-control']); ?>
        <?= $form->error($admBlock, 'table_name'); ?>
        <p class="help-block">Например: tbl_contact</p>
    </div>
    <div class="form-group label-floating">
        <?= $form->labelEx($admBlock, 'widget', ['class' => 'control-label']); ?>
        <?= $form->textField($admBlock, 'widget', ['class' => 'form-control']); ?>
        <?= $form->error($admBlock, 'widget'); ?>
        <p class="help-block">Например: application.widgets.contact.ContactWidget</p>
    </div>
    <div class="form-group">
        <div class="togglebutton">
            <label>
                <?= $form->checkBox($admBlock, 'multiple');
                echo " " . $admBlock->attributeLabels()['multiple'];
                ?>
            </label>
        </div>
        <div class="togglebutton">
            <label>
                <?= $form->checkBox($admBlock, 'visible');
                echo "   " . $admBlock->attributeLabels()['visible'];
                ?>
            </label>
        </div>
    </div>

<?= CHtml::submitButton('Создать', ['class' => 'btn btn-primary']); ?>
<?php $this->endWidget(); ?>