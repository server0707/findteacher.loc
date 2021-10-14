<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        '//fonts.googleapis.com/css?family=Nunito:400,700&display=swap',
        '//fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap',
        'css/style-starter.css',
    ];
    public $js = [
//        <!-- Template JavaScript -->
//        'js/jquery-3.3.1.min.js',
        'js/theme-change.js',

//        <!-- stats number counter-->
        "js/jquery.waypoints.min.js",
        "js/jquery.countup.js",

//        <!-- script for banner slider-->
        'js/owl.carousel.js',

        'js/bootstrap.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
