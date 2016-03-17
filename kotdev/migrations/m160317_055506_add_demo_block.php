<?php

class m160317_055506_add_demo_block extends CDbMigration
{
	public function safeUp()
	{
		$this->insert('adm_block', [
			'name' => 'Демо',
			'model' => 'Demo',
			'multiple' => 0,
			'visible' => 1,
			'table_name' => 'demo',
			'widget' => 'string NOT NULL',
		]);
		$this->createTable('demo', [
			'id_demo' => 'pk',
			'phone' => 'string NOT NULL',
			'name_for_user' => 'string NOT NULL',
			'value' => 'string NOT NULL',
			'description' => 'text',
		]);
	}

	public function safeDown()
	{
		$this->delete('adm_block', 'table_name = :demo', [
			':demo' => 'demo'
		]);
		$this->dropTable('demo');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}