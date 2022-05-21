<!-- Default box -->
<div class="card">

    <div class="card-header">
        <a href="<?= ADMIN ?>/download/add" class="btn btn-default btn-flat"><i class="fas fa-plus"></i>Загрузить файл</a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <?php if(!empty($downloads)): ?>

                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                            <th>Оригинальное имя</th>


                            <td width="50"><i class="far fa-trash-alt"></i></td>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($downloads as $download): ?>
                            <tr>
                                <td><?= $download['id'] ?></td>

                                <td><?= $download['filename'] ?></td>
                                <td><?= $download['original_name'] ?></td>


                                <td width="50">
                                    <a href="<?= ADMIN ?>/download/delete?id=<?= $download['id'] ?>" class="btn btn-info btn-sm">
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
                        <p><?= count($downloads) ?> товар(ов) из: <?= $total ?></p>
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

