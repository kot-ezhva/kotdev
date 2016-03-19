<div class="b-actions col-xs-12">
    <div class="row">
        <div class="col-xs-7">
            <div class="row">
                <h1>Привет, <?= Yii::app()->user->name ?>!</h1>
            </div>
        </div>
        <div class="col-xs-5 text-right">
            <div class="row">
                <?php /* CHtml::link('Создать', ['settings/create'], ['class' => 'btn btn-raised btn-success']) */ ?>
            </div>
        </div>
    </div>
</div>

<div class="b-dashboard col-xs-12">
    <div class="row">
        <?php $this->widget('application.widgets.dashboard.SiteInfoWidget'); ?>
        <?php $this->widget('application.widgets.dashboard.SiteInfoWidget'); ?>
    </div>
</div>