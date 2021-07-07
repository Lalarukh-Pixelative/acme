<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210706_112153_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->string(5)->unique(),
            'username' => $this->string(100),
            'email' => $this->string(40),
            'password' => $this->string(40),
            'Status' => $this->string(3),
            'contact_email' => $this->string(40),
            'contact_phone' => $this->integer(13)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
