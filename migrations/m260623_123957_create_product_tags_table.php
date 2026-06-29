<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_tags}}`.
 */
class m260623_123957_create_product_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_tags}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_tags}}');
    }
}
