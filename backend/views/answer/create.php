<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Answer */

$this->title = Yii::t('yii', 'Create Answer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
