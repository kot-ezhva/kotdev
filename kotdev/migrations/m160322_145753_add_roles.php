<?php

class m160322_145753_add_roles extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('adm_user', 'role', 'string NOT NULL');
        $this->update('adm_user', ['role' => 'dev'], ':username = username', [':username' => 'admin']);
    }

    public function safeDown()
    {
        $this->dropColumn('adm_user', 'role');
    }
}