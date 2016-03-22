<div class="b-actions col-xs-12">
    <div class="row">
        <div class="col-xs-7">
            <div class="row">
                <h1><?= $block->name ?></h1>
            </div>
        </div>
        <div class="col-xs-5 text-right">
            <div class="row">
                <?= CHtml::link('Создать', ['block/recordcreate', 'modelName' => $block->model], ['class' => 'btn btn-raised btn-success']) ?>
            </div>
        </div>
    </div>
</div>
<div class="b-block col-xs-12">
    <?php foreach ($models as $item) : ?>
        <div class="panel panel-default row">
            <div class="panel-body">
                <div class="col-xs-9">
                    <?php $i = 0; ?>
                    <?php foreach($item as $key => $val) : ?>
                        <?php
                        $i++;
                        if($i == 2) echo $val;
                        ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-xs-3 text-right">
                    <?= CHtml::link(
                        '<i class="material-icons">mode_edit</i>',
                        [
                            'block/recordedit',
                            'modelName' => $block->model,
                            'id' => $item->primaryKey,
                        ]
                    );
                    ?>

                    <?= CHtml::link(
                        '<i class="material-icons">delete</i>',
                        [
                            'block/recorddelete',
                            'id' => $item->primaryKey,
                            'modelName' => $block->model,
                        ]
                    ); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>