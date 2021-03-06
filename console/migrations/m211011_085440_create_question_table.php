<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%subject}}`
 * - `{{%theme}}`
 * - `{{%user}}`
 */
class m211011_085440_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'subject_id' => $this->integer()->notNull(),
            'theme_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'text_uz' => $this->text(),
            'text_ru' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-question-subject_id}}',
            '{{%question}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-question-subject_id}}',
            '{{%question}}',
            'subject_id',
            '{{%subject}}',
            'id',
            'CASCADE'
        );

        // creates index for column `theme_id`
        $this->createIndex(
            '{{%idx-question-theme_id}}',
            '{{%question}}',
            'theme_id'
        );

        // add foreign key for table `{{%theme}}`
        $this->addForeignKey(
            '{{%fk-question-theme_id}}',
            '{{%question}}',
            'theme_id',
            '{{%theme}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-question-user_id}}',
            '{{%question}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-question-user_id}}',
            '{{%question}}',
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
        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-question-subject_id}}',
            '{{%question}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-question-subject_id}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%theme}}`
        $this->dropForeignKey(
            '{{%fk-question-theme_id}}',
            '{{%question}}'
        );

        // drops index for column `theme_id`
        $this->dropIndex(
            '{{%idx-question-theme_id}}',
            '{{%question}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-question-user_id}}',
            '{{%question}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-question-user_id}}',
            '{{%question}}'
        );

        $this->dropTable('{{%question}}');
    }
}
