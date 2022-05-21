<?php

    use app\controllers\admin\MainController;

    /** @var $orders MainController */
    /** @var $new_orders MainController */
    /** @var $users MainController */
    /** @var $products MainController */
?>

<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $orders ?></h3>
                            <p>Заказов</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <a href="<?= ADMIN ?>/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $new_orders ?></h3>
                            <p>Новых заказов</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-luggage-cart"></i>
                        </div>
                        <a href="<?= ADMIN ?>/order?status=new" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $users ?></h3>
                            <p>Пользователей</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="<?= ADMIN ?>/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $products ?></h3>
                            <p>Товаров</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <a href="<?= ADMIN ?>/product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </div>
</div>
<!-- /.card -->

