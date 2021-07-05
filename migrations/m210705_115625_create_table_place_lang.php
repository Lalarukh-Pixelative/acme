<?php

use yii\db\Migration;

/**
 * Class m210705_115625_create_table_place_lang
 */
class m210705_115625_create_table_place_lang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('place_lang', [
             'id' => $this->primaryKey(),
             'place_id' => $this->integer()->notNull(),
             'locality' => $this->string(45)->notNull(),
             'country' => $this->string(45)->notNull(),
             'lang' => $this->string(2)->notNull()
        ]);
        $this->createIndex('idx_place_lang_place_id_place', 'place_lang', 'place_id');

        $this->addForeignKey('fk_place_lang_place_id_place', 'place_lang', 'place_id', 'place', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_place_lang_place_id_place', 'place_lang');

        $this->dropIndex('idx_place_lang_place_id_place', 'place_lang');

        $this->dropTable('{{%place_lang}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210705_115625_create_table_place_lang cannot be reverted.\n";

        return false;
    }
    */
}
