<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_groups}}`.
 */
class m260623_123911_create_product_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_groups}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),

            'brand_id' => $this->integer()->notNull(),

            'is_active' => $this->boolean()->notNull()->defaultValue(true),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-product_groups-brand_id',
            '{{%product_groups}}',
            'brand_id'
        );

        $this->createIndex(
            'idx-product_groups-is_active',
            '{{%product_groups}}',
            'is_active'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-product_groups-brand_id', '{{%product_groups}}');
        $this->dropIndex('idx-product_groups-is_active', '{{%product_groups}}');
        $this->dropTable('{{%product_groups}}');
    }
}
