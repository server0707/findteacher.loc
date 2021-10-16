<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%lesson}}`.
 */
class m211016_051212_add_days_column_to_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lesson}}', 'days', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lesson}}', 'days');
    }
}
