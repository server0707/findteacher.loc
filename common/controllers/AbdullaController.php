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

    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description','content'=>"$description"]);
    }
}