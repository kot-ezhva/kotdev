<?php
/**
 * @var $news News
 * @var $item News
 */
?>
<?php HU::registerCss('news.css'); ?>
<div class="container b-news">
    <div class="row text-center title">
        <h2>Блок новостей</h2>
    </div>
    <div class="row">
        <?php foreach($news as $item) : ?>
            <div class="col-sm-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $item->title ?></h3>
                    </div>
                    <div class="panel-body">
                        <?= $item->text ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
