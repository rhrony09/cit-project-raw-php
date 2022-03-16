<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href="<?= url(); ?>">RH Rony</a></div>
<div class="sl-sideleft">

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="<?= url() ?>backend/dashboard.php" class="sl-menu-link">
            <div class="sl-menu-item align-center">
                <i class="fas fa-home tx-18"></i>
                <span class="menu-item-label">Dashboard</span>
            </div>
        </a>
        <?php if ($admin['role'] >= 1) : ?>
            <!-- Start Banner Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="far fa-images tx-18"></i>
                    <span class="menu-item-label">Banner Section</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/banner/banner_content_add.php" class="nav-link">Add Banner Content</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/banner/banner_content_view.php" class="nav-link">View Banner Content</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/banner/banner_image_add.php" class="nav-link">Add Banner Image</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/banner/banner_image_view.php" class="nav-link">View Banner Image</a></li>
            </ul>
            <!-- End Banner Section -->
            <!-- Start Social Media -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-share-alt tx-18"></i>
                    <span class="menu-item-label">Social Media</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/social_media/social_media_add.php" class="nav-link">Add Social Media</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/social_media/social_media_view.php" class="nav-link">View Social Media</a></li>
            </ul>
            <!-- End Social Media -->
            <!-- Start Company Info -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="far fa-address-card tx-18"></i>
                    <span class="menu-item-label">Company Info</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/company_info/logo_add.php" class="nav-link">Add Logo</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/company_info/logo_view.php" class="nav-link">View Logo</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/company_info/contact_info_add.php" class="nav-link">Add Contact Info</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/company_info/contact_info_view.php" class="nav-link">View Contact Info</a></li>
            </ul>
            <!-- End Company Info -->
            <!-- Start About Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="far fa-question-circle tx-18"></i>
                    <span class="menu-item-label">About Section</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/about/about_content_add.php" class="nav-link">Add About Content</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/about/about_content_view.php" class="nav-link">View About Content</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/about/about_image_add.php" class="nav-link">Add About Image</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/about/about_image_view.php" class="nav-link">View About Image</a></li>
            </ul>
            <!-- End About Section -->
            <!-- Start Skill Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="far fa-lightbulb tx-18"></i>
                    <span class="menu-item-label">Skills</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/skills/skill_add.php" class="nav-link">Add Skill</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/skills/skill_view.php" class="nav-link">View Skill</a></li>
            </ul>
            <!-- End Skill Section -->
            <!-- Start Service Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-business-time tx-17"></i>
                    <span class="menu-item-label">Services</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/services/service_add.php" class="nav-link">Add Services</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/services/service_view.php" class="nav-link">View Services</a></li>
            </ul>
            <!-- End Service Section -->
            <!-- Start Counter Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-stopwatch-20 tx-18"></i>
                    <span class="menu-item-label">Fact Counter</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/counter/counter_add.php" class="nav-link">Add Counter</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/counter/counter_view.php" class="nav-link">View Counter</a></li>
            </ul>
            <!-- End Counter Section -->
            <!-- Start Counter Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-user-tie tx-18"></i>
                    <span class="menu-item-label">Clients</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/clients/client_add.php" class="nav-link">Add Clients</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/clients/client_view.php" class="nav-link">View Clients</a></li>
            </ul>
            <!-- End Counter Section -->
            <!-- Start Testimonials Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-mug-hot tx-18"></i>
                    <span class="menu-item-label">Testimonials</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/testimonial/testimonial_add.php" class="nav-link">Add Testimonial</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/testimonial/testimonial_view.php" class="nav-link">View Testimonial</a></li>
            </ul>
            <!-- End Testimonials Section -->
            <!-- Start Portfolio Section -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-project-diagram tx-18"></i>
                    <span class="menu-item-label">Portfolios</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/portfolio/portfolio_add.php" class="nav-link">Add Portfolio</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/portfolio/portfolio_view.php" class="nav-link">View Portfolio</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/portfolio/portfolio_category.php" class="nav-link">Portfolio Category</a></li>
            </ul>
            <!-- End Portfolio Section -->
            <!-- Start Message Section -->
            <a href="<?= url() ?>backend/message/messages.php" class="sl-menu-link">
                <div class="sl-menu-item align-center">
                    <i class="far fa-comment-alt tx-18"></i>
                    <span class="menu-item-label">Messages</span>
                </div>
            </a>
            <!-- End Message Section -->
            <!-- Start Site Setting Section -->
            <a href="<?= url() ?>backend/setting/site_setting.php" class="sl-menu-link">
                <div class="sl-menu-item align-center">
                    <i class="fas fa-cogs tx-18"></i>
                    <span class="menu-item-label">Site Setting</span>
                </div>
            </a>
            <!-- End Site Setting Section -->
            <!-- Start Admin Area -->
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fas fa-users tx-18"></i>
                    <span class="menu-item-label">Users</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div>
            </a>
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="<?= url() ?>backend/users.php" class="nav-link">Active Users</a></li>
                <li class="nav-item"><a href="<?= url() ?>backend/trash_users.php" class="nav-link">Trashed Users</a></li>
            </ul>
            <!-- End Admin Area -->
        <?php endif ?>
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->