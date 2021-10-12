<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Theme */

$this->title = Yii::t('yii', 'Create Theme');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Themes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
