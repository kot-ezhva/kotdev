<?php
/**
 * @var $attributes AdmAttribute
 * @var $attribute AdmAttribute
 */
?>
<div class="page-header">
    <h1>Свойства блока</h1>
</div>

<?php foreach($attributes as $attribute) : ?>

    <?= $attribute->name ?>
    <?= CHtml::link('Изменить', ['attribute/edit', 'id' => $attribute->id_attribute]) ?>
    <?= CHtml::link('Удалить', ['attribute/remove', 'id' => $attribute->id_attribute]) ?>
    <br>

<?php endforeach; ?>

<?= CHtml::link('<i class="material-icons">add</i>', ['attribute/add', 'idBlock' => $idBlock], ['class' => 'btn btn-info btn-fab add-attribute']) ?>
