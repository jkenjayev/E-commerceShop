<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_addresses}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%user_addresses}}`
 * - `{{%user_addresses}}`
 * - `{{%user_addresses}}`
 * - `{{%user_addresses}}`
 * - `{{%user_addresses}}`
 */
class m210822_031925_create_order_addresses_table extends Migration
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
            'region' => $this->string(255)->notNull(),
            'city' => $this->string(255)->notNull(),
            'country' => $this->string(255)->notNull(),
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

        // creates index for column `addresses`
        $this->createIndex(
            '{{%idx-order_addresses-addresses}}',
            '{{%order_addresses}}',
            'addresses'
        );

        // add foreign key for table `{{%user_addresses}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-addresses}}',
            '{{%order_addresses}}',
            'addresses',
            '{{%user_addresses}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region`
        $this->createIndex(
            '{{%idx-order_addresses-region}}',
            '{{%order_addresses}}',
            'region'
        );

        // add foreign key for table `{{%user_addresses}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-region}}',
            '{{%order_addresses}}',
            'region',
            '{{%user_addresses}}',
            'id',
            'CASCADE'
        );

        // creates index for column `city`
        $this->createIndex(
            '{{%idx-order_addresses-city}}',
            '{{%order_addresses}}',
            'city'
        );

        // add foreign key for table `{{%user_addresses}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-city}}',
            '{{%order_addresses}}',
            'city',
            '{{%user_addresses}}',
            'id',
            'CASCADE'
        );

        // creates index for column `country`
        $this->createIndex(
            '{{%idx-order_addresses-country}}',
            '{{%order_addresses}}',
            'country'
        );

        // add foreign key for table `{{%user_addresses}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-country}}',
            '{{%order_addresses}}',
            'country',
            '{{%user_addresses}}',
            'id',
            'CASCADE'
        );

        // creates index for column `zipcode`
        $this->createIndex(
            '{{%idx-order_addresses-zipcode}}',
            '{{%order_addresses}}',
            'zipcode'
        );

        // add foreign key for table `{{%user_addresses}}`
        $this->addForeignKey(
            '{{%fk-order_addresses-zipcode}}',
            '{{%order_addresses}}',
            'zipcode',
            '{{%user_addresses}}',
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
            '{{%order_adresses}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_addresses-order_id}}',
            '{{%order_addresses}}'
        );

        // drops foreign key for table `{{%user_addresses}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-addresses}}',
            '{{%order_addresses}}'
        );

        // drops index for column `addresses`
        $this->dropIndex(
            '{{%idx-order_addresses-addresses}}',
            '{{%order_addresses}}'
        );

        // drops foreign key for table `{{%user_addresses}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-region}}',
            '{{%order_addresses}}'
        );

        // drops index for column `region`
        $this->dropIndex(
            '{{%idx-order_addresses-region}}',
            '{{%order_addresses}}'
        );

        // drops foreign key for table `{{%user_addresses}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-city}}',
            '{{%order_addresses}}'
        );

        // drops index for column `city`
        $this->dropIndex(
            '{{%idx-order_addresses-city}}',
            '{{%order_addresses}}'
        );

        // drops foreign key for table `{{%user_addresses}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-country}}',
            '{{%order_addresses}}'
        );

        // drops index for column `country`
        $this->dropIndex(
            '{{%idx-order_addresses-country}}',
            '{{%order_addresses}}'
        );

        // drops foreign key for table `{{%user_addresses}}`
        $this->dropForeignKey(
            '{{%fk-order_addresses-zipcode}}',
            '{{%order_addresses}}'
        );

        // drops index for column `zipcode`
        $this->dropIndex(
            '{{%idx-order_addresses-zipcode}}',
            '{{%order_addresses}}'
        );

        $this->dropTable('{{%order_addresses}}');
    }
}
