<?php
/** @var $this \wfm\View */
/** @var $products array */
/** @var $total int */
/** @var $pagination object */
?>

<div class="container py-3">
    <div class="row">

        <div class="col-lg-12 category-content">
            <h1 class="section-title"><?php __('search_index_search_title'); ?></h1>

            <h4><?php echo ___('search_index_search_query') . h($s); ?></h4>

            <div class="row">
                <?php if (!empty($products)): ?>
                    <?php $this->getPart('parts/product_loop', compact('products')); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <?= count($products) ?>
                                <?php __('tpl_total_pagination'); ?>
                                <?= $total ?>
                            </p>
                            <br>
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
                    </div>

                <?php else: ?>
                    <p><?php __('search_index_not_found'); ?></p>
                <?php endif; ?>

                <br>
                <br>
                <br>
            </div>
        </div>

    </div>
</div>
