<?php

use yii\db\Migration;

/**
 * Class m210705_134723_create_table_country
 */
class m210705_134723_create_table_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(2)->unique(),
            'name' => $this->string(80),
            'phonecode' => $this->integer(5),
            'lat' => $this->string(45)->notNull(),
            'lng' => $this->string(45)->notNull()
        ]);
        
        $this->batchInsert('{{%country}}', ['id', 'code', 'name', 'phonecode', 'lat', 'lng'], [['1', 'Pk', 'Pakistan', '92', '111', '222'], ['2', 'Af', 'Afghanistan', '12', '344', '432'], ['3', 'Al', 'Albania', '34', '534', '325']]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%country}}');
        $this->dropTable('{{%country}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }
    */
    /*
    public function down()
    {
        echo "m210705_134723_create_table_country cannot be reverted.\n";

        return false;
    }
    */
}
