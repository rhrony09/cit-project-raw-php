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
        <span class="breadcrumb-item active">Add Skill</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Add Skill</h5>
                    </div>
                    <div class="card-body">
                        <form action="skill_add_process.php" method="POST">
                            <div class="row form-group">
                                <div class="col-lg-10">
                                    <label for="technology">Technology</label>
                                    <input type="text" class="form-control" id="technology" name="technology" value="<?= show_session_data('technology') ?>">
                                </div>
                                <div class="col-lg-2">
                                    <label for="percentage">Percentage</label>
                                    <input type="number" class="form-control" id="percentage" name="percentage" value="<?= show_session_data('percentage') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="<?= show_session_data('description') ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm" name="add">Add Skill</button>
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