<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property int|null $key
 * @property string|null $text_uz
 * @property string|null $text_ru
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'required'],
            [['text_uz', 'text_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'key' => Yii::t('yii', 'Key'),
            'text_uz' => Yii::t('yii', 'Text Uz'),
            'text_ru' => Yii::t('yii', 'Text Ru'),
            'created_at' => Yii::t('yii', 'Created At'),
            'updated_at' => Yii::t('yii', 'Updated At'),
            'created_by' => Yii::t('yii', 'Created By'),
            'updated_by' => Yii::t('yii', 'Updated By'),
        ];
    }
}
