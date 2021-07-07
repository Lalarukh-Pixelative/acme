<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_number}}`.
 */
class m210706_132620_create_phone_number_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone_number}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(5),
            'country_id' => $this->integer(5),
            'number' => $this->integer(12),
            'verification_code' => $this->integer(8),
            'verified' => $this->string(3),
            'active' => $this->string(3),
            'created' => $this->string(50),
        ]);

        $this->createIndex('idx_phone_number_user_id_user_idx', 'phone_number', 'user_id');

        $this->addForeignKey('fk_phone_number_user_id_user_idx', 'phone_number', 'user_id', 'user', 'id');

        $this->createIndex('idx_phone_number_country_id_country_idx', 'phone_number', 'country_id');

        $this->addForeignKey('fk_phone_number_country_id_country_idx', 'phone_number', 'country_id', 'country', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_phone_number_user_id_user_idx', 'phone_number');

        $this->dropIndex('idx_phone_number_user_id_user_idx', 'phone_number');

        $this->dropForeignKey('fk_phone_number_country_id_country_idx', 'phone_number');

        $this->dropIndex('idx_phone_number_country_id_country_idx', 'phone_number');

        $this->dropTable('{{%phone_number}}');
    }
}
