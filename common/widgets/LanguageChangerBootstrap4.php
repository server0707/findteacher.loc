<?php


namespace common\widgets;


use Yii;
use yii\bootstrap5\Widget;

class LanguageChangerBootstrap4 extends Widget
{
    public $classOfButton;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $currUrl = Yii::$app->request->url;

        $currLang = Yii::$app->language;
        $dropdown =
            '<div class="dropdown">' .
            '<a href="#" class="nav-link ' . $this->classOfButton . ' dropdown-toggle" role="button" id="LanguageChangerBootstrap4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
            Yii::$app->params['languages'][$currLang] .
            '</a>' .
            '<div class="dropdown-menu" aria-labelledby="LanguageChangerBootstrap4">';
        foreach (Yii::$app->params['languages'] as $key => $language) {
            if ($key != Yii::$app->language)
                $dropdown .=
                    '<a class="dropdown-item" href="' . str_replace(Yii::$app->language, $key, $currUrl) . '">' .
                    $language .
                    '</a>';
        }
        $dropdown .=
            '</div>' .
            '</div>';


        return $dropdown;
    }

}