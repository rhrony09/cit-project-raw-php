<?php
require_once('../../assets/session.php');
if (!isset($_GET['id'])) {
    $_SESSION['error'] = "Please select a logo.";
    die(header("Location: logo_view.php"));
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM logo WHERE id=$id";
    $query = mysqli_query($conn, $sql);
    $logo = mysqli_fetch_assoc($query);
}

require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit Logo</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit Logo</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-4 p-4 mb-4 <?= ($logo['accent'] == 'light') ? 'bg-secondary' : 'bg-light' ?>">
                            <img style="max-height: 35px;" src="../../assets/frontend/img/logo/<?= $logo['logo'] ?>" alt="logo">
                        </div>
                        <form action="logo_edit_process.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control-file" id="logo" name="logo" accept="image/png">
                                <span class="tx-12">Please select a <?= ($logo['accent'] == 'light') ? 'light' : 'dark' ?> color logo.<br>Maximum Size: 500kb. Allowed format .png only</span>
                                <p class="text-danger tx-12"><?= show_session_data('picture_error') ?></p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Logo</button>
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