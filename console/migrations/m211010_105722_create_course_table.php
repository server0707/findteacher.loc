<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m211010_105722_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'name_uz' => $this->string(255)->notNull()->unique(),
            'name_ru' => $this->string(255)->notNull()->unique(),
            'keywords' => $this->text(),
            'description_uz' => $this->string(255),
            'description_ru' => $this->string(255),
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
        $this->dropTable('{{%course}}');
    }
}
