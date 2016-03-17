<?php

class m160317_071933_add_demo_block_attributes extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('demo', 'phone', 'string NOT NULL');
        $this->insert('adm_attribute', [
            'id_block' => 1,
            'name' => 'phone',
            'type' => 'string'
        ]);

        $this->addColumn('demo', 'title', 'string NOT NULL');
        $this->insert('adm_attribute', [
            'id_block' => 1,
            'name' => 'title',
            'type' => 'string'
        ]);

        $this->addColumn('demo', 'subtitle', 'text');
        $this->insert('adm_attribute', [
            'id_block' => 1,
            'name' => 'subtitle',
            'type' => 'text'
        ]);

        $this->insert('demo', [
            'phone' => '+79041029447',
            'title' => 'Демо блок',
            'subtitle' => 'Это демонстрационный блок'
        ]);
    }

    public function safeDown()
    {
        $this->dropColumn('demo', 'phone');
        $this->delete('adm_attribute', 'name = :phone', [':phone' => 'phone']);

        $this->dropColumn('demo', 'title');
        $this->delete('adm_attribute', 'name = :title', [':title' => 'title']);

        $this->dropColumn('demo', 'subtitle');
        $this->delete('adm_attribute', 'name = :subtitle', [':subtitle' => 'subtitle']);

        $this->truncateTable('demo');
    }
}