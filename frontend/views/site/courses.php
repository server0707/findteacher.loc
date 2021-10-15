<?php

/* @var $this yii\web\View */

/* @var $courses yii\data\ActiveDataProvider */
/* @var $course frontend\models\Course */
/* @var $courses_list[] frontend\models\Course */
/* @var string $course_name - current course*/

$this->registerJs('$(".custom-select").on(\'input\', function () {
        var val = this.value;
        if($("#courses1 option").filter(function(){
            return this.value.toUpperCase() === val.toUpperCase();
        }).length) {
            //send ajax request
            window.location.href = "/site/courses?course_name="+this.value;
        }
    });');
?>

<section class="w3l-courses">
    <div class="blog pb-5" id="courses">
        <?php if (empty($courses->getModels())) : ?>
            <?php \yii\widgets\Pjax::begin(['id' => 'courses-pjax']); ?>
            <?= Yii::$app->session->setFlash('danger', Yii::t('yii', 'No data found')) ?>
            <div class="container">
                <input list="courses1" value="<?=$course_name?>" class="custom-select custom-select-sm">
                <datalist id="courses1">
                    <?php foreach ($courses_list as $course) : ?>
                    <option value="<?= $course->name_uz ?>">
                        <?php endforeach; ?>
                </datalist>
            </div>
            <?php \yii\widgets\Pjax::end(); ?>
        <?php else: ?>
            <?php \yii\widgets\Pjax::begin(['id' => 'courses-pjax']); ?>
            <div class="container">
                <input list="courses1" value="<?=$course_name?>" class="custom-select custom-select-sm">
                <datalist id="courses1">
                    <?php foreach ($courses_list as $course) : ?>
                    <option value="<?= $course->name_uz ?>">
                        <?php endforeach; ?>
                </datalist>
            </div>
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <?php
                    $lan = Yii::$app->language;
                    foreach ($courses->getModels() as $course) : ?>
                        <div class="col-lg-3 col-md-4 item mt-2">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="<?= \yii\helpers\Url::to(['site/subjects', 'course_id' => $course->id]) ?>"
                                       class="zoom d-block">
                                        <img class="card-img-bottom d-block" src="<?= $course->getImage()->getUrl() ?>"
                                             alt="<?= $course['name_' . $lan] ?> - image">
                                    </a>
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue"><?= $course['name_' . $lan] ?></a>
                                    </div>
                                </div>
                                <div class="card-body" style="height: 150px; overflow: auto">
                                    <a href="<?= \yii\helpers\Url::to(['site/subjects', 'course_id' => $course->id]) ?>"
                                       class="">
                                        <?= $course['description_' . $lan] ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- pagination -->
                <?php
                echo \yii\bootstrap4\LinkPager::widget([
                    'pagination' => $courses->pagination,
                    'options' => [
                        'class' => 'float-right mt-5'
                    ]

                ]);
                ?>
                <!-- //pagination -->
            </div>
            <?php \yii\widgets\Pjax::end(); ?>
        <?php endif; ?>
    </div>
</section>