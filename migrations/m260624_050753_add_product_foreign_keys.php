<?php

use yii\db\Migration;

class m260624_050753_add_product_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-product_variants-group_id',
            '{{%product_variants}}',
            'group_id',
            '{{%product_groups}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product_groups-brand_id',
            '{{%product_groups}}',
            'brand_id',
            '{{%product_brands}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product_group_tags-group_id',
            '{{%product_group_tags}}',
            'group_id',
            '{{%product_groups}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-product_group_tags-tag_id',
            '{{%product_group_tags}}',
            'tag_id',
            '{{%product_tags}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product_variants-group_id', '{{%product_variants}}');
        $this->dropForeignKey('fk-product_groups-brand_id', '{{%product_groups}}');
        $this->dropForeignKey('fk-product_group_tags-tag_id', '{{%product_group_tags}}');
        $this->dropForeignKey('fk-product_group_tags-group_id', '{{%product_group_tags}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260624_050753_add_product_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
