<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM site_setting";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">Site Setting</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Site Setting</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Icon</th>
                                    <th class="text-center">Site Name</th>
                                    <th class="text-center">Site Tagline</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $setting) : ?>
                                    <tr>
                                        <td><?= ++$key ?></td>
                                        <td><img style="max-width: 40px;" src="<?= url() ?>assets/dashboard/images/site/<?= $setting['icon'] ?>" alt="site icon"></td>
                                        <td><?= $setting['name'] ?></td>
                                        <td><?= $setting['tagline'] ?></td>
                                        <td>
                                            <?php if ($admin['role'] >= 2) : ?>
                                                <a href="site_setting_edit.php" class=" btn btn-primary btn-sm" data-id="<?= $portfolio['id'] ?>">Edit</a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($query) == 0) : ?>
                                    <tr>
                                        <td class="text-center" colspan="7">No data found</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                        <?php if (mysqli_num_rows($query) == 0) : ?>
                            <a href="site_setting_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add Site Setting</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require_once("../includes/footer.php"); ?>