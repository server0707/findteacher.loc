<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'verification_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fatherName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'role')->dropDownList([ 'admin' => 'Admin', 'teacher' => 'Teacher', 'student' => 'Student', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'description_uz')->textInput() ?>
    <?= $form->field($model, 'description_ru')->textInput() ?>
    <?= $form->field($model, 'about_uz')->widget(\dosamigos\tinymce\TinyMce::className()) ?>
    <?= $form->field($model, 'about_ru')->widget(\dosamigos\tinymce\TinyMce::className()) ?>
    <?= $form->field($model, 'keywords')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('yii', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
