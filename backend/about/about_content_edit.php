<?php
require_once('../../assets/session.php');
if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'Please select the contact details first.';
    die(header('location: about_content_view.php'));
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM about_contents WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $about_content = mysqli_fetch_assoc($query);
}
require_once('../includes/header.php');
require_once('../includes/sidebar.php');
require_once('../includes/navbar.php');
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Edit About Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Edit About Content</h5>
                    </div>
                    <div class="card-body">
                        <form action="about_content_edit_process.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <div class="form-group">
                                <label for="sub_title">Subtitle</label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?= $about_content['sub_title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $about_content['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"><?= $about_content['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Content</button>
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