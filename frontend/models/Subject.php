<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int $course_id
 * @property string $name_uz
 * @property string $name_ru
 * @property string|null $about_uz
 * @property string|null $about_ru
 * @property string|null $keywords
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Lesson[] $lessons
 * @property Question[] $questions
 * @property Course $course
 * @property Theme[] $themes
 */
class Subject extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'name_uz', 'name_ru', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['course_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['about_uz', 'about_ru', 'keywords'], 'string'],
            [['name_uz', 'name_ru', 'description_uz', 'description_ru'], 'string', 'max' => 255],
            [['name_uz'], 'unique'],
            [['name_ru'], 'unique'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'course_id' => Yii::t('yii', 'Course ID'),
            'name_uz' => Yii::t('yii', 'Name Uz'),
            'name_ru' => Yii::t('yii', 'Name Ru'),
            'about_uz' => Yii::t('yii', 'About Uz'),
            'about_ru' => Yii::t('yii', 'About Ru'),
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
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['subject_id' => 'id']);
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Themes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getThemes()
    {
        return $this->hasMany(Theme::className(), ['subject_id' => 'id']);
    }
}
