<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%subject}}`.
 */
class m211015_095626_drop_about_column_from_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%subject}}', 'about_uz');
        $this->dropColumn('{{%subject}}', 'about_ru');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%subject}}', 'about_uz', $this->text());
        $this->addColumn('{{%subject}}', 'about_ru', $this->text());
    }
}
