<!-- Default box -->
<div class="card">

    <div class="card-header">
        <a href="<?= ADMIN ?>/product/add" class="btn btn-default btn-flat"><i class="fas fa-plus"></i> Добавить товар</a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <?php if(!empty($products)): ?>

                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фото</th>
                                <th>Наименование</th>
                                <th>Цена</th>
                                <th>Статус</th>
                                <th>Цифровой товар</th>
                                <td width="50"><i class="fas fa-pencil-alt"></i></td>
                                <td width="50"><i class="far fa-trash-alt"></i></td>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($products as $product): ?>
                                <tr>
                                    <td><?= $product['id'] ?></td>
                                    <td>
                                        <img src="<?= PATH ?>/<?= $product['img'] ?>" alt="" height="80" width="80">
                                    </td>
                                    <td><?= $product['title'] ?></td>
                                    <td><?= $product['price'] ?></td>
                                    <td><?= $product['status'] ?> <i class="far fa-eye"></i> </td>
                                    <td><?= $product['is_download'] ?></td>
                                    <td width="50">
                                        <a href="<?= ADMIN ?>/product/edit?id=<?= $product['id'] ?>" class="btn btn-info btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                    <td width="50">
                                        <a href="<?= ADMIN ?>/product/delete?id=<?= $product['id'] ?>" class="btn btn-info btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p><?= count($products) ?> товар(ов) из: <?= $total ?></p>
                        <?php if($pagination->countPages > 1): ?>
                            <?= $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>

            <?php else: ?>
                <p>Товара не найденюю</p>

            <?php endif; ?>
        </div>

    </div>
</div>
<!-- /.card -->

