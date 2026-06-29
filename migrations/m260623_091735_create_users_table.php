<?php

use yii\db\Migration;

class m260623_091735_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(254)->notNull()->unique(),
            'username' => $this->string(40)->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()->append('ON UPDATE CURRENT_TIMESTAMP'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true), // default value will be false when email confirmation is implemented
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m260623_091735_create cannot be reverted.\n";

        return false;
    }
    */
}
