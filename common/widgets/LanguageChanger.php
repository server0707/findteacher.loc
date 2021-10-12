<?php


namespace common\widgets;


use Yii;
use yii\bootstrap5\Widget;

class LanguageChanger extends Widget
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
                '<button class="nav-link ' . $this->classOfButton . ' dropdown-toggle" type="button" id="LanguageChanger" data-bs-toggle="dropdown" aria-expanded="false">' .
                    Yii::$app->params['languages'][$currLang] .
                '</button>' .
            '<ul class="dropdown-menu" aria-labelledby="LanguageChanger">';
        foreach (Yii::$app->params['languages'] as $key => $language) {
            $dropdown .=
                '<li>' .
                    '<a class="dropdown-item" href="'.str_replace(Yii::$app->language, $key, $currUrl).'">' .
                    $language .
                    '</a>' .
                '</li>';
        }
        $dropdown .=
            '</ul>' .
            '</div>';


        return $dropdown;
    }

}