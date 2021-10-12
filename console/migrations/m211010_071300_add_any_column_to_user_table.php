<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m211010_071300_add_any_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'firstName', $this->string(255));
        $this->addColumn('{{%user}}', 'lastName', $this->string(255));
        $this->addColumn('{{%user}}', 'fatherName', $this->string(255));
        $this->addColumn('{{%user}}', 'phone', $this->string(255));
        $this->addColumn('{{%user}}', 'sex', $this->smallInteger());
        $this->addColumn('{{%user}}', 'role', "ENUM('admin','teacher','student') NOT NULL DEFAULT 'student'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'firstName');
        $this->dropColumn('{{%user}}', 'lastName');
        $this->dropColumn('{{%user}}', 'fatherName');
        $this->dropColumn('{{%user}}', 'phone');
        $this->dropColumn('{{%user}}', 'sex');
        $this->dropColumn('{{%user}}', 'role');
    }
}
