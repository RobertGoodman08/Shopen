<?php /** @var $this \fcs\View */ ?>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active"><?php __('tpl_cart_title'); ?></li>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">

        <div class="col-lg-12 category-content">
            <h1 class="section-title"><?php __('tpl_cart_title'); ?></h1>

            <?php if (!empty($_SESSION['cart'])): ?>
                <div class="table-responsive cart-table">
                    <table class="table text-start">
                        <thead>
                        <tr>
                            <th scope="col"><?php __('tpl_cart_photo'); ?></th>
                            <th scope="col"><?php __('tpl_cart_product'); ?></th>
                            <th scope="col"><?php __('tpl_cart_qty'); ?></th>
                            <th scope="col"><?php __('tpl_cart_price'); ?></th>
                            <th scope="col"><i class="far fa-trash-alt"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($_SESSION['cart'] as $id => $item): ?>
                            <tr class="align-middle">
                                <td>
                                    <a href="product/<?= $item['slug'] ?>"><img src="<?= PATH . '/' . $item['img'] ?>"
                                                                                alt="" style="height: 150px; width: 150px"></a>
                                </td>
                                <td><a href="product/<?= $item['slug'] ?>"><?= $item['title'] ?></a></td>
                                <td><?= $item['qty'] ?></td>
                                <td>$<?= $item['price'] ?></td>
                                <td><a href="cart/delete?id=<?= $id ?>" data-id="<?= $id ?>" class="del-item"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="text-end"><?php __('tpl_cart_total_qty'); ?></td>
                            <td class="cart-qty-basket"><?= $_SESSION['cart.qty'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-end"><?php __('tpl_cart_sum'); ?></td>
                            <td class="cart-sum-basket">$<?= $_SESSION['cart.sum'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <form class="row g-3" method="post" action="cart/checkout">

                    <?php if (!isset($_SESSION['user'])): ?>
                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="<?= get_field_value('email') ?>">
                                <label class="required" for="email"><?php __('cart_view_email_input'); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?= get_field_value('password') ?>">
                                <label class="required" for="password"><?php __('cart_view_password_input'); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= get_field_value('name') ?>">
                                <label class="required" for="name"><?php __('cart_view_name_input'); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating mb-3">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?= get_field_value('address') ?>">
                                <label class="required" for="address"><?php __('cart_view_address_input'); ?></label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-6 offset-md-3">
                        <div class="form-floating mb-3">
                            <textarea name="note" class="form-control" placeholder="Leave a comment here" id="note" style="height: 100px"><?= get_field_value('note') ?></textarea>
                            <label for="note"><?php __('cart_view_note_input'); ?></label>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-danger"><?php __('cart_view_order_btn'); ?></button>
                    </div>
                </form>

                <?php
                if (isset($_SESSION['form_data'])) {
                    unset($_SESSION['form_data']);
                }
                ?>

            <?php else: ?>
                <h4 class="text-start"><?php __('tpl_cart_empty'); ?></h4>
            <?php endif; ?>

        </div>

    </div>
</div>

