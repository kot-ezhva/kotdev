<?php

class m160316_085013_create_adm_attribute_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('adm_attribute', [
			'id_attribute' => 'pk',
			'id_block' => 'integer',
			'name' => 'string NOT NULL',
			'type' => 'string NOT NULL',
		]);
	}

	public function down()
	{
		$this->dropTable('adm_attribute');
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