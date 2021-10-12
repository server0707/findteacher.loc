<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = Yii::t('yii', 'Create Subject');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
