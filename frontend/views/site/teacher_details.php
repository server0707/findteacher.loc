<?php

/* @var $this yii\web\View */
/* @var $teacher frontend\models\User */
/* @var $contact frontend\models\ContactsOfUser */
/* @var $lessons yii\data\ActiveDataProvider */
/* @var $lesson frontend\models\Lesson */

$lang = Yii::$app->language;
?>
<section class="w3l-teacher_detailsblock1 py-5" id="teacher_details">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="row">
            <div class="col-lg-9 align-self">
                <h3 class="text-center"><?= Yii::t('yii', 'INFORMATION') ?></h3>
                <div class="row">
                    <div class="col-lg-6 align-self">
                        <img src="<?= $teacher->getImage()->getUrl() ?>" alt="Teacher image"
                             class="img-fluid radius-image">
                    </div>
                    <div class="col-lg-6 left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                        <p><b><?= Yii::t('yii', 'Teacher_fullName') ?>: </b><?= $teacher->getFullName() ?></p>
                        <p>
                            <b><?= ($teacher->getAge() !== '') ? Yii::t('yii', 'Age') . ':' : '' ?> </b><?= $teacher->getAge() ?>
                        </p>
                        <div>
                            <p><b><?= (!empty($teacher->contactsOfUsers)) ? Yii::t('yii', 'Contacts') . ':' : '' ?> </b>
                            <ul style="margin-left: 30px;">
                                <?php foreach ($teacher->contactsOfUsers as $contact) : ?>
                                    <li><b><?= $contact->contact->name ?>: </b>
                                        <a href="<?= $teacher->getLinkToContact($contact->contact->name, $contact->value) ?>"><?= $contact->value ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <h1 class="text-center"><?= Yii::t('yii', 'ABOUT') ?></h1>
                <div class="row">
                    <div class="text-justify">
                        <p><?= $teacher['about_' . $lang] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 left-wthree-img mt-lg-0 mt-sm-5 mt-4">
                <?php \yii\widgets\Pjax::begin(['id' => 'lessonsOfTeacher-pjax']); ?>
                <h3 class="text-center"><?= Yii::t('yii', 'Lessons') ?></h3>
                <ul class="list-group">
                    <?php foreach ($lessons->getModels() as $lesson) : ?>
                        <li class="list-group-item">
                            <a href="#lesson_link">
                                <iframe width="100%" src="<?= $lesson->link_of_lesson_video ?>"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                <p style="font-size: smaller;"><?= $lesson['description_' . $lang] ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- pagination -->
                <?php
                echo \yii\bootstrap4\LinkPager::widget([
                    'pagination' => $lessons->pagination,
                    'options' => [
                        'class' => 'float-right mt-5'
                    ]

                ]);
                ?>
                <?php \yii\widgets\Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>