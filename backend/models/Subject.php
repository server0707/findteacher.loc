<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property int $course_id
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
 * @property Lesson[] $lessons
 * @property Question[] $questions
 * @property Course $course
 * @property Theme[] $themes
 */
class Subject extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;

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
            [['course_id', 'name_uz', 'name_ru', /*'created_at', 'updated_at', 'created_by', 'updated_by'*/], 'required'],
            [['course_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['keywords'], 'string'],
            [['name_uz', 'name_ru', 'description_uz', 'description_ru'], 'string', 'max' => 255],
            [['name_uz'], 'unique'],
            [['name_ru'], 'unique'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],

            [['image'], 'file', 'extensions' => ['png', 'jpg', 'jpeg']],
            [['gallery'], 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxFiles' => 5],
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
            'keywords' => Yii::t('yii', 'Keywords'),
            'description_uz' => Yii::t('yii', 'Description Uz'),
            'description_ru' => Yii::t('yii', 'Description Ru'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),

            'image' => Yii::t('yii', 'Image'),
            'gallery' => Yii::t('yii', 'Gallery'),
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

    public function upload()
    {
        if ($this->validate()) {
            $path = Yii::getAlias('@frontend') . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery()
    {
        if ($this->validate()) {
            foreach ($this->gallery as $file) {
                $path = Yii::getAlias('@frontend') . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        //        rasm uchun begin
        if ($this->image = UploadedFile::getInstance($this, 'image')) {
            $this->upload();
        }
        unset($this->image);

        if ($this->gallery = UploadedFile::getInstances($this, 'gallery')) {
            $this->uploadGallery();
        }
        //        rasm uchun end

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
