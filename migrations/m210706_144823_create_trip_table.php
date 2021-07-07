<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trip}}`.
 */
class m210706_144823_create_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(5),
            'from' => $this->integer(50),
            'to' => $this->integer(50),
            'date' => $this->date(),
            'number_seats' => $this->integer(3),
            'duration' => $this->integer(2),
            'price' => $this->integer(5),
            'currency_id' => $this->integer(5),
            'status' => $this->string(50),
        ]);
        $this->createIndex('idx_trip_user_id_user_id', 'trip', 'user_id');

        $this->addForeignKey('fk_trip_user_id_user_id', 'trip', 'user_id', 'user', 'id');

        $this->createIndex('idx_trip_from_place_idx', 'trip', 'from');

        $this->addForeignKey('fk_trip_from_place_idx', 'trip', 'from', 'place', 'id');

        $this->createIndex('idx_trip_to_place_idx', 'trip', 'to');

        $this->addForeignKey('fk_trip_to_place_idx', 'trip', 'to', 'place', 'id');

        $this->createIndex('idx_trip_currency_id_currency_idx', 'trip', 'currency_id');

        $this->addForeignKey('fk_trip_currency_id_currency_idx', 'trip', 'currency_id', 'currency', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_trip_user_id_user_id', 'trip');

        $this->dropIndex('idx_trip_user_id_user_id', 'trip');

        $this->dropForeignKey('fk_trip_from_place_idx', 'trip');

        $this->dropIndex('idx_trip_from_place_idx', 'trip');

        $this->dropForeignKey('fk_trip_to_place_idx', 'trip');

        $this->dropIndex('idx_trip_to_place_idx', 'trip');

        $this->dropForeignKey('fk_trip_currency_id_currency_idx', 'trip');

        $this->dropIndex('idx_trip_currency_id_currency_idx', 'trip');

        $this->dropTable('{{%trip}}');
    }
}
