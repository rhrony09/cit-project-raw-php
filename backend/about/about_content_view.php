<?php
require_once("../../assets/session.php");
$sql = "SELECT * FROM about_contents";
$query = mysqli_query($conn, $sql);
require_once("../includes/header.php");
require_once("../includes/sidebar.php");
require_once("../includes/navbar.php");
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="<?= url() ?>backend/dashboard.php">Dashboard</a>
        <span class="breadcrumb-item active">View About Content</span>
    </nav>

    <div class="sl-pagebody">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="m-0 text-center">View About Content</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered align-middle">
                            <thead class="bg-info">
                                <tr>
                                    <th width="18%" class="text-center">Subtitle</th>
                                    <th width="25%" class="text-center">Title</th>
                                    <th class="text-center">Description</th>
                                    <th width="12%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $key => $content) : ?>
                                    <tr>
                                        <td class="text-center"><?= $content['sub_title'] ?></td>
                                        <td class="text-center"><?= $content['title'] ?></td>
                                        <td><?= substr($content['description'], 0, 100) . '...' ?></td>
                                        <td class="text-center">
                                            <a href="about_content_edit.php?id=<?= $content['id'] ?>" class="btn btn-info btn-sm">Edit</a>
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