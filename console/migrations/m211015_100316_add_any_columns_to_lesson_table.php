<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%region}}`
 */
class m211015_100316_add_any_columns_to_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lesson}}', 'duration', $this->string());
        $this->addColumn('{{%lesson}}', 'start_time', $this->time());
        $this->addColumn('{{%lesson}}', 'finish_time', $this->time());
        $this->addColumn('{{%lesson}}', 'address', $this->text());

        $this->addColumn('{{%lesson}}', 'region_id', $this->integer());
        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-lesson-region_id}}',
            '{{%lesson}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-lesson-region_id}}',
            '{{%lesson}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lesson}}', 'duration');
        $this->dropColumn('{{%lesson}}', 'start_time');
        $this->dropColumn('{{%lesson}}', 'finish_time');
        $this->dropColumn('{{%lesson}}', 'address');

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-lesson-region_id}}',
            '{{%lesson}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-lesson-region_id}}',
            '{{%lesson}}'
        );

        $this->dropColumn('{{%lesson}}', 'region_id');
    }
}
