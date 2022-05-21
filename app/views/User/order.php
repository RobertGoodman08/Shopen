<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2">
            <li class="breadcrumb-item"><a href="./"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href="user/cabinet"><?php __('tpl_cabinet'); ?></a></li>
            <li class="breadcrumb-item"><a href="user/orders"><?php __('user_order_list'); ?></a></li>
            <li class="breadcrumb-item active"><?php __('user_order_title'); ?></li>
        </ol>
    </nav>
</div>

<div class="container py-3">
    <div class="row">

        <div class="col-12">
            <h1 class="section-title"><?php __('user_order_title'); ?></h1>
        </div>

        <?php $this->getPart('parts/cabinet_sidebar'); ?>

        <div class="col-md-9 order-md-1">

            <?php if (!empty($order)): ?>
                <div class="table-responsive">
                    <table class="table text-start table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?php __('user_order_product_title'); ?></th>
                            <th scope="col"><?php __('user_order_product_price'); ?></th>
                            <th scope="col"><?php __('user_order_product_qty'); ?></th>
                            <th scope="col"><?php __('user_order_product_sum'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($order as $item): ?>
                            <tr>
                                <td><a href="product/<?= $item['slug'] ?>"><?= $item['title'] ?></a></td>
                                <td>$<?= $item['price'] ?></td>
                                <td><?= $item['qty'] ?></td>
                                <td>$<?= $item['sum'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="box">
                    <h3 class="box-title"><?php __('user_order_details'); ?></h3>
                    <div class="box-content">
                        <div class="table-responsive">
                            <table class="table text-start table-striped">
                                <tr>
                                    <td><?php __('user_order_num'); ?></td>
                                    <td><?= $order[0]['order_id'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php __('user_order_status'); ?></td>
                                    <td><?php __("user_order_status_{$order[0]['status']}"); ?></td>
                                </tr>
                                <tr>
                                    <td><?php __('user_order_created'); ?></td>
                                    <td><?= $order[0]['created_at'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php __('user_order_updated'); ?></td>
                                    <td><?= $order[0]['updated_at'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php __('user_order_total'); ?></td>
                                    <td>$<?= $order[0]['total'] ?></td>
                                </tr>
                                <tr>
                                    <td><?php __('user_order_note'); ?></td>
                                    <td><?= $order[0]['note'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>


            <?php endif; ?>

        </div>
    </div>
</div>

