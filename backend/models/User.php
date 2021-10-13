<?php

namespace backend\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $fatherName
 * @property string|null $phone
 * @property int|null $sex
 * @property string $role
 *
 * @property ExamSolutionHistory[] $examSolutionHistories
 * @property Lesson[] $lessons
 * @property Question[] $questions
 */
class User extends \yii\db\ActiveRecord
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
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', /*'created_at', 'updated_at'*/], 'required'],
            [['status', 'created_at', 'updated_at', 'sex'], 'integer'],
            [['role'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'firstName', 'lastName', 'fatherName', 'phone'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'username' => Yii::t('yii', 'Username'),
            'auth_key' => Yii::t('yii', 'Auth Key'),
            'password_hash' => Yii::t('yii', 'Password Hash'),
            'password_reset_token' => Yii::t('yii', 'Password Reset Token'),
            'email' => Yii::t('yii', 'Email'),
            'status' => Yii::t('yii', 'Status'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'verification_token' => Yii::t('yii', 'Verification Token'),
            'firstName' => Yii::t('yii', 'First Name'),
            'lastName' => Yii::t('yii', 'Last Name'),
            'fatherName' => Yii::t('yii', 'Father Name'),
            'phone' => Yii::t('yii', 'Phone'),
            'sex' => Yii::t('yii', 'Sex'),
            'role' => Yii::t('yii', 'Role'),
        ];
    }

    /**
     * Gets query for [[ExamSolutionHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExamSolutionHistories()
    {
        return $this->hasMany(ExamSolutionHistory::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['user_id' => 'id']);
    }
}
