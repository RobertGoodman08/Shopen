<!-- Default box -->
<div class="card">

    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label class="required" for="parent_id">Категория</label>
                <?php new \app\widgets\menu\Menu([
                    'cache' => 0,
                    'cacheKey' => 'admin_menu_select',
                    'class' => 'form-control',
                    'container' => 'select',
                    'attrs' => [
                        'name' => 'parent_id',
                        'id' => 'parent_id',
                        'required' => 'required',
                    ],

                    'tpl' => APP . '/widgets/menu/admin_select_tpl.php',
                ]) ?>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price" class="required">Цена</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Цена"  value="<?= get_field_value('price') ?: 0  ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="old_price" class="required">Старая цена</label>
                        <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Цена"  value="<?= get_field_value('old_price') ?: 0  ?>">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
                    <label for="status" class="custom-control-label">Показывать на сайте</label>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="hit" name="hit" checked>
                    <label for="hit" class="custom-control-label">Хит</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="is_download">Прикрепите загружаемый файл, чтобы товар стал цифровым</label>
                        <select name="is_download" id="is_download" class="form-control select2 is-download" style="width: 100%;"></select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Основное фото</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-base-img" onclick="popupBaseImage(); return false;">Загрузить</button>
                            <div id="base-img-output" class="upload-images base-image"></div>
                        </div>

                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Дополнительные фото</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-gallery-img" onclick="popupGalleryImage(); return false;">Загрузить</button>
                            <div id="gallery-img-output" class="upload-images gallery-image"></div>
                        </div>

                    </div>
                </div>
            </div>






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

                                <label for="title" class="required">Наименования</label>
                                <input type="text" name="product_description[<?= $lang['id'] ?>][title]" class="form-control" id="title"
                                       placeholder="Наименования товара"  value="<?= get_field_array_value('product_description', $lang['id'], 'title') ?>">

                            </div>


                            <div class="form-group">
                                <label for="description">Мета-описание</label>
                                <input type="text" name="product_description[<?= $lang['id'] ?>][description]" class="form-control" id="content" placeholder="Мета-описание" value="<?= get_field_array_value('product_description', $lang['id'], 'description') ?>">
                            </div>

                            <div class="form-group">
                                <label for="exerpt">Краткое описание</label>
                                <input type="text" name="product_description[<?= $lang['id'] ?>][exerpt]" class="form-control" id="exerpt" placeholder="Ключевые слова" value="<?= get_field_array_value('product_description', $lang['id'], 'exerpt') ?>">
                            </div>

                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="product_description[<?= $lang['id'] ?>][keywords]" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?= get_field_array_value('product_description', $lang['id'], 'keywords') ?>">
                            </div>

                            <div class="form-group">
                                <label for="content">Описание категории</label>
                                <textarea name="product_description[<?= $lang['id'] ?>][content]" class="form-control editor" id="content" rows="3" placeholder="Описание категории"><?= get_field_array_value('product_description', $lang['id'], 'content') ?></textarea>
                            </div>

                        </div>
                    <?php endforeach; ?>
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

</div>
<!-- /.card -->

<script>
    function popupBaseImage(  ) {
        CKFinder.popup( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    const baseImgOutput = document.getElementById('base-img-output');
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><<img src="' + file.getUrl() + '" > <input type="hidden" name="img" value="' + file.getUrl() +'">' +
                        ' <button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>';
                } );


                finder.on( 'file:choose:resizedImage', function( evt ) {
                    const baseImgOutput = document.getElementById('base-img-output');
                    baseImgOutput.innerHTML = '<div class="product-img-upload"><img src="' + evt.data.resizedUrl + '"><input type="hidden" name="img" value="' + evt.data.resizedUrl + '"> ' +
                        '<button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div>'
                } );
            }
        } );
    }

</script>

<script>
    function popupGalleryImage(  ) {
        CKFinder.popup( {
            chooseFiles: true,

            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    const galleryImageOutput = document.getElementById('gallery-img-output');

                    if(galleryImageOutput.innerHTML){
                        galleryImageOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"> ' +
                            '<input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div> ';
                    } else {
                        galleryImageOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"> <input type="hidden" name="gallery[]" value="' + file.getUrl() + '">' +
                            '<button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div> '
                    }


                } );





                finder.on( 'file:choose:resizedImage', function( evt ) {
                    const baseImgOutput  = document.getElementById('base-img-output');

                    if(galleryImageOutput.innerHTML){
                        galleryImageOutput.innerHTML += '<div class="product-img-upload"><img src="' + file.getUrl() + '"> ' +
                            '<input type="hidden" name="gallery[]" value="' + file.getUrl() + '"><button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div> ';
                    } else {
                        galleryImageOutput.innerHTML = '<div class="product-img-upload"><img src="' + file.getUrl() + '"> <input type="hidden" name="gallery[]" value="' + file.getUrl() + '">' +
                            '<button class="del-img btn btn-app bg-danger"><i class="far fa-trash-alt"></i></button></div> '
                    }
                } );
            }
        } );
    }

</script>