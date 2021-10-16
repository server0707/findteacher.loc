<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m211016_123917_add_any_columns_to_user_table extends Migration
{
//    add columns for teacher_details page <<<<<<----------------------------
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'keywords', $this->string(255));
        $this->addColumn('{{%user}}', 'description_uz', $this->string(255));
        $this->addColumn('{{%user}}', 'description_ru', $this->string(255));
        $this->addColumn('{{%user}}', 'about_uz', $this->text());
        $this->addColumn('{{%user}}', 'about_ru', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'keywords');
        $this->dropColumn('{{%user}}', 'description_uz');
        $this->dropColumn('{{%user}}', 'description_ru');
        $this->dropColumn('{{%user}}', 'about_uz');
        $this->dropColumn('{{%user}}', 'about_ru');
    }
}
