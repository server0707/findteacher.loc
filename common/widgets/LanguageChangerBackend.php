<?php


namespace common\widgets;


use Yii;
use yii\bootstrap5\Widget;

class LanguageChangerBackend extends Widget
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
                '<a href="#" class="nav-link ' . $this->classOfButton . ' dropdown-toggle" role="button" id="LanguageChangerBackend" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' .
                    Yii::$app->params['languages'][$currLang] .
                '</a>' .
            '<div class="dropdown-menu" aria-labelledby="LanguageChangerBackend">';
        foreach (Yii::$app->params['languages'] as $key => $language) {
            $dropdown .=
                '<a class="dropdown-item" href="'.str_replace(Yii::$app->language, $key, $currUrl).'">' .
                $language .
                '</a>';
        }
        $dropdown .=
            '</div>' .
            '</div>';


        return $dropdown;
    }

}