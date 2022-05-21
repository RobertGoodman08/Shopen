<?php

/** @var $products_new array */
?>



<?php foreach ($products_new as $product): ?>
    <div class="item">
        <div class="image-container">
            <a class="item-img-wrapper-link" href="product/<?= $product['slug'] ?>">
                <img class="img-fluid" src="<?= PATH . $product['img'] ?>" alt="Product" style="height: 250px">
            </a>
            <div class="item-action-behaviors">
                <?php if (in_array($product['id'], \fcs\App::$app->getProperty('wishlist'))): ?>
                    <a class="item-addwishlist-delete" href="wishlist/delete?id=<?= $product['id'] ?>" data-id="<?= $product['id'] ?>"><i class="far fa-heart"></i></a>
                <?php else: ?>
                    <a class="item-addwishlist" href="wishlist/add?id=<?= $product['id'] ?>" data-id="<?= $product['id'] ?>">Add to Wishlist</a>
                <?php endif; ?>
                <a class="add-to-cart" href="cart/add?id=<?= $product['id'] ?>" data-id="<?= $product['id'] ?>"><i class="ion ion-md-basket" style="background-color: white; width: 50px; height: 50px;"></i></a>


            </div>
        </div>
        <div class="item-content">
            <div class="what-product-is">

                <h6 class="item-title">
                    <a href="product/<?= $product['slug'] ?>"><?= $product['title'] ?>

                    </a>
                </h6>

            </div>
            <div class="price-template">
                <div class="item-new-price">
                    ₽<?= $product['price'] ?>
                </div>
                <div class="item-old-price">
                    <?php if($product['old_price']): ?>
                        ₽<?= $product['old_price'] ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="tag sale">
            <span>НОВЫЕ</span>
        </div>
    </div>
<?php endforeach; ?>
