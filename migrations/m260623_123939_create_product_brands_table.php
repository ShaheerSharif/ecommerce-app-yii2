<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_brands}}`.
 */
class m260623_123939_create_product_brands_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_brands}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slogan' => $this->string()->notNull(),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_brands}}');
    }
}
