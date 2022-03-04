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
        <span class="breadcrumb-item active">Add Logo</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Logo</h5>
                    </div>
                    <div class="card-body">
                        <form action="logo_add_process.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control-file" id="logo" name="logo" accept="image/png">
                                <span class="tx-12">Logo size must be under 500kb. Allowed format .png only</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-2">
                                    <label for="accent">Logo Accent</label>
                                    <select class="form-control" id="accent" name="accent">
                                        <option value="light">Light</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Logo</button>
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