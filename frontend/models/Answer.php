<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property int $question_id
 * @property string|null $text_uz
 * @property string|null $text_ru
 * @property int|null $correct
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Question $question
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['question_id', 'correct', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['text_uz', 'text_ru'], 'string'],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'question_id' => Yii::t('yii', 'Question ID'),
            'text_uz' => Yii::t('yii', 'Text Uz'),
            'text_ru' => Yii::t('yii', 'Text Ru'),
            'correct' => Yii::t('yii', 'Correct'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
}
