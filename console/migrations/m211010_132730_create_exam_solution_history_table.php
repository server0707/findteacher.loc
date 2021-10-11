<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exam_solution_history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%exam}}`
 * - `{{%user}}`
 */
class m211010_132730_create_exam_solution_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exam_solution_history}}', [
            'id' => $this->primaryKey(),
            'exam_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'answers_list' => $this->text(),
            'total_questions_count' => $this->integer(),
            'correct_answers_count' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `exam_id`
        $this->createIndex(
            '{{%idx-exam_solution_history-exam_id}}',
            '{{%exam_solution_history}}',
            'exam_id'
        );

        // add foreign key for table `{{%exam}}`
        $this->addForeignKey(
            '{{%fk-exam_solution_history-exam_id}}',
            '{{%exam_solution_history}}',
            'exam_id',
            '{{%exam}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-exam_solution_history-user_id}}',
            '{{%exam_solution_history}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-exam_solution_history-user_id}}',
            '{{%exam_solution_history}}',
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
        // drops foreign key for table `{{%exam}}`
        $this->dropForeignKey(
            '{{%fk-exam_solution_history-exam_id}}',
            '{{%exam_solution_history}}'
        );

        // drops index for column `exam_id`
        $this->dropIndex(
            '{{%idx-exam_solution_history-exam_id}}',
            '{{%exam_solution_history}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-exam_solution_history-user_id}}',
            '{{%exam_solution_history}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-exam_solution_history-user_id}}',
            '{{%exam_solution_history}}'
        );

        $this->dropTable('{{%exam_solution_history}}');
    }
}
