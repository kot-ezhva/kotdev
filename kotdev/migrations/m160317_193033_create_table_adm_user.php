<?php

class m160317_193033_create_table_adm_user extends CDbMigration
{
	public function up()
	{
		$this->createTable('adm_user', [
			'id_user' => 'pk',
			'username' => 'string NOT NULL',
			'name' => 'string NOT NULL',
			'password' => 'string NOT NULL',
		]);
	}

	public function down()
	{
		$this->dropTable('adm_user');
	}

}