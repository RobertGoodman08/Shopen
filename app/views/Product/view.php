<?php


use fcs\View;

/** var $this View */


?>

<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Detail</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="<?= base_url() ?>">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#">Detail</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Single-Product-Full-Width-Page -->
<div class="page-detail u-s-p-t-80">
    <div class="container">
        <!-- Product-Detail -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-zoom-area -->
                <div class="zoom-area">
                    <img id="zoom-pro" class="img-fluid" src="<?= PATH . $product['img'] ?>" data-zoom-image="<?= PATH . $product['img'] ?>" alt="Zoom Image">
                    <div id="gallery" class="u-s-m-t-10">
                        <a class="active" data-image="<?= PATH . $product['img'] ?>" data-zoom-image="<?= PATH . $product['img'] ?>">
                            <img src="<?= PATH . $product['img'] ?>" alt="Product">
                        </a>

                        <?php if(!empty($gallery)): ?>
                            <?php foreach ($gallery as $item): ?>
                                <a class="active" data-image="<?= PATH .  $item['img'] ?>" data-zoom-image="<?= PATH .   $item['img'] ?>">
                                    <img src="<?= PATH .   $item['img'] ?>" alt="Product">
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </div>
                </div>
                <!-- Product-zoom-area /- -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!-- Product-details -->
                <div class="all-information-wrapper">
                    <div class="section-1-title-breadcrumb-rating">
                        <div class="product-title">
                            <h1>
                                <?= $product['title'] ?>
                            </h1>
                        </div>
                        <ul class="bread-crumb">
                            <?= $breadcrumbs ?>

                        </ul>
                        <div class="product-rating">
                            <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                <span style='width:67px'></span>
                            </div>
                            <span>(23)</span>
                        </div>
                    </div>
                    <div class="section-2-short-description u-s-p-y-14">
                        <h6 class="information-heading u-s-m-b-8">Description:</h6>
                        <p> <?= $product['description'] ?>
                        </p>
                    </div>
                    <div class="section-3-price-original-discount u-s-p-y-14">
                        <div class="price">
                            <h4>$<?= $product['price'] ?></h4>
                        </div>
                        <div class="original-price">
                            <?php if($product['old_price']): ?>
                                <span>Original Price:</span>

                                <span>$<?= $product['old_price'] ?></span>
                            <?php endif; ?>
                        </div>

                    </div>


                    <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                        <form class="post-form">
                            <div class="quick-social-media-wrapper u-s-m-b-22">

                            </div>
                            <div class="quantity-wrapper u-s-m-b-22">
                                <span>Quantity:</span>
                                <div class="quantity">
                                    <input type="text" class="quantity-text-field" value="1">
                                    <a class="plus-a" data-max="1000">&#43;</a>
                                    <a class="minus-a" data-min="1">&#45;</a>
                                </div>
                            </div>
                        </form>
                            <div>
                                <a class="button button-outline-secondary add-to-cart"  href="cart/add?id=<?= $product['id'] ?>"  data-id="<?= $product['id'] ?>"> <?php __('product_view_buy') ?> </a>
                                <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                            </div>

                    </div>
                </div>
                <!-- Product-details /- -->
            </div>
        </div>
        <!-- Product-Detail /- -->
        <!-- Detail-Tabs -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="detail-tabs-wrapper u-s-p-t-80">
                    <div class="detail-nav-wrapper u-s-m-b-30">
                        <ul class="nav single-product-nav justify-content-center">

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#specification">Подробное описания</a>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <!-- Description-Tab -->
                        <div class="tab-pane fade active show" id="description">
                            <div class="description-whole-container">
                                <p class="desc-p u-s-m-b-26"><?= $product['description'] ?>
                                </p>

                            </div>
                        </div>
                        <!-- Description-Tab /- -->
                        <!-- Specifications-Tab -->
                        <div class="tab-pane fade" id="specification">
                            <div class="specification-whole-container">

                                <div class="spec-table u-s-m-b-50">
                                    <h5 class="spec-heading"><?= $product['content'] ?></h5>

                                </div>
                            </div>
                        </div>
                        <!-- Specifications-Tab /- -->
                        <!-- Reviews-Tab -->

                        <!-- Reviews-Tab /- -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Detail-Tabs /- -->

    </div>
</div>