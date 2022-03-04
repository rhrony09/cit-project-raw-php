<?php
require_once('../../assets/session.php');
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Add Client</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Client</h5>
                    </div>
                    <div class="card-body">
                        <form action="client_add_process.php" method="POST" enctype="multipart/form-data">
                            <img class="img-preview" id="img_preview" src="">
                            <div class="form-group">
                                <label for="image">Client</label>
                                <input type="file" class="form-control-file" id="image" name="image" accept="image/png" onchange="document.getElementById('img_preview').src = window.URL.createObjectURL(this.files[0])">
                                <span class="tx-12">Logo size must be under 500kb. Allowed format: jpg, jpeg, png & gif</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Client</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php require_once('../includes/footer.php') ?>