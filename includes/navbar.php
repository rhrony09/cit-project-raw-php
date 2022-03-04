<!-- header-start -->
<header>
    <div id="header-sticky" class="transparent-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="main-menu">
                        <nav class="navbar navbar-expand-lg">
                            <a href="index.php" class="navbar-brand logo-sticky-none"><img style="max-height: 40px;" src="assets/frontend/img/logo/<?= $light_logo['logo'] ?>" alt="Logo"></a>
                            <a href="index.php" class="navbar-brand s-logo-none"><img style="max-height: 40px;" src="assets/frontend/img/logo/<?= $dark_logo['logo'] ?>" alt="Logo"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                </ul>
                            </div>
                            <div class="header-btn">
                                <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas-start -->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <div class="logo-side mb-30">
            <a href="index-2.html">
                <img width="150px" src="assets/frontend/img/logo/<?= $light_logo['logo'] ?>" alt="" />
            </a>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p><?= $contact_info['address'] ?></p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p><?= $contact_info['phone'] ?></p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p><?= $contact_info['email'] ?></p>
            </div>
        </div>
        <div class="social-icon-right mt-20">
            <?php foreach ($social_medias as $social_media) : ?>
                <a href="<?= $social_media['link'] ?>"><i class="<?= $social_media['platform'] ?>"></i></a>
            <?php endforeach ?>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->
</header>
<!-- header-end -->