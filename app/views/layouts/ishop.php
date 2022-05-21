<?php

    use fcs\View;

/** @var $this View */
?>

<?php $this->getPart('parts/header') ?>



<div class="container">
    <div class="row">
        <div class="col">
            <?php if (!empty($_SESSION['errors'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['errors']; unset($_SESSION['errors']); ?>

                </div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>






<?php echo $this->content ?>



<?php $this->getPart('parts/footer') ?>