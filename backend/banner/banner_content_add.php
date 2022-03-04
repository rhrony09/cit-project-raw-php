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
        <span class="breadcrumb-item active">Add Banner Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Banner Content</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_content_add_process.php" method="POST">
                            <div class="form-group">
                                <label for="sub_title">Subtitle</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?= show_session_data('sub_title') ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= show_session_data('title') ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="<?= show_session_data('description') ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Content</button>
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