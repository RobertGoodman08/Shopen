<?php


use fcs\View;

/** var $this View */


?>

<!-- Header /- -->
<!-- Main-Slider -->
<?php if(!empty($slides)): ?>
    <div class="default-height ph-item">
        <div class="slider-main owl-carousel">


            <?php foreach ($slides as $slide): ?>
                <div class="bg-image one">
                    <div class="slide-content slide-animation">
                        <img src="<?= PATH . $slide->img ?> ">
                    </div>
                </div>

            <?php endforeach; ?>



        </div>
    </div>
<?php endif; ?>


<!-- Main-Slider /- -->
<!-- Banner-Layer -->
<div class="banner-layer">
    <div class="container">
        <div class="image-banner">

        </div>
    </div>
</div>
<!-- Banner-Layer /- -->
<!-- Men-Clothing -->



<?php if(!empty($products)): ?>



<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3"><?php __('tpl_top_product') ?></h3>

        </div>
        <div class="wrapper-content">

            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">


                              <?php $this->getPart('parts/product_loop', compact('products')); ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


<?php endif ?>



<br>



<?php if(!empty($products_new)): ?>

<div class="page-deal u-s-p-t-80">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">Новые товары</h3>
        </div>

        <div class="wrapper-content">

            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">


                                <?php $this->getPart('parts/product_new', compact('products_new')); ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php endif; ?>

<hr>
<br>
<br>
<br>


<!-- Brand-Slider /- -->
<!-- Site-Priorities -->
<section class="app-priority">
    <div class="container">
        <div class="priority-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-star"></i>
                        </div>
                        <h2>
                            Большое Значение
                        </h2>
                        <p>Мы предлагаем конкурентоспособные цены на наш ассортимент продукции стоимостью более 100 миллионов долларов</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            Делайте покупки с уверенностью
                        </h2>
                        <p>Наша защита распространяется на вашу покупку от клика до доставки</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            Безопасная Оплата
                        </h2>
                        <p>Платите с помощью самых популярных и безопасных способов оплаты в мире</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            24/7 Help Center
                        </h2>
                        <p>Round-the-clock assistance for a smooth shopping experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>