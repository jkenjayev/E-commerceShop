<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m210822_024835_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'total_price' => $this->decimal(10, 2)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'firstname' => $this->string(45)->notNull(),
            'lastname' => $this->string(45)->notNull(),
            'email' => $this->string(255)->notNull(),
            'transaction_id' => $this->string(45)->notNull(),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `firstname`
        $this->createIndex(
            '{{%idx-orders-firstname}}',
            '{{%orders}}',
            'firstname'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-firstname}}',
            '{{%orders}}',
            'firstname',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `lastname`
        $this->createIndex(
            '{{%idx-orders-lastname}}',
            '{{%orders}}',
            'lastname'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-lastname}}',
            '{{%orders}}',
            'lastname',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `email`
        $this->createIndex(
            '{{%idx-orders-email}}',
            '{{%orders}}',
            'email'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-orders-email}}',
            '{{%orders}}',
            'email',
            '{{%user}}',
            'id',
            'CASCADE'
        );

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
            '{{%fk-orders-firstname}}',
            '{{%orders}}'
        );

        // drops index for column `firstname`
        $this->dropIndex(
            '{{%idx-orders-firstname}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-lastname}}',
            '{{%orders}}'
        );

        // drops index for column `lastname`
        $this->dropIndex(
            '{{%idx-orders-lastname}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-orders-email}}',
            '{{%orders}}'
        );

        // drops index for column `email`
        $this->dropIndex(
            '{{%idx-orders-email}}',
            '{{%orders}}'
        );

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
