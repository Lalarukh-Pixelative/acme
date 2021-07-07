<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m210707_072744_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'from_user_id' => $this->integer(5),
            'to_user_id' => $this->integer(5),
            'trip_id' => $this->integer(10),
            'text' => $this->string(80),
            'created' => $this->string(50),
        ]);
        $this->createIndex('idx_message_from_user_id_user_idx', 'message', 'from_user_id');

        $this->addForeignKey('fk_message_from_user_id_user_idx', 'message', 'from_user_id', 'user', 'id');

        $this->createIndex('idx_message_to_user_id_user_idx', 'message', 'to_user_id');

        $this->addForeignKey('fk_message_to_user_id_user_idx', 'message', 'to_user_id', 'user', 'id');

        $this->createIndex('idx_message_trip_id_trip_idx', 'message', 'trip_id');

        $this->addForeignKey('fk_message_trip_id_trip_idx', 'message', 'trip_id', 'trip', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_message_from_user_id_user_idx', 'message');

        $this->dropIndex('idx_message_from_user_id_user_idx', 'message');

        $this->dropForeignKey('fk_message_from_user_id_user_idx', 'message');

        $this->dropIndex('idx_message_to_user_id_user_idx', 'message');

        $this->dropForeignKey('fk_message_trip_id_trip_idx', 'message');

        $this->dropIndex('idx_message_trip_id_trip_idx', 'message');

        $this->dropTable('{{%message}}');
    }
}
