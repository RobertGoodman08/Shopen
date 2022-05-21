<?php
/** @var $this \fcs\View */
/** @var $category array */
/** @var $products array */
/** @var $total int */
/** @var $pagination object */
/** @var $breadcrumbs string */
?>



<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Shop</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="<?= base_url() ?>">Home</a>
                </li>
                <li class="is-marked">
                    <a href="#">Category</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Shop-Page -->
<div class="page-shop u-s-p-t-80">
    <div class="container">
        <!-- Shop-Intro -->
        <div class="shop-intro">
            <ul class="bread-crumb">
                <?= $breadcrumbs ?>
            </ul>
        </div>
        <!-- Shop-Intro /- -->
        <div class="row">
            <!-- Shop-Left-Side-Bar-Wrapper -->

            <!-- Shop-Left-Side-Bar-Wrapper /- -->
            <!-- Shop-Right-Wrapper -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <!-- Page-Bar -->
                <div class="page-bar clearfix">

                    <!-- Toolbar Sorter 1  -->

                    <?php if ($pagination->countPages > 1 || count($products) > 1): ?>
                    <div class="toolbar-sorter">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="sort-by"><?php __('category_view_sort'); ?>:</label>
                            <select class="select-box" id="sort-by">
                                <option selected="" disabled><?php __('category_view_sort_by_default'); ?></option>

                                <option value="sort=title_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'title_asc') echo 'selected' ?>><?php __('category_view_sort_title_asc'); ?></option>

                                <option value="sort=title_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'title_desc') echo 'selected' ?>><?php __('category_view_sort_title_desc'); ?></option>

                                <option value="sort=price_asc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected' ?>><?php __('category_view_sort_price_asc'); ?></option>

                                <option value="sort=price_desc" <?php if (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected' ?>><?php __('category_view_sort_price_desc'); ?></option>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- //end Toolbar Sorter 1  -->
                    <!-- Toolbar Sorter 2  -->

                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->
                <!-- Row-of-Product-Container -->
                <div class="row product-container list-style">
                    <?php if (!empty($products)): ?>
                        <div class="product-item col-lg-4 col-md-6 col-sm-6">
                            <?php $this->getPart('parts/product_loop', compact('products')); ?>

                    </div>
                    <?php else: ?>
                        <p><?php __('category_view_no_products'); ?></p>
                    <?php endif; ?>
                </div>
                <!-- Row-of-Product-Container /- -->
                <div class="pagination-area">
                    <div class="pagination-number">
                        <ul>
                            <?php if ($pagination->countPages > 1): ?>
                                <?= $pagination ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Shop-Right-Wrapper /- -->
        </div>
    </div>
</div>

