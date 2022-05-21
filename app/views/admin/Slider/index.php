<!-- Default box -->
<div class="card">


    <div class="card-body">
        <form action="" method="post">


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Фото слайдера</h3>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success" id="add-gallery-img" onclick="popupGalleryImage(); return false;">Загрузить</button>
                            <div id="gallery-img-output" class="upload-images gallery-image">
                                <?php if(!empty($gallery)): ?>
                                    <?php foreach ($gallery as $item): ?>
                                        <br>
                                        <div class="product-img-upload">
                                            <img src="<?= $item ?>" alt="" style="height: 750px; width: 750px;">
                                            <input type="hidden" name="gallery[]" value="<?= $item ?>">
                                            <button class="del-img btn btn-app bg-danger">
                                                <i class="far fa-trash-alt"></i>
                                            </button>

                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>

        </form>
    </div>
</div>
<!-- /.card -->

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
