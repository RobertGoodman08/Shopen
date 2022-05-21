<!-- Default box -->
<div class="card">

    <div class="card-body">


        <div class="table-responsive">

            <table class="table text-start table-bordered">


                <thead>
                    <tr>
                        <th scope="col">Наименование</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Кол-во</th>
                        <th scope="col">Сумма</th>
                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($order as $item): ?>
                        <tr>
                            <td><a href="product/<?= $item['slug'] ?>"><?= $item['title'] ?></a></td>
                            <td><?= $item['price'] ?></td>
                            <td><?= $item['qty'] ?></td>
                            <td><?= $item['sum'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>

        <div class="box">
            <h3 class="box-title">Детали заказа</h3>
            <div class="box-content">
                <div class="table-responsive">
                    <table class="table text-start table-striped">
                        <tr>
                            <td>Номера заказа</td>
                            <td><?= $order[0]['order_id'] ?></td>
                        </tr>
                        <tr>
                            <td>Статус</td>
                            <td><?= $order[0]['status'] ? 'Завершен' : 'Новый' ?></td>
                        </tr>
                        <tr>
                            <td>Создан</td>
                            <td><?= $order[0]['created_at'] ?></td>
                        </tr>
                        <tr>
                            <td>Обновлен</td>
                            <td><?= $order[0]['updated_at'] ?></td>
                        </tr>
                        <tr>
                            <td>Итоговая сумма</td>
                            <td><?= $order[0]['total'] ?></td>
                        </tr>
                        <tr>
                            <td>Примечание</td>
                            <td><?= $order[0]['note'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>



        <?php if($order[0]['status']): ?>


            <a href="<?= ADMIN ?>/order/edit?id=<?= $order[0]['order_id'] ?>&status=0" class="btn btn-success btn-flat"> Изменить статус на Новый </a>



        <?php else: ?>

            <a href="<?= ADMIN ?>/order/edit?id=<?= $order[0]['order_id'] ?>&status=1" class="btn btn-success btn-flat"> Изменить статус на Завершен </a>

        <?php endif; ?>

    </div>

</div>
<!-- /.card -->

