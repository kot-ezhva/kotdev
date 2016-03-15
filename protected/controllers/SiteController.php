<?php

class SiteController extends Controller
{
	public function actionIndex()
	{
		$cr = new CDbCriteria();
		$cr->order = "sequence DESC";
		$cr->condition = "visible = 1";
		$blocks = AdmBlock::model()->findAll($cr);
		$this->render('index', [
			'blocks' => $blocks,
		]);
	}
}