<?php

/* @var $this yii\web\View */
/* @var $lessons[] frontend\models\Lesson */
$lang = Yii::$app->language;
?>
<!-- main-slider -->
<section class="w3l-main-slider" id="home">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>50% Discount on all Popular Courses</h5>
                                    <p class="mt-4 pr-lg-4">Take the first step to your journey to success with us</p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="about.html"> Ready to
                                        get started?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="item">
                <li>
                    <div class="slider-info  banner-view banner-top1 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Learn and Improve Yourself in Less Time </h5>
                                    <p class="mt-4 pr-lg-4">Our self improvement courses is very effective </p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="about.html"> Ready to
                                        get started?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top2 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Be More Productive to Be More Successful</h5>
                                    <p class="mt-4 pr-lg-4">Don't waste your time, check out our productive courses</p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="about.html"> Ready to
                                        get started?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
            <div class="item">
                <li>
                    <div class="slider-info banner-view banner-top3 bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg">
                                    <h5>Enhance your skills with best online courses</h5>
                                    <p class="mt-4 pr-lg-4">Take the first step to your journey to success with us</p>
                                    <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="about.html"> Ready to
                                        get started?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>

    <div class="waveWrapper waveAnimation">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none">
            <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none;"></path>
        </svg>
    </div>
</section>
<!-- /main-slider -->
<section class="w3l-courses">
    <div class="blog pb-5" id="courses">
        <div class="container py-lg-5 py-md-4 py-2">
            <h5 class="title-small text-center mb-1"><?=Yii::t('yii','Find yourself a mentor with us')?></h5>
            <h3 class="title-big text-center mb-sm-5 mb-4"><?=Yii::t('yii','Examples from lessons')?></h3>
            <div class="row">
                <div class="col-lg-4 col-md-6 item">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="<?=\yii\helpers\Url::to(['lesson/'.$lessons[0]->id])?>" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?=$lessons[0]->getImage()->getUrl('368x245')?>"
                                     alt="<?=$lessons[0]['description_'.$lang]?>">
                            </a>
                            <div class="post-pos">
                                <a href="#reciepe" class="receipe blue"><?=$lessons[0]->subject['name_'.$lang]?></a>
                            </div>
                        </div>
                        <div style="height: 300px; overflow: auto" class="card-body course-details">
                            <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                <p><?=$lessons[0]->price?> <s class="small"><?=$lessons[0]->old_price?></s></p>
                                <ul class="rating-star">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                            </div>
                            <a href="<?=\yii\helpers\Url::to(['lesson/'.$lessons[0]->id])?>" class="course-desc"><?=$lessons[0]['description_'.$lang]?></a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-clock-o"></span>
                                    <span class="meta-value"> <?=$lessons[0]->duration?> </span>
                                </div>
                                <div class="meta-item course-">
                                    <span class="fa fa-user-o"></span>
                                    <span class="meta-value"> <?=$lessons[0]->student_count?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="author align-items-center">
                                <img src="<?=$lessons[0]->user->getImage()->getUrl()?>" alt="Teacher image" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <span class="meta-value mx-1">by</span> <a href="<?= \yii\helpers\Url::to(['site/teacher-details', 'id' => $lessons[0]->user_id]) ?>"> <?=$lessons[0]->user->getFullName()?></a>
                                    </li>
                                    <li>
                                        <span class="meta-value mx-1">in</span> <a href="<?= \yii\helpers\Url::to(['site/subjects', 'course_id' => $lessons[0]->subject->course_id]) ?>"> <?=$lessons[0]->subject['name_'.$lang]?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item mt-md-0 mt-5">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="<?=\yii\helpers\Url::to(['lesson/'.$lessons[1]->id])?>" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?=$lessons[1]->getImage()->getUrl('368x245')?>"
                                     alt="<?=$lessons[1]['description_'.$lang]?>">
                            </a>
                            <?php if(empty($lessons[1]->price) || $lessons[1]->price == 0): ?>
                                <div class="course-price-badge"> Free</div>
                            <?php endif; ?>
                            <div class="post-pos">
                                <a href="#reciepe" class="receipe blue"><?=$lessons[1]->subject['name_'.$lang]?></a>
                            </div>
                        </div>
                        <div style="height: 300px; overflow: auto" class="card-body course-details">
                            <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                <p><?=$lessons[1]->price?> <s class="small"><?=$lessons[1]->old_price?></s></p>
                                <ul class="rating-star">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                            </div>
                            <a href="<?=\yii\helpers\Url::to(['lesson/'.$lessons[1]->id])?>" class="course-desc"><?=$lessons[1]['description_'.$lang]?></a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-clock-o"></span>
                                    <span class="meta-value"> <?=$lessons[1]->duration?> </span>
                                </div>
                                <div class="meta-item course-">
                                    <span class="fa fa-user-o"></span>
                                    <span class="meta-value"> <?=$lessons[1]->student_count?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="author align-items-center">
                                <img src="<?=$lessons[1]->user->getImage()->getUrl()?>" alt="Teacher image" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <span class="meta-value mx-1">by</span> <a href="<?= \yii\helpers\Url::to(['site/teacher-details', 'id' => $lessons[1]->user_id]) ?>"> <?=$lessons[1]->user->getFullName()?></a>
                                    </li>
                                    <li>
                                        <span class="meta-value mx-1">in</span> <a href="<?= \yii\helpers\Url::to(['site/subjects', 'course_id' => $lessons[1]->subject->course_id]) ?>"> <?=$lessons[1]->subject['name_'.$lang]?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 item mt-lg-0 mt-5">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="<?=\yii\helpers\Url::to(['lesson/'.$lessons[2]->id])?>" class="zoom d-block">
                                <img class="card-img-bottom d-block" src="<?=$lessons[2]->getImage()->getUrl('368x245')?>"
                                     alt="<?=$lessons[2]['description_'.$lang]?>">
                            </a>
                            <?php if(empty($lessons[2]->price) || $lessons[2]->price == 0): ?>
                                <div class="course-price-badge"> Free</div>
                            <?php endif; ?>
                            <div class="post-pos">
                                <a href="#reciepe" class="receipe blue"><?=$lessons[2]->subject['name_'.$lang]?></a>
                            </div>
                        </div>
                        <div style="height: 300px; overflow: auto" class="card-body course-details">
                            <div class="price-review d-flex justify-content-between mb-1align-items-center">
                                <p><?=$lessons[2]->price?> <s class="small"><?=$lessons[2]->old_price?></s></p>
                                <ul class="rating-star">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                            </div>
                            <a href="<?=\yii\helpers\Url::to(['lesson/'.$lessons[2]->id])?>" class="course-desc"><?=$lessons[2]['description_'.$lang]?></a>
                            <div class="course-meta mt-4">
                                <div class="meta-item course-lesson">
                                    <span class="fa fa-clock-o"></span>
                                    <span class="meta-value"> <?=$lessons[2]->duration?> </span>
                                </div>
                                <div class="meta-item course-">
                                    <span class="fa fa-user-o"></span>
                                    <span class="meta-value"> <?=$lessons[2]->student_count?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="author align-items-center">
                                <img src="<?=$lessons[2]->user->getImage()->getUrl()?>" alt="Teacher image" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <span class="meta-value mx-1">by</span> <a href="<?= \yii\helpers\Url::to(['site/teacher-details', 'id' => $lessons[2]->user_id]) ?>"> <?=$lessons[2]->user->getFullName()?></a>
                                    </li>
                                    <li>
                                        <span class="meta-value mx-1">in</span> <a href="<?= \yii\helpers\Url::to(['site/subjects', 'course_id' => $lessons[2]->subject->course_id]) ?>"> <?=$lessons[2]->subject['name_'.$lang]?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 text-more">
                <p class="pt-md-3 sample text-center">
                    <a href="<?=\yii\helpers\Url::to(['courses'])?>"><?=Yii::t('yii','View All Courses')?> <span class="pl-2 fa fa-long-arrow-right"></span></a>
                </p>
            </div>
        </div>
    </div>
</section>
<section class="w3l-features py-5" id="facilities">
    <div class="call-w3 py-lg-5 py-md-4 py-2">
        <div class="container">
            <div class="row main-cont-wthree-2">
                <div class="col-lg-5 feature-grid-left">
                    <h5 class="title-small mb-1">Study and graduate</h5>
                    <h3 class="title-big mb-4">Our Facilities </h3>
                    <p class="text-para">Curabitur id gravida risus. Fusce eget ex fermentum, ultricies nisi ac sed,
                        lacinia est.
                        Quisque ut lectus consequat, venenatis eros et, commodo risus. Nullam sit amet laoreet elit.
                        Suspendisse non magna a velit efficitur. </p>
                    <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas ab qui impedit, libero illo
                        quia sequi quibusdam iure. Error minus quod reprehenderit quae dolor velit soluta animi
                        voluptate dicta enim? Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, provident!</p>
                    <a href="#url" class="btn btn-primary btn-style mt-md-5 mt-4">Discover More</a>
                </div>
                <div class="col-lg-7 feature-grid-right mt-lg-0 mt-5">
                    <div class="call-grids-w3 d-grid">
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span class="fa fa-certificate"></span></a>
                            <h4><a href="#feature" class="title-head">Global Certificate</a></h4>
                            <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed doloramet laoreet.</p>
                        </div>
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span class="fa fa-book"></span></a>
                            <h4><a href="#feature" class="title-head">Books & Library</a></h4>
                            <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed dolor amet laoreet.</p>
                        </div>
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span class="fa fa-trophy"></span></a>
                            <h4><a href="#feature" class="title-head">Scholarship</a></h4>
                            <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed dolor amet laoreet.</p>
                        </div>
                        <div class="grids-1 box-wrap">
                            <a href="#more" class="icon"><span class="fa fa-graduation-cap"></span></a>
                            <h4><a href="#feature" class="title-head">Alumni Support</a></h4>
                            <p>Vivamus a ligula quam. Ut blandit eu leo non. Duis sed dolor amet laoreet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="w3l-homeblock3 py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <h5 class="title-small text-center mb-1">From the news</h5>
        <h3 class="title-big text-center mb-sm-5 mb-4">Latest <span>News</span></h3>
        <div class="row top-pics">
            <div class="col-md-6">
                <div class="top-pic1">
                    <div class="card-body blog-details">
                        <a href="#blog-single" class="blog-desc">Enhance your educational skills and also experience with best online courses
                        </a>
                        <div class="author align-items-center">
                            <img src="/images/team1.jpg" alt="" class="img-fluid rounded-circle" />
                            <ul class="blog-meta">
                                <li>
                                    <a href="#author">Isabella ava</a> </a>
                                </li>
                                <li class="meta-item blog-lesson">
                                    <span class="meta-value"> Nov 19, 2020 </span>. <span class="meta-value ml-2"><span
                                                class="fa fa-clock-o"></span> 1 min</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-md-0 mt-4">
                <div class="top-pic2">
                    <div class="card-body blog-details">
                        <a href="#blog-single" class="blog-desc">Be more productive to be more Successful. Take your first jouney
                        </a>
                        <div class="author align-items-center">
                            <img src="/images/team2.jpg" alt="" class="img-fluid rounded-circle" />
                            <ul class="blog-meta">
                                <li>
                                    <a href="#author">Charlotte mia</a> </a>
                                </li>
                                <li class="meta-item blog-lesson">
                                    <span class="meta-value"> Nov 19, 2020 </span>. <span class="meta-value ml-2"><span
                                                class="fa fa-clock-o"></span> 1 min</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="top-pic3">
                        <div class="card-body blog-details">
                            <a href="#blog-single" class="blog-desc"> Our self improvement courses are more effective. Start leaarning online
                            </a>
                            <div class="author align-items-center">
                                <img src="/images/team3.jpg" alt="" class="img-fluid rounded-circle" />
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#author">Elizabeth</a> </a>
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Nov 19, 2020 </span>. <span
                                                class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-md-5 mt-4 text-more text-center">
            <a href="blog.html">View All Posts <span class="pl-2 fa fa-long-arrow-right"></span></a>
        </div>
    </div>
</div>
<!-- middle -->
<div class="middle py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="welcome-left text-center py-lg-4">
            <h5 class="title-small mb-1">Start learning online</h5>
            <h3 class="title-big">Enhance your skills with best online courses</h3>
            <a href="#started" class="btn btn-style btn-outline-light mt-sm-5 mt-4 mr-2">Get started now</a>
            <a href="contact.html" class="btn btn-style btn-primary mt-sm-5 mt-4">Contact Us</a>
        </div>
    </div>
</div>
<!-- //middle -->
<section class="w3l-team py-5" id="team">
    <div class="call-w3 py-lg-5 py-md-4">
        <div class="container">
            <div class="row main-cont-wthree-2">
                <div class="col-lg-5 feature-grid-left">
                    <h5 class="title-small mb-1">Experienced professionals</h5>
                    <h3 class="title-big mb-4">Meet our teachers</h3>
                    <p class="text-para">Curabitur id gravida risus. Fusce eget ex fermentum, ultricies nisi ac sed,
                        lacinia est.
                        Quisque ut lectus consequat, venenatis eros et, commodo risus. Nullam sit amet laoreet elit.
                        Suspendisse non magna a velit efficitur. </p>
                    <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas ab qui impedit,
                        libero illo
                        quia sequi quibusdam iure. Error minus quod reprehenderit quae dolor velit soluta animi
                        voluptate dicta enim? Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, provident!
                    </p>
                    <a href="#url" class="btn btn-primary btn-style mt-md-5 mt-4">Discover More</a>
                </div>
                <div class="col-lg-7 feature-grid-right mt-lg-0 mt-5">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box16">
                                <a href="#url"><img src="/images/team1.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">James</a></h3>
                                    <span class="post">Director</span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-3">
                            <div class="box16">
                                <a href="#url"><img src="/images/team2.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">Victoria</a></h3>
                                    <span class="post">Managing Director</span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-lg-4 mt-3">
                            <div class="box16">
                                <a href="#url"><img src="/images/team3.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">Isabella</a></h3>
                                    <span class="post">Teacher</a></span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-lg-4 mt-3">
                            <div class="box16">
                                <a href="#url"><img src="/images/team4.jpg" alt="" class="img-fluid radius-image" /></a>
                                <div class="box-content">
                                    <h3 class="title"><a href="#url">Elizabeth</a></h3>
                                    <span class="post">Teacher</a></span>
                                    <ul class="social">
                                        <li>
                                            <a href="#" class="facebook">
                                                <span class="fa fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="twitter">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- testimonials -->
<section class="w3l-testimonials" id="clients">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
        <div class="container py-lg-4 py-md-3 pb-lg-0">

            <h5 class="title-small text-center mb-1">Testimonials</h5>
            <h3 class="title-big text-center mb-sm-5 mb-4">Happy Clients & Feedbacks</h3>
            <!-- /grids -->
            <div class="testimonial-width">
                <div id="owl-demo1" class="owl-two owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team1.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>John wilson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team2.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Julia sakura</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team3.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Roy Linderson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team4.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Mike Thyson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team2.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Laura gill</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team3.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Smith Johnson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team2.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Laura gill</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q>Lorem ipsum dolor sit amet elit. Velit beatae
                                        laudantium
                                        voluptate rem ullam dolore nisi voluptatibus esse quasi, doloribus tempora.
                                        Dolores molestias adipisci dolo amet!.</q>
                                </blockquote>
                                <div class="testi-des">
                                    <div class="test-img"><img src="/images/team3.jpg" class="img-fluid"
                                                               alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h3>Smith Johnson</h3>
                                        <p class="indentity">Student</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /grids -->
    </div>
    <!-- //grids -->
</section>
<!-- //testimonials -->


<section class="w3l-clients py-5" id="clients">
    <div class="call-w3 py-md-4 py-2">
        <div class="container">
            <div class="company-logos text-center">
                <div class="row logos">
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="/images/brand1.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="/images/brand2.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <img src="/images/brand3.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mt-md-0 mt-4">
                        <img src="/images/brand4.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mt-lg-0 mt-4">
                        <img src="/images/brand5.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-md-3 col-4 mt-lg-0 mt-4">
                        <img src="/images/brand6.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
