<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="<?= get_assets_uri('libs/fontawesome/all.min.css') ?>"> -->
    <?php echo $styles; ?>

    <!-- include the required stylesheets -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= get_assets_uri('images/favicon.ico') ?>">
    <!-- Plugin css -->
    <link href="<?= get_assets_uri("libs/sweetalert2/sweetalert2.min.css") ?>" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="<?= get_assets_uri("css/admin/bootstrap.min.css") ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="<?= get_assets_uri("css/admin/icons.min.css") ?>" rel="stylesheet" type="text/css" id="icons">
    <link href="<?= get_assets_uri("css/admin/app.min.css") ?>" rel="stylesheet" type="text/css" id="app-stylesheet">
    <!-- <link href="assets\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="assets\css\icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet"> -->

    <!-- icon -->
    <!-- <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/0.1.2/css/themify-icons.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css" integrity="sha512-kDmbIQZ10fxeKP5NSt3+tz77HO42IJiS+YPIirOIKTdokl4LtuXYo3NNvq9mTAF+rzdV1plp0sm9E6nvtVpnFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>

<body class="<?php echo $body_classes; ?>" <?php if (isset($is_ie) && $is_ie) : ?> data-browser='ie' <?php endif; ?>>


    <!-- Begin page -->
    <div id="wrapper">

        <?php
        $user = $params["user_info"]['data'][0];
        // var_dump($user);
        // die;
        ?>


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <!-- language -->
                <li class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo (get_media_uri('flags/us.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="fas fa-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?php echo (get_media_uri('flags/spain.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?php echo (get_media_uri('flags/italy.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?php echo (get_media_uri('flags/french.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">French</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <img src="<?php echo (get_media_uri('flags/russia.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-bell noti-icon"></i>
                        <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="font-16 m-0">
                                <span class="float-right">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="slimscroll noti-scroll">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="fas fa-comment-account-outline"></i></div>
                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="fas fa-account-plus"></i></div>
                                <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="fas fa-heart"></i></div>
                                <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="fas fa-comment-account-outline"></i></div>
                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-primary text-center notify-item notify-all ">
                            View all
                            <i class="fi-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">


                        <img src="<?php echo (get_uploads_file("{$user->avatar}")); ?>" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <span style="display: none;" id="user_id"><?php echo $user->id ?></span>
                            <span style="display: none;" id="user_role_id"><?php echo $user->role_id ?></span>
                            <?php echo $user->first_name . ' ' . $user->last_name ?>
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fas fa-account-outline"></i>
                            <span>Profile</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fas fa-settings-outline"></i>
                            <span>Settings</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fas fa-lock-outline"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fas fa-logout-variant"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                        <i class="fas fa-cog"></i>
                    </a>
                </li>


            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <?php $this->load->view("partials/icons/logo") ?>
                    </span>
                    <!-- <span class="logo-sm">
                        <?php $this->load->view("partials/icons/logo") ?>
                    </span> -->
                </a>

                <!-- <a href="" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <?php $this->load->view("partials/icons/logo") ?>
                    </span>
                    <span class="logo-sm">
                        <?php $this->load->view("partials/icons/logo") ?>
                    </span>
                </a> -->
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile">
                        <i class="fas fa-bars"></i>
                    </button>
                </li>

                <li class="d-none d-sm-block">
                    <form class="app-search">
                        <div class="app-search-box">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">


            <div class="user-box">
                <div class="float-left">
                    <img src="<?php echo (get_uploads_file("{$user->avatar}")); ?>" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info">
                    <a href="#"><?php echo $user->first_name . ' ' . $user->last_name ?></a>
                    <p class="text-muted m-0">
                        <?php
                        if ($user->role_id == 1) {
                            echo 'Admin';
                        } else {
                            echo 'Staff';
                        }

                        ?>
                    </p>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="<?php echo base_url("/admin"); ?>">
                            <i class="fas fa-home"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="material-icons">category</i>
                            <span> Categories </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url("/admin/categories"); ?>">All</a></li>
                            <li><a href="<?php echo base_url("/admin/my_categories"); ?>">My Categories</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                        <i class="fa fa-shopping-basket"></i>
                            <span> Products </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url("/admin/products"); ?>">ALL</a></li>
                            <li><a href="<?php echo base_url("/admin/products"); ?>">Advanced Form</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-bars"></i>
                            <span> Tables </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="tables-basic">Basic Tables</a></li>
                            <li><a href="tables-advanced">Advanced Tables</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="charts">
                            <i class="fas fa-chart-pie"></i>
                            <span> Charts </span>
                            <span class="badge badge-primary float-right">5</span>
                        </a>
                    </li>

                    <li>
                        <a href="maps">
                            <i class="fas fa-map-marker-alt"></i>
                            <span> Maps </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="far fa-file"></i>
                            <span> Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="pages-login">Login</a></li>
                            <li><a href="pages-register">Register</a></li>
                            <li><a href="pages-forget-password">Forget Password</a></li>
                            <li><a href="pages-lock-screen">Lock-screen</a></li>
                            <li><a href="pages-blank">Blank page</a></li>
                            <li><a href="pages-404">Error 404</a></li>
                            <li><a href="pages-confirm-mail">Confirm Mail</a></li>
                            <li><a href="pages-session-expired">Session Expired</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-chevron-down"></i>
                            <span> Extra Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="extras-timeline">Timeline</a></li>
                            <li><a href="extras-invoice">Invoice</a></li>
                            <li><a href="extras-profile">Profile</a></li>
                            <li><a href="extras-calendar">Calendar</a></li>
                            <li><a href="extras-faqs">FAQs</a></li>
                            <li><a href="extras-pricing">Pricing</a></li>
                            <li><a href="extras-contacts">Contacts</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-th-large"></i>
                            <span> Layouts </span>
                            <span class="badge badge-danger badge-pill float-right">New</span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="layouts-horizontal">Horizontal</a></li>
                            <li><a href="layouts-dark-sidebar">Dark Sidebar</a></li>
                            <li><a href="layouts-small-sidebar">Small Sidebar</a></li>
                            <li><a href="layouts-sidebar-collapsed">Sidebar Collapsed</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-share-alt"></i>
                            <span> Multi Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="javascript: void(0);">Level 1.1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Level 2.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>


        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">