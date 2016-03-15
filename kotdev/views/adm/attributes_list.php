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

<?php endforeach; ?>

<?= CHtml::link('<i class="material-icons">add</i>', ['adm/addattribute', 'idBlock' => $idBlock], ['class' => 'btn btn-info btn-fab add-attribute']) ?>
