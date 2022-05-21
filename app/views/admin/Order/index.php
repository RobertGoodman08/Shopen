<!-- Default box -->
<div class="card">



    <div class="card-body">

        <div class="table-responsive">
            <?php if(!empty($orders)): ?>

                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID заказа</th>
                            <th>Статус</th>
                            <th>Создан</th>
                            <th>Изменен</th>
                            <th>Сумма</th>
                            <td width="50"><i class="fas fa-pencil-alt"></i></td>


                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['status'] ? 'Завершен' : 'Новый' ?></td>
                                <td><?= $order['created_at'] ?></td>
                                <td><?= $order['updated_at'] ?> </td>
                                <td><?= $order['total'] ?></td>
                                <td width="50">
                                    <a href="<?= ADMIN ?>/order/edit?id=<?= $order['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <? endforeach; ?>
                        </tbody>
                    </table>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <p><?= count($orders) ?> товар(ов) из: <?= $total ?></p>
                        <?php if($pagination->countPages > 1): ?>
                            <?= $pagination; ?>
                        <?php endif; ?>
                    </div>
                </div>

            <?php else: ?>
                <p>Заказов не найдено....</p>

            <?php endif; ?>
        </div>

    </div>
</div>
<!-- /.card -->

