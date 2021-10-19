<?php

namespace frontend\models;

use Yii;
use yii\validators\DateValidator;

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
 * @property int|null $sex
 * @property string $role
 *
 * @property string $keywords
 * @property string $description_uz
 * @property string $description_ru
 * @property string $about_ru
 * @property string $about_uz
 * @property DateValidator $birthDate
 *
 * @property ExamSolutionHistory[] $examSolutionHistories
 * @property Lesson[] $lessons
 * @property Question[] $questions
 */
class User extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const STATUS_DELETED = 0;

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
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'sex'], 'integer'],
            [['role', 'description_uz', 'description_uz', 'about_uz', 'about_ru', 'keywords'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token', 'firstName', 'lastName', 'fatherName'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['birthDate'], 'date'],
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
            'sex' => Yii::t('yii', 'Sex'),
            'role' => Yii::t('yii', 'Role'),
            'about_uz' => Yii::t('yii', 'About Uz'),
            'about_ru' => Yii::t('yii', 'About Ru'),
            'description_ru' => Yii::t('yii', 'Description Uz'),
            'description_uz' => Yii::t('yii', 'Description Ru'),
            'keywords' => Yii::t('yii', 'Keywords'),

            'birthDate' => Yii::t('yii', 'Birth date'),
        ];
    }

    /**
     * Gets query for [[ContactsOfUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactsOfUsers()
    {
        return $this->hasMany(ContactsOfUser::className(), ['user_id' => 'id'])->andWhere(['status' => ContactsOfUser::STATUS_ACTIVE]);
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

    public function getFullName()
    {
        $fullName = $this->lastName . ' ' . $this->firstName . ' ' . $this->fatherName;
        return (!empty($fullname) && $fullName != null) ? $fullName : $this->username;
    }

    public static function getTeachers($status = User::STATUS_ACTIVE)
    {
        return User::find()->where(['status' => $status, 'role' => 'teacher'])->orderBy('updated_at');
    }

    public function getContactType($contact_name)
    {
        $check_phone = strpos(strtolower($contact_name), 'phone');
        $check_email = strpos(strtolower($contact_name), 'mail');

        if ($check_phone !== false) {
            return 'tel:';
        }

        if ($check_email !== false) {
            return 'mailto:';
        }

        return '';
    }

    public function getLinkToContact($contact_name, $contact_value)
    {
        return $this->getContactType($contact_name) . $contact_value;
    }

    public function getAge()
    {
        if (!empty($this->birthDate) || $this->birthDate !== null)
            return date('Y', time()) - date('Y', strtotime($this->birthDate));
        else
            return '';
    }
}
