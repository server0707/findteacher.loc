<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Exam */

$this->title = Yii::t('yii', 'Create Exam');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Exams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
