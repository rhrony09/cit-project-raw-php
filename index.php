<?php
session_start();
require_once('assets/db.php');
//banner content
$sql_banner_content = "SELECT * FROM banner_contents WHERE status = 1";
$query_banner_content = mysqli_query($conn, $sql_banner_content);
$banner_content = mysqli_fetch_assoc($query_banner_content);
//banner image
$sql_banner_image = "SELECT * FROM banner_image WHERE status = 1";
$query_banner_image = mysqli_query($conn, $sql_banner_image);
$banner_image = mysqli_fetch_assoc($query_banner_image);
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
//about content
$sql_about_content = "SELECT * FROM about_contents";
$query_about_content = mysqli_query($conn, $sql_about_content);
$about_content = mysqli_fetch_assoc($query_about_content);
//about image
$sql_about_image = "SELECT * FROM about_image WHERE status = 1";
$query_about_image = mysqli_query($conn, $sql_about_image);
$about_image = mysqli_fetch_assoc($query_about_image);
//skills
$sql_skill = "SELECT * FROM skills WHERE status = 1";
$query_skill = mysqli_query($conn, $sql_skill);
//services
$sql_service = "SELECT * FROM services WHERE status = 1";
$query_service = mysqli_query($conn, $sql_service);
//counters
$sql_counter = "SELECT * FROM counters WHERE status = 1";
$query_counter = mysqli_query($conn, $sql_counter);
//logo
$sql_client = "SELECT * FROM clients WHERE status = 1";
$query_clients = mysqli_query($conn, $sql_client);
//testimonial
$sql_testimonial = "SELECT * FROM testimonials WHERE status = 1";
$query_testimonial = mysqli_query($conn, $sql_testimonial);
//portfolios
$sql_portfolio = "SELECT * FROM portfolios WHERE status = 1 ORDER BY title ASC";
$query_portfolio = mysqli_query($conn, $sql_portfolio);
//site setting
$sql_site_setting = "SELECT * FROM site_setting";
$query_site_setting = mysqli_query($conn, $sql_site_setting);
$setting = mysqli_fetch_assoc($query_site_setting);
require_once('includes/header.php');
?>
<!-- main-area -->
<main>
    <!-- banner-area -->
    <section id="home" class="banner-area banner-bg fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="banner-content">
                        <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?= $banner_content['sub_title'] ?></h6>
                        <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?= $banner_content['title'] ?></h2>
                        <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $banner_content['description'] ?></p>
                        <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                            <ul>
                                <?php foreach ($social_medias as $social_media) : ?>
                                    <li><a href="<?= $social_media['link'] ?>"><i class="<?= $social_media['platform'] ?>"></i></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                    <div class="banner-img text-right">
                        <img style="width: 520px" src="assets/frontend/img/banner/<?= $banner_image['image'] ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-shape"><img src="assets/frontend/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
    </section>
    <!-- banner-area-end -->

    <!-- about-area-->
    <section id="about" class="about-area primary-bg pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img class="image-fluid w-75" src="assets/frontend/img/about/<?= $about_image['image'] ?>" alt="me-01">
                    </div>
                </div>
                <div class="col-lg-6 pr-90">
                    <div class="section-title mb-25">
                        <span><?= $about_content['sub_title'] ?></span>
                        <h2><?= $about_content['title'] ?></h2>
                    </div>
                    <div class="about-content">
                        <p><?= $about_content['description'] ?></p>
                        <h3>Skills:</h3>
                    </div>
                    <!-- Education Item -->
                    <?php foreach ($query_skill as $skill) : ?>
                        <div class="education">
                            <div class="year"><?= $skill['technology'] ?></div>
                            <div class="line"></div>
                            <div class="location">
                                <span><?= $skill['description'] ?></span>
                                <div class="progressWrapper">
                                    <div class="progress">
                                        <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $skill['percentage'] ?>%;" aria-valuenow="<?= $skill['percentage'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <!-- End Education Item -->
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- Services-area -->
    <section id="service" class="services-area pt-120 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span>WHAT WE DO</span>
                        <h2>Services and Solutions</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($query_service as $service) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                            <i class="<?= $service['icon'] ?>"></i>
                            <h3><?= $service['title'] ?></h3>
                            <p><?= $service['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- Services-area-end -->

    <!-- Portfolios-area -->
    <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span>Portfolio Showcase</span>
                        <h2>My Recent Best Works</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($query_portfolio as $portfolio) : ?>
                    <div class="col-lg-4 col-md-6 pitem">
                        <div class="speaker-box">
                            <div class="speaker-thumb">
                                <img class="portfolio-img" src="assets/frontend/img/portfolio/<?= $portfolio['image'] ?>" alt="img">
                            </div>
                            <div class="speaker-overlay">
                                <span><?= $portfolio['category'] ?></span>
                                <h4><a href="portfolio-single.php?id=<?= $portfolio['id'] ?>"><?= $portfolio['title'] ?></a></h4>
                                <a href="portfolio-single.php?id=<?= $portfolio['id'] ?>" class="arrow-btn">More information <span></span></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- services-area-end -->


    <!-- fact-area -->
    <section class="fact-area">
        <div class="container">
            <div class="fact-wrap">
                <div class="row justify-content-between">
                    <?php foreach ($query_counter as $counter) : ?>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="<?= $counter['icon'] ?>"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count"><?= $counter['amount'] ?></span></h2>
                                    <span><?= $counter['title'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-area-end -->

    <!-- testimonial-area -->
    <section class="testimonial-area primary-bg pt-115 pb-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-70">
                        <span>testimonial</span>
                        <h2>happy customer quotes</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="testimonial-active">
                        <?php foreach ($query_testimonial as $testimonial) : ?>
                            <div class="single-testimonial text-center">
                                <div class="testi-avatar">
                                    <img src="assets/frontend/img/testimonial/<?= $testimonial['image'] ?>" alt="img">
                                </div>
                                <div class="testi-content">
                                    <h4><span>“</span> <?= $testimonial['content'] ?><span>”</span></h4>
                                    <div class="testi-avatar-info">
                                        <h5><?= $testimonial['name'] ?></h5>
                                        <span><?= $testimonial['designation'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-area-end -->

    <!-- brand-area -->
    <div class="barnd-area pt-100 pb-100">
        <div class="container">
            <div class="row brand-active">
                <?php foreach ($query_clients as $client) : ?>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="assets/frontend/img/client/<?= $client['image'] ?>" alt="img">
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->

    <!-- contact-area -->
    <section id="contact" class="contact-area primary-bg pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section-title mb-20">
                        <span>information</span>
                        <h2>Contact Information</h2>
                    </div>
                    <div class="contact-content">
                        <h5>OFFICE IN <span>DHAKA</span></h5>
                        <div class="contact-list">
                            <ul>
                                <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $contact_info['address'] ?></li>
                                <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $contact_info['phone'] ?></li>
                                <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $contact_info['email'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form action="backend/message/message_post.php" method="POST">
                            <input type="text" name="name" placeholder="your name *" value="<?= show_session_data('name') ?>" required>
                            <input type="email" name="email" placeholder="your email *" value="<?= show_session_data('email') ?>" required>
                            <textarea name="message" name="message" id="message" placeholder="your message *" required><?= show_session_data('message') ?></textarea>
                            <button type="submit" name="send" class="btn">SEND Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>
<!-- main-area-end -->
<?php require_once('includes/footer.php') ?>