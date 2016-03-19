<?php

class m160319_114006_add_site_name extends CDbMigration
{
    public function safeUp()
    {
        $this->insert('adm_site_settings', [
            'name' => 'title',
            'name_for_user' => 'Название сайта',
            'value' => 'Введите сюда название сайта',
            'description' => 'Выводится в названии вкладки (используется поисковыми системами)',
        ]);
    }

    public function safeDown()
    {
        $this->delete('adm_site_settings', 'name = :title', [':title' => 'title']);
    }
}