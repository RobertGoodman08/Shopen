

<?php if (!empty($_SESSION['cart'])): ?>
    <ul class="mini-cart-list">
        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <li class="clearfix">
                <a href="product/<?= $item['slug'] ?>">
                    <img src="<?= PATH . $item['img'] ?>" alt="Product">
                    <span class="mini-item-name"><?= $item['title'] ?></span>
                    <span class="mini-item-price">$<?= $item['price'] ?></span>
                    <span class="mini-item-quantity"> x <?= $item['qty'] ?></span>
                    <span class="mini-item-delete"><a href="cart/delete?id=<?= $id ?>" data-id="<?= $id ?>" class="del-item"><i class="fas fa-trash" style="right: 10%"></i></a></span>
                </a>
            </li>
        <?php endforeach; ?>
        <li class="clearfix">
            <p class="cart-qty"><?php __('tpl_cart_total_qty') ?> <?= $_SESSION['cart.qty'] ?></p>
        </li>

    </ul>
<?php else: ?>
    <h1>Пуста</h1>
<?php endif; ?>
<div class="mini-shop-total clearfix">
    <span class="mini-total-heading float-left"><?php __('tpl_cart_sum') ?></span>
    <span class="mini-total-price float-right">$<?= $_SESSION['cart.sum'] ?></span>
</div>
<div class="mini-action-anchors">

    <?php if (!empty($_SESSION['cart'])): ?>
        <a href="cart/view" class="checkout-anchor"><?php __('tpl_cart_btn_order') ?></a>
    <?php endif; ?>
</div>
</div>

