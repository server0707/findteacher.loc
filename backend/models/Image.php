<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $filePath
 * @property int|null $itemId
 * @property int|null $isMain
 * @property string $modelName
 * @property string $urlAlias
 * @property string|null $name
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filePath', 'modelName', 'urlAlias'], 'required'],
            [['itemId', 'isMain'], 'integer'],
            [['filePath', 'urlAlias'], 'string', 'max' => 400],
            [['modelName'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('yii', 'ID'),
            'filePath' => Yii::t('yii', 'File Path'),
            'itemId' => Yii::t('yii', 'Item ID'),
            'isMain' => Yii::t('yii', 'Is Main'),
            'modelName' => Yii::t('yii', 'Model Name'),
            'urlAlias' => Yii::t('yii', 'Url Alias'),
            'name' => Yii::t('yii', 'Name'),
        ];
    }
}
