<?php

class m160319_133824_add_admin_user extends CDbMigration
{
    public function safeUp()
    {
        $this->insert('adm_user', [
            'username' => 'admin',
            'name' => 'Администратор',
            'password' => '$2y$13$3MnBth/c/F3Dj0o9OPXKDenY/8wp20rqvRkb0r2.1U2.FoIhhOg3u',
        ]);
    }

    public function safeDown()
    {
        $this->delete('adm_user', 'username = :username', [':username' => 'admin']);
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