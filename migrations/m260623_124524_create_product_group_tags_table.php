<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_group_tags}}`.
 */
class m260623_124524_create_product_group_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_group_tags}}', [
            'group_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey(
            'pk-product_group_tags',
            '{{%product_group_tags}}',
            ['group_id', 'tag_id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk-product_group_tags', '{{%product_group_tags}}');
        $this->dropTable('{{%product_group_tags}}');
    }
}
