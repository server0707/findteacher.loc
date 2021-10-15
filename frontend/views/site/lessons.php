<?php

/* @var $this yii\web\View */

/* @var $lessons yii\data\ActiveDataProvider */
/* @var $lesson frontend\models\Lesson */
/* @var $subjects frontend\models\Subject */
/* @var $subject frontend\models\Subject */
/* @var int $subject_id */

$lan = Yii::$app->language;

$this->registerJs('$(".custom-select").on(\'input\', function () {
        var val = this.value;
        if($("#subjects option").filter(function(){
            return this.value.toUpperCase() === val.toUpperCase();
        }).length) {
            //send ajax request
            window.location.href = "/site/lessons?subject_name="+this.value;
        }
    });');
?>

<section class="w3l-courses">
    <div class="blog pb-5" id="courses">
        <?php if (empty($lessons->getModels())) : ?>
            <?= Yii::$app->session->setFlash('danger', Yii::t('yii', 'No data found')) ?>
            <div class="container">
                <input list="subjects" value="<?= \frontend\models\Subject::findOne($subject_id)['name_' . $lan] ?>"
                       class="custom-select custom-select-sm">
                <datalist id="subjects">
                    <?php foreach ($subjects as $subject) : ?>
                    <option value="<?= $subject['name_' . $lan] ?>">
                        <?php endforeach; ?>
                </datalist>
            </div>
        <?php else: ?>
            <div class="container">
                <input list="subjects" value="<?= \frontend\models\Subject::findOne($subject_id)['name_' . $lan] ?>"
                       class="custom-select custom-select-sm">
                <datalist id="subjects">
                    <?php foreach ($subjects as $subject) : ?>
                        <option value="<?= $subject['name_' . $lan] ?>">
                    <?php endforeach; ?>
                </datalist>
            </div>
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <?php foreach ($lessons->getModels() as $lesson) : ?>
                        <div class="col-lg-4 col-md-6 item mt-md-0 mt-5">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="#course-single" class="zoom d-block">
                                        <img class="card-img-bottom d-block" src="<?=$lesson->getImage()->getUrl()?>"
                                             alt="<?=$lesson->subject['name_' . $lan]?>">
                                    </a>
<!--                                    <div class="course-price-badge"> Free</div>-->
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue"><?=$lesson->subject['name_' . $lan]?></a>
                                    </div>
                                </div>
                                <div class="card-body course-details">
                                    <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                        <p>
                                            <?=$lesson->price?>
                                            <?php if (!empty($lesson->old_price)) : ?>
                                                <div><s><?=$lesson->old_price?></s></div>
                                            <?php endif; ?>
                                        </p>
                                        <ul class="rating-star">
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star-o"></span></li>
                                        </ul>
                                    </div>
                                    <a href="#course-single" class="course-desc"><?=$lesson['description_' . $lan]?></a>
                                    <div class="course-meta mt-4">
                                        <div class="meta-item course-lesson">
                                            <span class="fa fa-clock-o"></span>
                                            <span class="meta-value"> 20 hrs </span>
                                        </div>
                                        <div class="meta-item course-">
                                            <span class="fa fa-user-o"></span>
                                            <span class="meta-value"> <?=$lesson->student_count?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="author align-items-center">
                                        <img src="<?=$lesson->user->getImage()->getUrl()?>" alt="<?=$lesson->subject['name_' . $lan]?>'s image of Teacher" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <span class="meta-value mx-1">by</span> <a href="#author"> <?=$lesson->user->getFullName()?></a>
                                            </li>
                                            <li>
                                                <span class="meta-value mx-1">in</span> <a href="#author"> <?=$lesson->subject['name_' . $lan]?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- pagination -->
                <?php
                echo \yii\bootstrap4\LinkPager::widget([
                    'pagination' => $lessons->pagination,
                    'options' => [
                        'class' => 'float-right mt-5'
                    ]

                ]);
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>