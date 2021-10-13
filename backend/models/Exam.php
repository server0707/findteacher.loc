<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "exam".
 *
 * @property int $id
 * @property string|null $about_uz
 * @property string|null $about_ru
 * @property string|null $start_time
 * @property string|null $finish_time
 * @property string|null $questions_list
 * @property string|null $correct_answers_list
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ExamSolutionHistory[] $examSolutionHistories
 */
class Exam extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exam';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['about_uz', 'about_ru', 'questions_list', 'correct_answers_list'], 'string'],
            [['start_time', 'finish_time'], 'safe'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
//            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'about_uz' => Yii::t('yii', 'About Uz'),
            'about_ru' => Yii::t('yii', 'About Ru'),
            'start_time' => Yii::t('yii', 'Start Time'),
            'finish_time' => Yii::t('yii', 'Finish Time'),
            'questions_list' => Yii::t('yii', 'Questions List'),
            'correct_answers_list' => Yii::t('yii', 'Correct Answers List'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[ExamSolutionHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExamSolutionHistories()
    {
        return $this->hasMany(ExamSolutionHistory::className(), ['exam_id' => 'id']);
    }
}
