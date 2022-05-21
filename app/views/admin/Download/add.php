<!-- Default box -->
<div class="card">

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">



                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <?php foreach (\fcs\App::$app->getProperty('languages') as $k => $lang): ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($lang['base']) echo 'active' ?>" data-toggle="pill" href="#<?= $k ?>">
                                    <img src="<?= PATH ?>/assets/img/lang/<?= $k ?>.png" alt="">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>


            <div class="card-body">
                <div class="tab-content">
                    <?php foreach (\fcs\App::$app->getProperty('languages') as $k => $lang): ?>
                        <div class="tab-pane fade <?php if($lang['base']) echo 'active show' ?>" id="<?= $k ?>">

                            <div class="form-group">

                                <label for="title" class="required">

                                    <img src="<?= PATH ?>/assets/img/lang/<?= $k ?>.png" alt="">
                                    Наименования
                                </label>
                                <input type="text" name="download_description[<?= $lang['id'] ?>][name]" class="form-control" id="name"
                                       placeholder="Наименования файла" >

                            </div>





                        </div>
                    <?php endforeach; ?>
                    <hr>

                        <div class="form-group">
                            <label for="exampleInputFile">Допустимые для загрузки расширения: jpg, jpeg, png, zip, pdf, txt</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="filename">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>


            <!-- /.card -->
    </div>



    </form>

    <?php
        if (isset($_SESSION['form_data'])) {
            unset($_SESSION['form_data']);
        }
    ?>

</div>




   <script src="../../../../public/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
   <script src="../../../../public/adminlte/main.js"></script>


</div>
<!-- /.card -->
