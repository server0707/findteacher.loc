<?php
use yii\helpers\Url;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <a href="<?=Url::toRoute(['user/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Users'),
                'number' => \backend\models\User::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['course/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Courses'),
                'number' => \backend\models\Course::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['subject/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Subjects'),
                'number' => \backend\models\Subject::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['theme/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Themes'),
                'number' => \backend\models\Theme::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['lesson/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Lessons'),
                'number' => \backend\models\Lesson::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['question/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Questions'),
                'number' => \backend\models\Question::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['answer/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Answers'),
                'number' => \backend\models\Answer::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['exam/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Exams'),
                'number' => \backend\models\Exam::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['exam-solution-history/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Exam solution history'),
                'number' => \backend\models\ExamSolutionHistory::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['keyword/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Keywords'),
                'number' => \backend\models\Keyword::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
        <a href="<?=Url::toRoute(['status/index'])?>" class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => Yii::t('yii', 'Statuses'),
                'number' => \backend\models\Status::find()->count(),
                'icon' => 'far fa-user',
            ]) ?>
        </a>
    </div>

    <?=\yii\bootstrap4\Html::a('Add Data Page',['site/add-data'])?>
</div>