<?php
/**
 * @var $attributes AdmAttribute
 * @var $attribute AdmAttribute
 */
?>
<div class="b-actions col-xs-12">
    <div class="row">
        <div class="col-xs-7">
            <div class="row">
                <h1>Свойства блока</h1>
            </div>
        </div>
        <div class="col-xs-5 text-right">
            <div class="row">
                <?= CHtml::link('Создать', ['attribute/add', 'idBlock' => $idBlock], ['class' => 'btn btn-raised btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<div class="b-attributes col-xs-12">
    <?php foreach($attributes as $attribute) : ?>
        <div class="panel panel-default row">
            <div class="panel-body">
                <div class="col-xs-9">
                    <?= $attribute->name ?>
                </div>
                <div class="col-xs-3 text-right">
                    <?= CHtml::link('<i class="material-icons">mode_edit</i>', ['attribute/edit', 'id' => $attribute->id_attribute]) ?>
                    <?= CHtml::link('<i class="material-icons">delete</i>', ['attribute/remove', 'id' => $attribute->id_attribute]) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

