<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m260623_123842_create_product_variants_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_variants}}', [
            'id' => $this->primaryKey(),
            'barcode' => $this->string(50)->notNull()->unique(),
            'barcode_type' => $this->string(6)->notNull(), // UPC-A | EAN-13 | QR
            'group_id' => $this->integer()->notNull(),
            'sku' => $this->string()->notNull()->unique(),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'unit_price' => $this->decimal(10, 2)->notNull(),
            'stock' => $this->integer()->notNull(),

            'description' => $this->string()->null(),
            'expiry_date' => $this->date()->null(), // for food items (only date accuracy needed)
            'weight' => $this->decimal(5, 2)->null(), // in kg
            'size' => $this->string()->null(),
            'color' => $this->string()->null(),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-product_variants-barcode',
            '{{%product_variants}}',
            'barcode'
        );

        $this->createIndex(
            'idx-product_variants-group_id',
            '{{%product_variants}}',
            'group_id'
        );

        $this->createIndex(
            'idx-product_variants-is_active',
            '{{%product_variants}}',
            'is_active'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-product_variants-barcode', '{{%product_variants}}');
        $this->dropIndex('idx-product_variants-group_id', '{{%product_variants}}');
        $this->dropIndex('idx-product_variants-is_active', '{{%product_variants}}');
        $this->dropTable('{{%product_variants}}');
    }
}
