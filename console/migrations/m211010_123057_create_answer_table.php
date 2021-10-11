<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%question}}`
 */
class m211010_123057_create_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'text_uz' => $this->string(255),
            'text_ru' => $this->string(255),
            'correct' => $this->boolean()->defaultValue(false),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-answer-question_id}}',
            '{{%answer}}',
            'question_id'
        );

        // add foreign key for table `{{%question}}`
        $this->addForeignKey(
            '{{%fk-answer-question_id}}',
            '{{%answer}}',
            'question_id',
            '{{%question}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%question}}`
        $this->dropForeignKey(
            '{{%fk-answer-question_id}}',
            '{{%answer}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-answer-question_id}}',
            '{{%answer}}'
        );

        $this->dropTable('{{%answer}}');
    }
}
