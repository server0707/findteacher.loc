<?php

namespace common\controllers;

use yii\web\Controller;

class AbdullaController extends Controller
{
    public function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

    public function debug_die($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
        die();
    }

    public function vd($arr)
    {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
    }

    public function vd_die($arr)
    {
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
        die();
    }

    protected function setMeta($title = null, $keywords = null, $description = null, $image = null, $url = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);

//        для Facebook и ВКонтакте(протокол Open Graph)
        $this->view->registerMetaTag(['name' => 'og:title', 'content' => "$title"]);
        $this->view->registerMetaTag(['name' => 'og:description', 'content' => "$description"]);
        $this->view->registerMetaTag(['name' => 'og:image', 'content' => "$image"]);
        $this->view->registerMetaTag(['name' => 'og:url', 'content' => "$url"]);
        $this->view->registerMetaTag(['name' => 'og:site_name', 'content' => \Yii::$app->name]);

//        для Twitter
        $this->view->registerMetaTag(['name' => 'twitter:title', 'content' => "$title"]);
        $this->view->registerMetaTag(['name' => 'twitter:description', 'content' => "$description"]);
        $this->view->registerMetaTag(['name' => 'twitter:site', 'content' => \Yii::$app->name]);
        $this->view->registerMetaTag(['name' => 'twitter:image', 'content' => "$image"]);
    }
}