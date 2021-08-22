<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_addresses}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 */
class m210822_084050_create_order_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_addresses}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(11)->notNull(),
            'addresses' => $this->string(255)->notNull(),
            'state' => $this->string(255),
            'country' => $this->string(255),
            'zipcode' => $this->string(45),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_addresses-order_id}}',
            '{{%order_addresses}}',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-order_id}}',
            '{{%order_addresses}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-order_id}}',
            '{{%order_addresses}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_addresses-order_id}}',
            '{{%order_addresses}}'
        );

        $this->dropTable('{{%order_addresses}}');
    }
}
