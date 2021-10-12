<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ExamSolutionHistory */

$this->title = Yii::t('yii', 'Create Exam Solution History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Exam Solution Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-solution-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
