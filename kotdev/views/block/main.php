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
                <?= CHtml::link('Создать', ['block/create'], ['class' => 'btn btn-raised btn-success']) ?>
            </div>
        </div>
    </div>
</div>

<div class="b-block col-xs-12">
    <?php foreach ($blocks as $block) : ?>
        <div class="panel panel-default row">
            <div class="panel-body">
                <div class="col-xs-9">
                    <?= 'Блок "' . $block->name . '"' ?>
                </div>
                <div class="col-xs-3 text-right">
                    <?= CHtml::link(
                        '<i class="material-icons">mode_edit</i>',
                        [
                            'block/edit',
                            'id' => $block->primaryKey,
                        ]
                    );

                    if($block->visible){
                        echo CHtml::link(
                            '<i class="material-icons">visibility</i>',
                            [
                                'block/setvisible',
                                'id' => $block->primaryKey,
                                'vis' => true
                            ]
                        );
                    }else{
                        echo CHtml::link(
                            '<i class="material-icons">visibility_off</i>',
                            [
                                'block/setvisible',
                                'id' => $block->primaryKey,
                                'vis' => false
                            ]
                        );
                    }?>
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
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>