<?php

class m160316_154143_create_site_settings_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('adm_site_settings', [
			'id_settings' => 'pk',
			'name' => 'string NOT NULL',
			'value' => 'string NOT NULL',
			'description' => 'text',
		]);
	}

	public function down()
	{
		$this->dropTable('adm_site_settings');
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