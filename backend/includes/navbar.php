<?php
$message_sql = "SELECT * FROM messages WHERE read_status = 0";
$message_query = mysqli_query($conn, $message_sql);
?>

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <div class="admin-name">
                        <span class="logged-name"><?= $admin['name']; ?><span class="admin-role"><?= print_admin_role(); ?></span></span>
                        <img src="<?= url() ?>assets/dashboard/images/profile_pictures/<?= $admin['profile_pic'] ?>" class="wd-32 rounded-circle" alt="">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="<?= url() ?>backend/user_update.php?id=<?= $admin['id'] ?>"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="<?= url() ?>logout.php"><i class="icon ion-power"></i> Logout</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-bell-outline"></i>
                <!-- start: if statement -->
                <?php if (mysqli_num_rows($message_query) > 0) : ?>
                    <span class="square-8 bg-danger"></span>
                <?php endif; ?>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->

<!-- ########## START: RIGHT PANEL ########## -->
<div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#messages">Unread Messages (<?= mysqli_num_rows($message_query) ?>)</a>
        </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <?php foreach ($message_query as $message) : ?>
                    <a href="" class="media-list-link">
                        <div class="media">
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13"><?= $message['name'] ?></p>
                                <span class="d-block tx-11 tx-gray-500"><?= date('h:i:s A | d F Y', strtotime($message['time'])) ?></span>
                                <p class="tx-13 mg-t-10 mg-b-0"><?= substr($message['message'], 0, 60) . '...' ?></p>
                            </div>
                        </div><!-- media -->
                    </a>
                <?php endforeach; ?>
                <!-- loop ends here -->
            </div><!-- media-list -->
            <?php if (mysqli_num_rows($message_query) > 0) : ?>
                <div class="pd-15">
                    <a href="<?= url() ?>backend/message/messages.php" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View All Messages</a>
                </div>
            <?php endif; ?>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                <a href="" class="media-list-link read">
                    <div class="media pd-x-20 pd-y-15">
                        <img src="<?= url() ?>assets/dashboard/img/img8.jpg" class="wd-40 rounded-circle" alt="">
                        <div class="media-body">
                            <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                            <span class="tx-12">October 03, 2017 8:45am</span>
                        </div>
                    </div><!-- media -->
                </a>
                <!-- loop ends here -->
            </div><!-- media-list -->
        </div><!-- #notifications -->

    </div><!-- tab-content -->
</div><!-- sl-sideright -->
<!-- ########## END: RIGHT PANEL ########## --->