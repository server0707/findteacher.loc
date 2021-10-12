<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Status */

$this->title = Yii::t('yii', 'Create Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
