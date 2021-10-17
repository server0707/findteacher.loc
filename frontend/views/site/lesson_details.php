<?php

/* @var $this yii\web\View */
/* @var $lesson frontend\models\Lesson */
/* @var $contact frontend\models\ContactsOfUser */

$lang = Yii::$app->language;
?>
<section class="w3l-lesson_detailsblock1 py-5" id="lesson-details">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row">
            <div class="col-lg-8 align-self">
                <div class="row">
                    <iframe width="100%" height="409" src="<?=$lesson->link_of_lesson_video?>"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    <div>
                        <i class="fa fa-eye"></i> <?= $lesson->viewed ?>
                    </div>
                    <div style="margin-left: auto">
                        <a href="#"><i class="fa fa-thumbs-up"></i></a>11
                        <a href="#"><i class="fa fa-thumbs-down"></i></a>11
                        <a href="#"><i class="far fa-heart"></i></a>
                        <a href="#"><i class="fas fa-heart"></i></a>
                    </div>
                    <div class="text-justify">
                        <?= $lesson['description_' . $lang] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="text-justify">
                        <h1 class="text-center"><?= Yii::t('yii', 'About the lesson') ?></h1>
                        <p><?= $lesson['about_' . $lang] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                <p><b><?= Yii::t('yii', 'Province') ?>: </b><?= $lesson->region->province['name_' . $lang] ?></p>
                <p><b><?= Yii::t('yii', 'Region') ?>: </b><?= $lesson->region['name_' . $lang] ?></p>
                <p><b><?= Yii::t('yii', 'Address') ?>: </b><?= $lesson->address ?></p>
                <p><b><?= Yii::t('yii', 'Days') ?>: </b>
                    <?php
                    $days = explode(',', $lesson->days);
                    foreach ($days as $day) {
                        echo Yii::t('yii', date('l', strtotime("Sunday +{$day} days"))) . '; ';
                    }
                    ?>
                </p>
                <p><b><?= Yii::t('yii', 'Time') ?>: </b><?= $lesson->start_time ?> - <?= $lesson->finish_time ?></p>
                <p><b><?= Yii::t('yii', 'Price') ?> </b><?= $lesson->price ?> <s><?= $lesson->old_price ?></s></p>
                <p><b><?= Yii::t('yii', 'Duration') ?>: </b><?= $lesson->duration ?></p>
                <p><b><?= Yii::t('yii', 'Students count') ?>: </b><?= $lesson->student_count ?></p>
                <hr>
                <h3 class="text-center"><?= Yii::t('yii', 'Teacher') ?>:</h3>
                <img src="<?= $lesson->user->getImage()->getUrl() ?>" alt="Teacher image"
                     class="img-fluid radius-image">
                <p><b><?= Yii::t('yii', 'Teacher name') ?>: </b><a
                            href="<?= \yii\helpers\Url::to(['site/teacher_details', 'id' => $lesson->user_id]) ?>"><?= $lesson->user->getFullName() ?></a>
                </p>
                <div>
                    <p><b><?= (!empty($lesson->user->contactsOfUsers))?Yii::t('yii', 'Contacts').':':'' ?></b>
                    <ul style="margin-left: 30px;">
                        <?php foreach ($lesson->user->contactsOfUsers as $contact) : ?>
                            <li><b><?= $contact->contact->name ?>: </b>
                                <a href="<?= $lesson->getLinkToContact($contact->contact->name, $contact->value) ?>"><?= $contact->value ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>