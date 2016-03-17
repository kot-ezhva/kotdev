<?php
/**
 * @var $item Demo
 */
?>
<?php
HU::registerCss('demo.css');
?>

<div class="container-fluid b-demo">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-8 phone">
            <h3 class="text-right"><i class="material-icons">phone</i> <?= $item->phone ?></h3>
        </div>
        <div class="col-xs-8 col-xs-offset-2 title">
            <h1 class="text-center"><?= $item->title ?></h1>
        </div>
        <div class="col-xs-8 col-xs-offset-2 subtitle">
            <p class="text-center"><?= $item->subtitle ?></p>
        </div>
    </div>
</div>
