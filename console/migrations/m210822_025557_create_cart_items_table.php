<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart_items}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%products}}`
 * - `{{%order_items}}`
 * - `{{%user}}`
 */
class m210822_025557_create_cart_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart_items}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'quantity' => $this->integer(2)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-cart_items-product_id}}',
            '{{%cart_items}}',
            'product_id'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-cart_items-product_id}}',
            '{{%cart_items}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );

        // creates index for column `quantity`
        $this->createIndex(
            '{{%idx-cart_items-quantity}}',
            '{{%cart_items}}',
            'quantity'
        );

        // add foreign key for table `{{%order_items}}`
        $this->addForeignKey(
            '{{%fk-cart_items-quantity}}',
            '{{%cart_items}}',
            'quantity',
            '{{%order_items}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-cart_items-user_id}}',
            '{{%cart_items}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-cart_items-user_id}}',
            '{{%cart_items}}',
            'user_id',
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
        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-cart_items-product_id}}',
            '{{%cart_items}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-cart_items-product_id}}',
            '{{%cart_items}}'
        );

        // drops foreign key for table `{{%order_items}}`
        $this->dropForeignKey(
            '{{%fk-cart_items-quantity}}',
            '{{%cart_items}}'
        );

        // drops index for column `quantity`
        $this->dropIndex(
            '{{%idx-cart_items-quantity}}',
            '{{%cart_items}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-cart_items-user_id}}',
            '{{%cart_items}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-cart_items-user_id}}',
            '{{%cart_items}}'
        );

        $this->dropTable('{{%cart_items}}');
    }
}
