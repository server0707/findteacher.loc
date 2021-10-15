<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

//<!-- stats number counter-->
$this->registerJs("$('.counter').countUp();");

//<!-- script for banner slider-->
$this->registerJs("$(document).ready(function () {
    $('.owl-one').owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      dots: false,
      responsiveClass: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplaySpeed: 1000,
      autoplayHoverPause: false,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 1
        },
        667: {
          items: 1
        },
        1000: {
          items: 1,
          nav: true
        }
      }
    })
  })");

//<!-- script for tesimonials carousel slider -->
$this->registerJs('$(document).ready(function () {
      $("#owl-demo1").owlCarousel({
          loop: true,
          margin: 20,
          nav: false,
          responsiveClass: true,
          responsive: {
              0: {
                  items: 1,
                  nav: false
              },
              768: {
                  items: 2,
                  nav: false
              },
              1000: {
                  items: 3,
                  nav: false,
                  loop: false
              }
          }
      })
  })');

//<!-- disable body scroll which navbar is in active -->
$this->registerJs("$(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });");

//<!--/MENU-JS-->
$this->registerJs('$(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

  //Main navigation Active Class Add Remove
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="/favicon.ico">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--header-->
<header id="site-header" class="fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark stroke">
            <h1>
                <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                    <img src="/favicon.ico" alt="icon of website" width="40px">TFS <span
                            class="logo"><?= Yii::$app->name ?></span></a>
            </h1>

            <!-- if logo is image enable this
              <a class="navbar-brand" href="#index.html">
                  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
              </a> -->
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-lg-auto">
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'index') ? 'active' : '@@index__active' ?>">
                        <a class="nav-link" href="<?= Yii::$app->homeUrl ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'about') ? 'active' : '@@about__active' ?>">
                        <a class="nav-link" href="<?= \yii\helpers\Url::to(['site/about']) ?>">About</a>
                    </li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'courses') ? 'active' : '@@courses__active' ?>">
                        <a class="nav-link" href="<?= \yii\helpers\Url::to(['site/courses']) ?>">Courses</a>
                    </li>
                    <li class="nav-item <?= (Yii::$app->controller->action->id == 'contact') ? 'active' : '@@contact__active' ?>">
                        <a class="nav-link" href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Contact</a>
                    </li>
                    <li class="nav-item">
                        <?= \common\widgets\LanguageChangerBootstrap4::widget() ?>
                    </li>
                </ul>

                <!--/search-right-->
                <div class="search-right">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                        <div class="popup">

                            <form action="error.html" method="GET" class="search-box">
                                <input type="search" placeholder="Search" name="search" required="required"
                                       autofocus="">
                                <button type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span>
                                </button>
                            </form>

                        </div>
                        <a class="close" href="#close">×</a>
                    </div>
                    <!-- /search popup -->
                </div>

                <!--                Login button-->
                <?php if (Yii::$app->user->isGuest): ?>
                    <div class="top-quote mr-lg-2 text-center">
                        <a href="<?= \yii\helpers\Url::toRoute(['site/login']) ?>" class="btn login mr-2"><span
                                    class="fa fa-user"></span> login</a>
                    </div>
                <?php else: ?>
                    <div class="top-quote mr-lg-2 text-center">
                        <a href="<?= \yii\helpers\Url::toRoute(['site/logout']) ?>" data-method="post"
                           class="btn login mr-2"><span
                                    class="fa fa-user"></span> logout(<?= Yii::$app->user->identity->username ?>)</a>
                    </div>
                <?php endif; ?>
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container py-1">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
<!--/header-->

<?php if (Yii::$app->controller->action->id != 'index'): ?>
    <!-- about breadcrumb -->
    <section class="w3l-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-3 p-lg-4 pb-3">
                <h2 class="title mt-5 pt-lg-5 pt-sm-3"><span
                            class="text-capitalize"><?= Yii::$app->controller->action->id ?></span></h2>
                <ul class="breadcrumbs-custom-path pb-sm-5 pb-4 mt-2 text-center mb-5">
                    <li><a href="<?= Yii::$app->homeUrl ?>"><?= Yii::t('yii', 'Home') ?></a></li>
                    <?php if (Yii::$app->controller->action->id == 'subjects') : ?>
                        <li> /
                            <a href="<?= \yii\helpers\Url::to(['courses']) ?>"><?= Yii::t('yii', 'Courses') ?></a>
                        </li>
                    <?php endif; ?>
                    <li class="active">
                        / <?= Yii::t('yii', '<span class="text-capitalize">' . Yii::$app->controller->action->id . '</span>') ?></li>
                </ul>
            </div>
        </div>
        <div class="waveWrapper waveAnimation">
            <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                <path d="M-5.07,73.52 C149.99,150.00 299.66,-102.13 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                      style="stroke: none;"></path>
            </svg>
        </div>
    </section>
    <!-- //about breadcrumb -->
<?php endif; ?>
<? /*= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) */ ?>
<div class="container">
    <?= Alert::widget() ?>
</div>

<?= $content ?>

<!-- footer -->
<section class="w3l-footer-29-main">
    <div class="footer-29 py-5">
        <div class="container py-md-4">
            <div class="row footer-top-29">
                <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-1 pr-lg-5">
                    <h6 class="footer-title-29">Contact Info </h6>
                    <p>Address : Study course, 343 marketing, #2214 cravel street, NY - 62617.</p>
                    <p class="my-2">Phone : <a href="tel:+1(21) 234 4567">+1(21) 234 4567</a></p>
                    <p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
                    <div class="main-social-footer-29 mt-4">
                        <a href="#facebook" class="facebook"><span class="fa fa-facebook"></span></a>
                        <a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a>
                        <a href="#instagram" class="instagram"><span class="fa fa-instagram"></span></a>
                        <a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-5 col-6 footer-list-29 footer-2 mt-sm-0 mt-5">

                    <ul>
                        <h6 class="footer-title-29">Company</h6>
                        <li><a href="about.html">About company</a></li>
                        <li><a href="#blog"> Latest Blog posts</a></li>
                        <li><a href="#teacher"> Became a teacher </a></li>
                        <li><a href="courses.html">Online Courses</a></li>
                        <li><a href="contact.html">Get in touch</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-5 col-6 footer-list-29 footer-3 mt-lg-0 mt-5">
                    <h6 class="footer-title-29">Programs</h6>
                    <ul>
                        <li><a href="#traning">Training Center</a></li>
                        <li><a href="#documentation">Documentation</a></li>
                        <li><a href="#release">Release Status</a></li>
                        <li><a href="#customers"> Customers</a></li>
                        <li><a href="#helpcenter"> Help Center</a></li>
                    </ul>

                </div>
                <div class="col-lg-3 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">
                    <h6 class="footer-title-29">Suppport</h6>
                    <a href="#playstore"><img src="/images/googleplay.png" class="img-responsive" alt=""></a>
                    <a href="#appstore"><img src="/images/appstore.png" class="img-responsive mt-3" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright -->
    <section class="w3l-copyright text-center">
        <div class="container">
            <p class="copy-footer-29">© 2020 Study Course. All rights reserved. Design by <a
                        href="https://w3layouts.com/"
                        target="_blank">
                    W3Layouts</a></p>
        </div>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            &#10548;
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- /move top -->
    </section>
    <!-- //copyright -->
</section>
<!-- //footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
