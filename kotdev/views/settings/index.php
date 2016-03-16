<?php
/**
 * @var $settings AdmSiteSettings
 * @var $item AdmSiteSettings
 */
?>

<div class="b-actions col-xs-12">
    <div class="row">
        <div class="col-xs-7">
            <div class="row">
                <h1>Настройки сайта</h1>
            </div>
        </div>
        <div class="col-xs-5 text-right">
            <div class="row">
                <?= CHtml::link('Создать', ['settings/create'], ['class' => 'btn btn-raised btn-success']) ?>
            </div>
        </div>
    </div>
</div>

<div class="b-settings col-xs-12">
    <?php foreach ($settings as $item) : ?>
        <div class="panel panel-default row">
            <div class="panel-body">
                <div class="col-xs-5">
                    <?= $item->name_for_user ?>
                </div>
                <div class="col-xs-5 text-left">
                    <?= $item->value ?>
                </div>
                <div class="col-xs-2 text-right">
                    <?= CHtml::link('<i class="material-icons">edit</i>', ['settings/edit', 'id' => $item->primaryKey]) ?>
                    <?= CHtml::link('<i class="material-icons">delete</i>', ['settings/delete', 'id' => $item->primaryKey]) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
