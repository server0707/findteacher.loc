<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExamSolutionHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exam-solution-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exam_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'answers_list')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'total_questions_count')->textInput() ?>

    <?= $form->field($model, 'correct_answers_count')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
