<?php

class AttributeController extends Controller
{
	public function actionList($id)
	{
		$attributes = AdmAttribute::model()->findAllByAttributes([
			'id_block' => $id,
		]);
		$this->render('list', [
			'attributes' => $attributes,
			'idBlock' => $id,
		]);
	}

	public function actionAdd($idBlock)
	{
		$admAttribute = new AdmAttribute();
		if (isset($_POST['AdmAttribute'])) {
			$admAttribute->id_block = $idBlock;
			$admAttribute->attributes = $_POST['AdmAttribute'];
			if ($admAttribute->save()) {
				$tableName = AdmBlock::model()->findByPk($idBlock)->table_name;
				$type = $admAttribute->convertTypeToBase($admAttribute->type);

				$command = Yii::app()->db->createCommand();
				$command->addColumn(
					$tableName,
					$admAttribute->name,
					$type
				);
				$this->redirect($this->createUrl('attribute/list', ['id' => $idBlock]));
			}
		}
		$this->render('create', [
			'admAttribute' => $admAttribute,
		]);
	}

	public function actionEdit($id)
	{
		$admAttribute = AdmAttribute::model()->findByPk($id);
		$oldName = $admAttribute->name;
		$block = AdmBlock::model()->findByPk($admAttribute->id_block);
		if (isset($_POST['AdmAttribute'])) {
			$admAttribute->attributes = $_POST['AdmAttribute'];
			if ($admAttribute->save()) {
				$tableName = $block->table_name;
				$type = $admAttribute->convertTypeToBase($admAttribute->type);

				$command = Yii::app()->db->createCommand();
				$command->renameColumn(
					$tableName,
					$oldName,
					$admAttribute->name
				);
				$command->alterColumn(
					$tableName,
					$admAttribute->name,
					$type
				);
				$this->redirect($this->createUrl('attribute/list', ['id' => $admAttribute->id_block]));
			}
		}
		$this->render('create', [
			'admAttribute' => $admAttribute,
		]);
	}

	public function actionRemove($id)
	{
		$attribute = AdmAttribute::model()->findByPk($id);
		$block = AdmBlock::model()->findByPk($attribute->id_block);
		$table = $block->table_name;
		if($attribute->delete()){
			$command = Yii::app()->db->createCommand();
			$command->dropColumn(
				$table,
				$attribute->name
			);
			$this->redirect($this->createUrl('attribute/list', ['id' => $block->primaryKey]));
		}
	}

}