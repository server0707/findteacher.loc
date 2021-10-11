<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 */
class m211010_115507_create_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'name_uz' => $this->string(255)->notNull()->unique(),
            'name_ru' => $this->string(255)->notNull()->unique(),
            'about_uz' => $this->text(),
            'about_ru' => $this->text(),
            'keywords' => $this->text(),
            'description_uz' => $this->string(255),
            'description_ru' => $this->string(255),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-subject-course_id}}',
            '{{%subject}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-subject-course_id}}',
            '{{%subject}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-subject-course_id}}',
            '{{%subject}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-subject-course_id}}',
            '{{%subject}}'
        );

        $this->dropTable('{{%subject}}');
    }
}
