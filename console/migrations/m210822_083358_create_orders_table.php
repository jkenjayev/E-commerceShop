<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210822_083358_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'total_price' => $this->decimal(10, 2)->notNull(),
            'status' => $this->integer(2)->notNull(),
            'firstname' => $this->string(255),
            'lastname' => $this->string(255),
            'email' => $this->string(255),
            'transaction_id' => $this->string(45),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
