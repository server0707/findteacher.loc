<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property int $id
 * @property int $subject_id
 * @property string|null $name_uz
 * @property string|null $name_ru
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Question[] $questions
 * @property Subject $subject
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['subject_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name_uz', 'name_ru'], 'string', 'max' => 255],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'subject_id' => Yii::t('yii', 'Subject ID'),
            'name_uz' => Yii::t('yii', 'Name Uz'),
            'name_ru' => Yii::t('yii', 'Name Ru'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['theme_id' => 'id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }
}
