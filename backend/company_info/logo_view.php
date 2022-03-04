<?php
require_once("../../assets/session.php");
$light_sql = "SELECT * FROM logo WHERE accent = 'light'";
$light_query = mysqli_query($conn, $light_sql);
$dark_sql = "SELECT * FROM logo WHERE accent = 'dark'";
$dark_query = mysqli_query($conn, $dark_sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Banner Image</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Light Logo</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($light_query as $key => $light_logo) : ?>
                                    <tr class="bg-secondary">
                                        <td><img style="max-height: 35px;" src="../../assets/frontend/img/logo/<?= $light_logo['logo'] ?>" alt="banner image"></td>
                                        <td>
                                            <a href="logo-edit.php?id=<?= $light_logo['id'] ?>" class="btn btn-info btn-sm">Edit</a>
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
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">Dark Logo</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="bg-info">
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dark_query as $key => $dark_logo) : ?>
                                    <tr>
                                        <td><img style="max-height: 35px;" src="../../assets/frontend/img/logo/<?= $dark_logo['logo'] ?>" alt="banner image"></td>
                                        <td>
                                            <a href="logo-edit.php?id=<?= $dark_logo['id'] ?>" class="btn btn-info btn-sm">Edit</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php require_once("../includes/footer.php"); ?>

<script>
    $('.delete').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "This image will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'banner_image_delete.php?id=' + id;
            }
        })
    });
</script>