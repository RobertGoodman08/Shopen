<!-- Default box -->
<div class="card">

    <div class="card-header">
        <a href="<?= ADMIN ?>/user/add" class="btn btn-default btn-flat"><i class="fas fa-plus"></i> Добавить пользоватля</a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <?php if(!empty($users)): ?>

                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Имя</th>
                            <th>Роль</th>
                            <th>Адрес</th>
                            <td width="50"><i class="fas fa-eye"></i></td>
                            <td width="50"><i class="fas fa-pencil-alt"></i></td>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['email'] ?></td>

                                <td><?= $user['name'] ?></td>
                                <td><?= $user['role'] == 'user' ? 'Пользователь' : 'Администратор' ?></td>
                                <td><?= $user['address'] ?></td>
                                <td width="50">
                                    <a href="<?= ADMIN ?>/user/view?id=<?= $user['id'] ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td width="50">
                                    <a href="<?= ADMIN ?>/user/edit?id=<?= $user['id'] ?>" class="btn btn-info btn-sm">
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
                        <p><?= count($user) ?> товар(ов) из: <?= $total ?></p>
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

