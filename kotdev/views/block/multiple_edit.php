<div class="b-actions col-xs-12">
    <div class="row">
        <div class="col-xs-7">
            <div class="row">
                <h1><?= $block->name ?></h1>
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
    <?php foreach ($models as $item) : ?>
        <div class="panel panel-default row">
            <div class="panel-body">
                <div class="col-xs-9">
                    <?= $item->primaryKey ?>
                </div>
                <div class="col-xs-3 text-right">
                    <?= CHtml::link(
                        '<i class="material-icons">mode_edit</i>',
                        [
                            'block/medit',
                            'id' => $item->primaryKey,
                            'modelName' => $block->model,
                        ]
                    );
                    ?>

                    <?= CHtml::link(
                        '<i class="material-icons">delete</i>',
                        [
                            'block/delete',
                            'id' => $item->primaryKey,
                        ]
                    ); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>