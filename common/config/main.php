<?php
return [
    'name' => 'FindTeacherSystem',
    'language'=>'uz',
    'timeZone' => 'Asia/Tashkent',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n'=>[
            'translations'=>[
                'yii'=>[
                    'class'=>'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage'=>'en'
                ]
            ]
        ],
    ],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => '@frontend/web/images/store', //path to origin images
            'imagesCachePath' => '@frontend/web/images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@frontend/web/images/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
//            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
    ],
];
