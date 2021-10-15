<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%province}}`
 */
class m211015_095102_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id' => $this->primaryKey(),
            'province_id' => $this->integer()->notNull(),
            'name_uz' => $this->string(),
            'name_ru' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `province_id`
        $this->createIndex(
            '{{%idx-region-province_id}}',
            '{{%region}}',
            'province_id'
        );

        // add foreign key for table `{{%province}}`
        $this->addForeignKey(
            '{{%fk-region-province_id}}',
            '{{%region}}',
            'province_id',
            '{{%province}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%province}}`
        $this->dropForeignKey(
            '{{%fk-region-province_id}}',
            '{{%region}}'
        );

        // drops index for column `province_id`
        $this->dropIndex(
            '{{%idx-region-province_id}}',
            '{{%region}}'
        );

        $this->dropTable('{{%region}}');
    }
}
