<?php
/**
 * @var $block AdmBlock
 */
?>

<div class="b-block col-xs-12">
    <?php foreach ($blocks as $block) : ?>
        <div class="item row">
            <div class="col-xs-10">
                <p class="name">
                    <?= 'Блок "' . $block->name . '"' ?>
                </p>
            </div>
            <div class="col-xs-2 text-right">
                <?= CHtml::link(
                    '<i class="material-icons">mode_edit</i>',
                    [
                        'adm/attributes',
                        'id' => $block->primaryKey,
                    ]
                ); ?>
                <?= CHtml::link(
                    '<i class="material-icons">mode_edit</i>',
                    [
                        'adm/edit',
                        'id' => $block->primaryKey,
                    ]
                    );

                if($block->visible){
                    echo CHtml::link(
                        '<i class="material-icons">visibility</i>',
                        [
                            'adm/setvisible',
                            'id' => $block->primaryKey,
                            'vis' => true
                        ]
                    );
                }else{
                    echo CHtml::link(
                        '<i class="material-icons">visibility_off</i>',
                        [
                            'adm/setvisible',
                            'id' => $block->primaryKey,
                            'vis' => false
                        ]
                    );
                }?>
            </div>
        </div>
    <?php endforeach; ?>
    <?= CHtml::link('<i class="material-icons">add</i>', ['adm/create'], ['class' => 'btn btn-info btn-fab add-block']) ?>
</div>