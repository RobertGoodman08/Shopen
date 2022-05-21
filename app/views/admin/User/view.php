<div class="card">



    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered">

                <tbody>

                    <tr>
                        <td>ID</td>
                        <td><?= $user['id'] ?></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td><?= $user['email'] ?></td>
                    </tr>

                    <tr>
                        <td>Имя</td>
                        <td><?= $user['name'] ?></td>
                    </tr>

                    <tr>
                        <td>Роль</td>
                        <td><?= $user['role'] == 'user' ? 'Пользователь' : 'Администратор' ?></td>
                    </tr>

                    <tr>
                        <td>Адрес</td>
                        <td><?= $user['address'] ?></td>
                    </tr>

                </tbody>

            </table>
            <a href="<?= ADMIN ?>/user/edit?id=<?= $user['id'] ?>" class="btn btn-flat btn-secondary">
                Редактировать профиль
            </a>

        </div>

    </div>


    <div class="card-body">
        <?php if(!empty($orders)): ?>
            <h3>Заказы пользователя</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
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
                        <?php foreach ($orders as $order): ?>
                            <tr <?php if($order['status']) echo 'class="table-info"' ?>>

                                <td><?= $order['id'] ?></td>
                                <td><?= $order['status'] ?></td>
                                <td><?= $order['created_at'] ?></td>
                                <td><?= $order['updated_at'] ?></td>
                                <td><?= $order['total'] ?></td>
                                <td width="50">
                                    <a class="btn btn-info btn-sm" href="<?= ADMIN ?>/order/edit?id=<?= $order['id'] ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>

                            </tr>


                        <?php endforeach; ?>
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

        <?php endif; ?>
    </div>

</div>