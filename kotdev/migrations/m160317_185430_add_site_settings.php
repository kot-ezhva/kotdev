<?php

class m160317_185430_add_site_settings extends CDbMigration
{
	public function safeUp()
	{
		$this->insert('adm_site_settings', [
			'name' => 'keywords',
			'name_for_user' => 'Ключевые слова',
			'value' => 'слово1, слово2, слово3, слово4',
			'description' => 'Это могут быть как отдельные слова, так и словосочетания, но они обязательно должны встречаться в тексте на странице. По ним поисковики определяют релевантность страницы тому или иному запросу.'
		]);
		$this->insert('adm_site_settings', [
			'name' => 'description',
			'name_for_user' => 'Описание сайта',
			'value' => 'Краткое описание сайта',
			'description' => 'Именно «краткое» и именно «описание страницы». Достаточно добавить одно-два небольших предложения, в которых указать о чём и для кого эта страница.'
		]);
	}

	public function safeDown()
	{
		$this->delete('adm_site_settings', 'name = :keywords', [':keywords' => 'keywords']);
		$this->delete('adm_site_settings', 'name = :description', [':description' => 'description']);
	}
}