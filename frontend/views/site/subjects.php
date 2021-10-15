<?php

/* @var $this yii\web\View */

/* @var $subjects yii\data\ActiveDataProvider */
/* @var $subject frontend\models\Subject */
/* @var $courses frontend\models\Course */
/* @var $course frontend\models\Course */
/* @var int $course_id */

$lan = Yii::$app->language;

$this->registerJs('$(".custom-select").on(\'input\', function () {
        var val = this.value;
        if($("#courses2 option").filter(function(){
            return this.value.toUpperCase() === val.toUpperCase();
        }).length) {
            //send ajax request
            window.location.href = "/site/subjects?course_name="+this.value;
        }
    });');
?>

<section class="w3l-courses">
    <div class="blog pb-5" id="courses">
        <?php if (empty($subjects->getModels())) : ?>
            <?php \yii\widgets\Pjax::begin(['id' => 'subject-pjax']);?>
            <?= Yii::$app->session->setFlash('danger', Yii::t('yii', 'No data found')) ?>
            <div class="container">
                <input list="courses2" value="<?= \frontend\models\Course::findOne($course_id)['name_' . $lan] ?>"
                       class="custom-select custom-select-sm">
                <datalist id="courses2">
                    <?php foreach ($courses as $course) : ?>
                    <option value="<?= $course['name_' . $lan] ?>">
                        <?php endforeach; ?>
                </datalist>
            </div>
            <?php \yii\widgets\Pjax::end();?>
        <?php else: ?>
            <?php \yii\widgets\Pjax::begin(['id' => 'subject-pjax']);?>
            <div class="container">
                <input list="courses2" value="<?= \frontend\models\Course::findOne($course_id)['name_' . $lan] ?>"
                       class="custom-select custom-select-sm">
                <datalist id="courses2">
                    <?php foreach ($courses as $course) : ?>
                    <option value="<?= $course['name_' . $lan] ?>">
                        <?php endforeach; ?>
                </datalist>
            </div>
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <?php foreach ($subjects->getModels() as $subject) : ?>
                        <div class="col-lg-3 col-md-4 item mt-2">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="<?= \yii\helpers\Url::to(['site/lessons', 'subject_id' => $subject->id]) ?>"
                                       class="zoom d-block">
                                        <img class="card-img-bottom d-block" src="<?= $subject->getImage()->getUrl() ?>"
                                             alt="<?= $subject['name_' . $lan] ?> - image">
                                    </a>
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue"><?= $subject['name_' . $lan] ?></a>
                                    </div>
                                </div>
                                <div class="card-body" style="height: 150px; overflow: auto">
                                    <a href="<?= \yii\helpers\Url::to(['site/lessons', 'subject_id' => $subject->id]) ?>"
                                       class="">
                                        <?= $subject['description_' . $lan] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- pagination -->
                <?php
                echo \yii\bootstrap4\LinkPager::widget([
                    'pagination' => $subjects->pagination,
                    'options' => [
                        'class' => 'float-right mt-5'
                    ]

                ]);
                ?>
            </div>
            <?php \yii\widgets\Pjax::end();?>
        <?php endif; ?>
    </div>
</section>