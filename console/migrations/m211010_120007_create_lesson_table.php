<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%subject}}`
 */
class m211010_120007_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'subject_id' => $this->integer()->notNull(),
            'about_uz' => $this->text(),
            'about_ru' => $this->text(),
            'keywords' => $this->text(),
            'description_uz' => $this->string(255),
            'description_ru' => $this->string(255),
            'viewed' => $this->bigInteger(),
            'price' => $this->string(255),
            'link_of_lesson_video' => $this->string(255),
            'student_count' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-lesson-user_id}}',
            '{{%lesson}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-lesson-user_id}}',
            '{{%lesson}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            '{{%idx-lesson-subject_id}}',
            '{{%lesson}}',
            'subject_id'
        );

        // add foreign key for table `{{%subject}}`
        $this->addForeignKey(
            '{{%fk-lesson-subject_id}}',
            '{{%lesson}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-lesson-user_id}}',
            '{{%lesson}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-lesson-user_id}}',
            '{{%lesson}}'
        );

        // drops foreign key for table `{{%subject}}`
        $this->dropForeignKey(
            '{{%fk-lesson-subject_id}}',
            '{{%lesson}}'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            '{{%idx-lesson-subject_id}}',
            '{{%lesson}}'
        );

        $this->dropTable('{{%lesson}}');
    }
}
