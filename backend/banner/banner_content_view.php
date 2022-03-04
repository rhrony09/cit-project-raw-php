<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM banner_contents";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View Banner Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View Banner Content</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" class="text-center">Serial</th>
                                    <th width="12%" class="text-center">Subtitle</th>
                                    <th width="25%" class="text-center">Title</th>
                                    <th width="30%" class="text-center">Description</th>
                                    <th width="10%" class="text-center">Status</th>
                                    <th width="18%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $content) : ?>
                                    <tr>
                                        <td class="text-center"><?= ++$key ?></td>
                                        <td><?= $content['sub_title'] ?></td>
                                        <td><?= $content['title'] ?></td>
                                        <td><?= substr($content['description'], 0, 60) . '...' ?></td>
                                        <td class="text-center"><span class="btn btn-sm  <?= ($content['status'] == 1) ? 'btn-success' : 'btn-secondary' ?>"><?= ($content['status'] == 1) ? 'Activated' : 'Deactivated' ?></span></td>
                                        <td class="text-center">
                                            <?php if ($content['status'] == 0) : ?>
                                                <a href="banner_content_active.php?id=<?= $content['id'] ?>" class="btn btn-info btn-sm">Active This</a>
                                                <?php if ($admin['role'] >= 2) : ?>
                                                    <button class=" btn btn-danger btn-sm delete" data-id="<?= $content['id'] ?>">Delete</button>
                                                <?php endif ?>
                                            <?php else : ?>
                                                <span>- - -</span>
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
                        <a href="banner_content_add.php" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Content</a>
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
            text: "This content will be deleted permanently.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let id = $(this).attr('data-id');
                document.location.href = 'banner_content_delete.php?id=' + id;
            }
        })
    });
</script>