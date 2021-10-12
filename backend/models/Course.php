<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string|null $keywords
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Subject[] $subjects
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['keywords'], 'string'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name_uz', 'name_ru', 'description_uz', 'description_ru'], 'string', 'max' => 255],
            [['name_uz'], 'unique'],
            [['name_ru'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'name_uz' => Yii::t('yii', 'Name Uz'),
            'name_ru' => Yii::t('yii', 'Name Ru'),
            'keywords' => Yii::t('yii', 'Keywords'),
            'description_uz' => Yii::t('yii', 'Description Uz'),
            'description_ru' => Yii::t('yii', 'Description Ru'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Subjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subject::className(), ['course_id' => 'id']);
    }
}
