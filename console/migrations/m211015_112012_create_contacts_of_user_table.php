<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts_of_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%contact}}`
 */
class m211015_112012_create_contacts_of_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contacts_of_user}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'contact_id' => $this->integer()->notNull(),
            'value' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-contacts_of_user-user_id}}',
            '{{%contacts_of_user}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-contacts_of_user-user_id}}',
            '{{%contacts_of_user}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `contact_id`
        $this->createIndex(
            '{{%idx-contacts_of_user-contact_id}}',
            '{{%contacts_of_user}}',
            'contact_id'
        );

        // add foreign key for table `{{%contact}}`
        $this->addForeignKey(
            '{{%fk-contacts_of_user-contact_id}}',
            '{{%contacts_of_user}}',
            'contact_id',
            '{{%contact}}',
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
            '{{%fk-contacts_of_user-user_id}}',
            '{{%contacts_of_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-contacts_of_user-user_id}}',
            '{{%contacts_of_user}}'
        );

        // drops foreign key for table `{{%contact}}`
        $this->dropForeignKey(
            '{{%fk-contacts_of_user-contact_id}}',
            '{{%contacts_of_user}}'
        );

        // drops index for column `contact_id`
        $this->dropIndex(
            '{{%idx-contacts_of_user-contact_id}}',
            '{{%contacts_of_user}}'
        );

        $this->dropTable('{{%contacts_of_user}}');
    }
}
