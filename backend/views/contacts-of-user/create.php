<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ContactsOfUser */

$this->title = Yii::t('yii', 'Create Contacts Of User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yii', 'Contacts Of Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-of-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
