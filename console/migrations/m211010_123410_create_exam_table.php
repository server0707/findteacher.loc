<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%exam}}`.
 */
class m211010_123410_create_exam_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%exam}}', [
            'id' => $this->primaryKey(),
            'about_uz' => $this->text(),
            'about_ru' => $this->text(),
            'start_time' => $this->dateTime(),
            'finish_time' => $this->dateTime(),
            'questions_list' => $this->text(),
            'correct_answers_list' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%exam}}');
    }
}
