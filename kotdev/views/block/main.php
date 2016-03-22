<?php
/**
 * @var $block AdmBlock
 */
?>

<div class="b-actions col-xs-12">
    <div class="row">
        <div class="col-xs-7">
            <div class="row">
                <h1>Блоки сайта</h1>
            </div>
        </div>
        <div class="col-xs-5 text-right">
            <div class="row">
                <?php if(User::isDev()) : ?>
                    <?= CHtml::link('Создать', ['block/create'], ['class' => 'btn btn-raised btn-success']) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="b-block col-xs-12" id="sortable-blocks">
    <?php foreach ($blocks as $block) : ?>
        <div class="panel panel-default row" id="block-<?= $block->primaryKey ?>">
            <div class="panel-body">
                <div class="col-xs-9">
                    <i class="material-icons">open_with</i>
                    <?= 'Блок "' . $block->name . '"' ?>
                </div>
                <div class="col-xs-3 text-right">
                    <?php if($block->multiple) : ?>
                        <?= CHtml::link(
                            '<i class="material-icons">mode_edit</i>',
                            [
                                'block/recordlist',
                                'modelName' => $block->model,
                            ]
                        ); ?>

                    <?php else : ?>

                        <?= CHtml::link(
                            '<i class="material-icons">mode_edit</i>',
                            [
                                'block/edit',
                                'modelName' => $block->model,
                            ]
                        ); ?>

                    <?php endif; ?>


                    <?php if ($block->visible) {
                        echo CHtml::link(
                            '<i class="material-icons">visibility</i>',
                            [
                                'block/setvisible',
                                'id' => $block->primaryKey,
                                'vis' => true
                            ]
                        );
                    } else {
                        echo CHtml::link(
                            '<i class="material-icons">visibility_off</i>',
                            [
                                'block/setvisible',
                                'id' => $block->primaryKey,
                                'vis' => false
                            ]
                        );
                    } ?>
                    <?php if(User::isDev()) : ?>
                        <?= CHtml::link(
                            '<i class="material-icons">list</i>',
                            [
                                'attribute/list',
                                'id' => $block->primaryKey,
                            ]
                        ); ?>
                        <?= CHtml::link(
                            '<i class="material-icons">delete</i>',
                            [
                                'block/delete',
                                'id' => $block->primaryKey,
                            ]
                        ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    var blocksContainer = $("#sortable-blocks");
    blocksContainer.sortable({
        axis: 'y',
        stop: function (event, ui) {
            var data = $(this).sortable('serialize');
            //$('.response').text(oData);
            $.ajax({
                data: data,
                type: 'POST',
                url: "<?= Yii::app()->createUrl('block/setsequence') ?>"
            });
        }
    });
    blocksContainer.disableSelection();
</script>