<?php


use fcs\View;

/** @var $this View */
?>
<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <base href="<?= base_url() ?>">
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
<!--    --><?//= $this->getMeta() ?>

    <?= $this->getMeta() ?>

    <!-- Standard Favicon -->
    <link href="<?= PATH ?>/assets/favicon.ico" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/bootstrap.min.css">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/fontawesome.min.css">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/ionicons.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/animate.min.css">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/owl.carousel.min.css">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/jquery-ui-range-slider.min.css">
    <!-- Utility -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/utility.css">
    <!-- Main -->
    <link rel="stylesheet" href="<?= PATH ?>/assets/css/bundle.css">
</head>

<body>

<!-- app -->
<div id="app">
    <!-- Header -->
    <header>
        <!-- Top-Header -->
        <div class="full-layer-outer-header">
            <div class="container clearfix">
                <nav>
                    <ul class="primary-nav g-nav">
                        <li>
                            <a href="tel:+111444989">
                                <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                                Telephone:+993-62-3225555</a>
                        </li>
                        <li>
                            <a href="mailto:contact@domain.com">
                                <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                                E-mail: robertdjango23@gmail.com
                            </a>
                        </li>
                    </ul>
                </nav>
                <nav>
                    <ul class="secondary-nav g-nav">
                        <li>
                            <a>Мой аккаунт
                                <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <ul class="g-dropdown" style="width:200px">
                                <li>
                                    <a href="cart/view">
                                        <i class="fas fa-cog u-s-m-r-9"></i>
                                        Моя корзина</a>
                                </li>
                                <li>
                                    <a href="/wishlist">
                                        <i class="far fa-heart u-s-m-r-9"></i>
                                        Мой список желаний</a>
                                </li>

                                <?php if(empty($_SESSION['user'])): ?>
                                    <li>
                                        <a href="user/login">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            <?= __('tpl_login') ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user/signup">
                                            <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                            <?= __('tpl_signup') ?>
                                        </a>
                                    </li>

                                <?php else: ?>
                                    <li>
                                        <a href="user/cabinet">
                                            <i class="fas fa-logout-in-alt u-s-m-r-9"></i>
                                            <?= __('tpl_cabinet') ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="user/logout">
                                            <i class="fas fa-logout-in-alt u-s-m-r-9"></i>
                                            <?= __('tpl_logout') ?>
                                        </a>
                                    </li>

                                <?php endif; ?>
                            </ul>
                        </li>
                        <li>
                            <?php new \app\widgets\Language\Language() ?>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- Top-Header /- -->
        <!-- Mid-Header -->
        <div class="full-layer-mid-header">
            <div class="container">
                <div class="row clearfix align-items-center">
                    <div class="col-lg-3 col-md-9 col-sm-6">
                        <div class="brand-logo text-lg-center">
                            <a href="<?= base_url() ?>">
                                <img src="<?= PATH ?>/assets/images/main-logo/shopen.png" alt="SHOPEN Brand Logo" class="app-brand-logo" style="height: 130px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 u-d-none-lg">
                        <form class="form-searchbox" action="search">
                            <label class="sr-only" for="search-landscape">Search</label>
                            <input id="search-landscape" type="text" class="text-field" placeholder="<?php __('tpl_search') ?>" name="s">

                            <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <nav>
                            <ul class="mid-nav g-nav">
                                <li class="u-d-none-lg">
                                    <a href="<?= base_url() ?>">
                                        <i class="ion ion-md-home u-c-brand"></i>
                                    </a>
                                </li>
                                <li class="u-d-none-lg">
                                    <a href="/wishlist">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="cart/view" data-bs-toggle="modal" data-bs-target="#cart-modal">
                                        <i class="ion ion-md-basket"></i>


                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Header /- -->
        <!-- Responsive-Buttons -->
        <div class="fixed-responsive-container">
            <div class="fixed-responsive-wrapper">
                <button type="button" class="button fas fa-search" id="responsive-search"></button>
            </div>
            <div class="fixed-responsive-wrapper">
                <a href="/wishlist">
                    <i class="far fa-heart"></i>
                    <span class="fixed-item-counter">4</span>
                </a>
            </div>
        </div>
        <!-- Responsive-Buttons /- -->
        <!-- Mini Cart -->
        <div class="mini-cart-wrapper">
            <div class="mini-cart">
                <div class="mini-cart-header">
                    ВАША КОРЗИНА
                    <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
                </div>
                <?php if (!empty($_SESSION['cart'])): ?>
                    <?php $this->getPart('Cart/cart_modal'); ?>
                <?php endif; ?>
            </div>

        </div>
        <!-- Mini Cart /- -->
        <!-- Bottom-Header -->
        <div class="full-layer-bottom-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="v-menu">
                            <span class="v-title">
                                <i class="ion ion-md-menu"></i>
                                ВСЕ КАТЕГОРИИ
                                <i class="fas fa-angle-down"></i>
                            </span>
                                <nav>

                                    <?php new \app\widgets\Menu\Menu([
                                                'class' => 'v-menu',
                                                'cache' => 0,
                                        ]) ?>
                                </nav>
                        </div>


                    </div>
<!--                    <div class="col-lg-9">-->
<!--                        <ul class="bottom-nav g-nav u-d-none-lg">-->
<!--                            <li>-->
<!--                                <a href="#">--><?php //__('tpl_new_product') ?>
<!--                                    <span class="superscript-label-new">NEW</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">TOP Fashion-->
<!--                                    <span class="superscript-label-hot">TOP</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">--><?php //__('tpl_brands') ?>
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">--><?php //__('tpl_top_stocks') ?>
<!---->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
        <!-- Bottom-Header /- -->
    </header>