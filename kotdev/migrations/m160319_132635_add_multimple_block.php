<?php

class m160319_132635_add_multimple_block extends CDbMigration
{
	public function safeUp()
	{
		$this->insert('adm_block', [
			'name' => 'Новости',
			'model' => 'News',
			'multiple' => 1,
			'visible' => 1,
			'table_name' => 'news',
			'widget' => 'application.widgets.news.NewsWidget',
		]);
		$this->createTable('news', [
			'id_news' => 'pk'
		]);

		$this->addColumn('news', 'title', 'string NOT NULL');
		$this->insert('adm_attribute', [
			'id_block' => 2,
			'name' => 'title',
			'type' => 'string'
		]);

		$this->addColumn('news', 'text', 'string NOT NULL');
		$this->insert('adm_attribute', [
			'id_block' => 2,
			'name' => 'text',
			'type' => 'string'
		]);

		$this->addColumn('news', 'link', 'string NOT NULL');
		$this->insert('adm_attribute', [
			'id_block' => 2,
			'name' => 'link',
			'type' => 'string'
		]);
	}

	public function safeDown()
	{
		$this->delete('adm_block', 'table_name = :news', [
			':news' => 'news'
		]);
		$this->dropTable('demo');
		$this->delete('adm_attribute', 'id_block = :title', [':title' => '2']);
	}
}