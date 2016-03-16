<?php

class m160316_084132_create_adm_block_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('adm_block', [
			'id_block' => 'pk',
			'name' => 'string NOT NULL',
			'sequence' => 'integer',
			'model' => 'string NOT NULL',
			'multiple' => 'integer',
			'visible' => 'integer',
			'table_name' => 'string NOT NULL',
		]);
	}

	public function down()
	{
		$this->dropTable('adm_block');
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