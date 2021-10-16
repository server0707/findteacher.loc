<?php

/* @var $this yii\web\View */

/* @var $teachers yii\data\ActiveDataProvider */
/* @var $teacher frontend\models\User */

$lang = Yii::$app->language;
?>

<section class="w3l-courses">
    <div class="blog pb-5" id="courses">
        <?php if (empty($teachers->getModels())) : ?>
            <?= Yii::$app->session->setFlash('danger', Yii::t('yii', 'No data found')) ?>
        <?php else: ?>
            <div class="container py-lg-5 py-md-4 py-2">
                <div class="row">
                    <?php foreach ($teachers->getModels() as $teacher) : ?>
                        <div class="col-lg-4 col-md-6 item mt-md-0 mt-5">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="<?=\yii\helpers\Url::to(['site/teacher-details', 'id' => $teacher->id])?>" class="zoom d-block">
                                        <img class="card-img-bottom d-block" src="<?=$teacher->getImage()->getUrl()?>"
                                             alt="Image of Teacher">
                                    </a>
<!--                                    <div class="course-price-badge"> Free</div>-->
                                    <div class="post-pos">
                                        <a href="#reciepe" class="receipe blue"><?=$teacher->username?></a>
                                    </div>
                                </div>
                                <div class="card-body course-details" style="height: 200px; overflow: auto">
                                    <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                        <ul class="rating-star">
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star-o"></span></li>
                                        </ul>
                                    </div>
                                    <a href="<?=\yii\helpers\Url::to(['site/teacher-details', 'id' => $teacher->id])?>" class="course-desc"><?=$teacher['description_' . $lang]?></a>
                                </div>
                                <div class="card-footer">
                                    <div class="author align-items-center">
                                        <img src="<?=$teacher->getImage()->getUrl()?>" alt="Image of Teacher" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <span class="meta-value mx-1">by</span> <a href="<?=\yii\helpers\Url::to(['site/teacher-details', 'id' => $teacher->id])?>"> <?=$teacher->getFullName()?></a>
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
                    'pagination' => $teachers->pagination,
                    'options' => [
                        'class' => 'float-right mt-5'
                    ]

                ]);
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>