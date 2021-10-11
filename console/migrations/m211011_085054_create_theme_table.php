<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%theme}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 */
class m211011_085054_create_theme_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theme}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer()->notNull(),
            'name_uz' => $this->string(255),
            'name_ru' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-theme-subject_id}}',
            '{{%theme}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-theme-subject_id}}',
            '{{%theme}}',
            'subject_id',
            '{{%subject}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-theme-subject_id}}',
            '{{%theme}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-theme-subject_id}}',
            '{{%theme}}'
        );

        $this->dropTable('{{%theme}}');
    }
}
