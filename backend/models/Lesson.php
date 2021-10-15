<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property int $user_id
 * @property int $subject_id
 * @property string|null $about_uz
 * @property string|null $about_ru
 * @property string|null $keywords
 * @property string|null $description_uz
 * @property string|null $description_ru
 * @property int|null $viewed
 * @property string|null $price
 * @property string|null $old_price
 * @property string|null $link_of_lesson_video
 * @property int|null $student_count
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property string|null $duration
 * @property string|null $start_time
 * @property string|null $finish_time
 * @property string|null $address
 * @property int|null $region_id
 *
 * @property Region $region
 * @property Subject $subject
 * @property User $user
 */
class Lesson extends \yii\db\ActiveRecord
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
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'subject_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['user_id', 'subject_id', 'viewed', 'student_count', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'region_id'], 'integer'],
            [['about_uz', 'about_ru', 'keywords', 'address', 'duration'], 'string'],
            [['start_time', 'finish_time'], 'safe'],
            [['description_uz', 'description_ru', 'price', 'old_price', 'link_of_lesson_video'], 'string', 'max' => 255],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'user_id' => Yii::t('yii', 'User ID'),
            'subject_id' => Yii::t('yii', 'Subject ID'),
            'about_uz' => Yii::t('yii', 'About Uz'),
            'about_ru' => Yii::t('yii', 'About Ru'),
            'keywords' => Yii::t('yii', 'Keywords'),
            'description_uz' => Yii::t('yii', 'Description Uz'),
            'description_ru' => Yii::t('yii', 'Description Ru'),
            'viewed' => Yii::t('yii', 'Viewed'),
            'price' => Yii::t('yii', 'Price'),
            'old_price' => Yii::t('yii', 'Old Price'),
            'link_of_lesson_video' => Yii::t('yii', 'Link Of Lesson Video'),
            'student_count' => Yii::t('yii', 'Student Count'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),
            'duration' => Yii::t('yii', 'Duration'),
            'start_time' => Yii::t('yii', 'Start Time'),
            'finish_time' => Yii::t('yii', 'Finish Time'),
            'address' => Yii::t('yii', 'Address'),
            'region_id' => Yii::t('yii', 'Region ID'),
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
