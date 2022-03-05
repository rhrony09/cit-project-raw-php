<?php
session_start();
require_once('assets/db.php');
//social media
$sql_social_media = "SELECT * FROM social_medias WHERE status = 1";
$social_medias = mysqli_query($conn, $sql_social_media);
//contact_info
$sql_contact_info = "SELECT * FROM contacts_info";
$query_contact_info = mysqli_query($conn, $sql_contact_info);
$contact_info = mysqli_fetch_assoc($query_contact_info);
//logo
$light_logo_sql = "SELECT * FROM logo WHERE accent = 'light'";
$light_logo_query = mysqli_query($conn, $light_logo_sql);
$light_logo = mysqli_fetch_assoc($light_logo_query);
$dark_logo_sql = "SELECT * FROM logo WHERE accent = 'dark'";
$dark_logo_query = mysqli_query($conn, $dark_logo_sql);
$dark_logo = mysqli_fetch_assoc($dark_logo_query);
//portfolios
$id = $_GET['id'];
$sql_portfolio = "SELECT * FROM portfolios LEFT JOIN users ON portfolios.user_id = users.id WHERE portfolios.id = $id";
$query_portfolio = mysqli_query($conn, $sql_portfolio);
$portfolio = mysqli_fetch_assoc($query_portfolio);
//site setting
$sql_site_setting = "SELECT * FROM site_setting";
$query_site_setting = mysqli_query($conn, $sql_site_setting);
$setting = mysqli_fetch_assoc($query_site_setting);

if (mysqli_num_rows($query_portfolio) <= 0) {
    $_SESSION['error'] = "Portfolio not found";
    die(header('location: index.php'));
}

require_once('includes/header.php');
?>

<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="breadcrumb-content text-center">
                        <h2>Portfolio: <?= $portfolio['title'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- portfolio-details-area -->
    <section class="portfolio-details-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="single-blog-list">
                        <div class="blog-list-thumb mb-35 text-center">
                            <img class="portfolio-featured" src="assets/frontend/img/portfolio/<?= $portfolio['image'] ?>" alt="img">
                        </div>
                        <div class="blog-list-content blog-details-content portfolio-details-content">
                            <h2><?= $portfolio['title'] ?></h2>
                            <p><?= $portfolio['desp'] ?></p>
                            <div class="blog-list-meta">
                                <ul>
                                    <li class="blog-post-date">
                                        <h3>Share On</h3>
                                    </li>
                                    <li class="blog-post-share">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= url() ?>portfolio-single.php?id=<?= $id ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://twitter.com/intent/tweet?url=<?= url() ?>portfolio-single.php?id=<?= $id ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="avatar-post mt-70 mb-60">
                            <ul>
                                <li>
                                    <div class="post-avatar-img">
                                        <img src="assets/dashboard/images/profile_pictures/<?= $portfolio['profile_pic'] ?>" alt="img">
                                    </div>
                                    <div class="post-avatar-content">
                                        <p>Added By:</p>
                                        <h5><?= $portfolio['name'] ?></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio-details-area-end -->

</main>
<!-- main-area-end -->
<?php require_once('includes/footer.php') ?>