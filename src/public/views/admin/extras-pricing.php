﻿<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Pricing | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="public/theme/images/admin/favicon.ico">
        <!-- App css -->
        <style id="bootstrap-stylesheet">
            <?= load_css("admin/bootstrap.min.css"); ?>
        </style>
        <style>
            <?= load_css("icons.min") ?>
        </style>
        <style id="app-stylesheet">
            <?= load_css("admin/app.min") ?>
        </style>

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo (get_media_uri('admin/flags/us.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">English <i class="fas fa-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                             <!-- item-->
                             <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo (get_media_uri('admin/flags/spain.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Spanish</span>
                             </a>

                             <!-- item-->
                             <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="<?php echo (get_media_uri('admin/flags/italy.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Italian</span>
                             </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="<?php echo (get_media_uri('admin/flags/french.jpg')); ?>" alt="user-image" class="mr-2" height="12"> <span class="align-middle">French</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="public\theme\images\admin\flags\russia.jpg" alt="user-image" class="mr-2" height="12"> <span class="align-middle">Russian</span>
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
                            <img src="<?php echo (get_media_uri('admin\users\avatar-1.jpg')); ?>" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                                    Maxine K  <i class="fas fa-chevron-down"></i> 
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
                            <img src="public\theme\images\admin\logo-dark.png" alt="" height="26">
                            <!-- <span class="logo-lg-text-dark">Simple</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">S</span> -->
                            <img src="public\theme\images\admin\logo-sm.png" alt="" height="22">
                        </span>
                    </a>

                    <a href="" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="public\theme\images\admin\logo-light.png" alt="" height="26">
                            <!-- <span class="logo-lg-text-light">Simple</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-lg-text-light">S</span> -->
                            <img src="public\theme\images\admin\logo-sm.png" alt="" height="22">
                        </span>
                    </a>
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
                            <img src="<?php echo (get_media_uri('admin\users\avatar-1.jpg')); ?>" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <a href="#">Stanley Jones</a>
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
    
            <!--- Sidemenu -->
            <div id="sidebar-menu">
    
                <ul class="metismenu" id="side-menu">
    
                    <li class="menu-title">Navigation</li>
    
                    <li>
                        <a href="">
                            <i class="fas fa-home"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="ui-elements">
                            <i class="fas fa-fill-drip"></i>
                            <span> UI Elements </span>
                            <span class="badge badge-primary float-right">11</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="far fa-lightbulb"></i>
                            <span> Components </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="components-range-slider">Range Slider</a></li>
                            <li><a href="components-alerts">Alerts</a></li>
                            <li><a href="components-icons">Icons</a></li>
                            <li><a href="components-widgets">Widgets</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="typography">
                            <i class="fas fa-spray-can"></i>
                            <span> Typography </span>
                        </a>
                    </li>
    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-pencil-alt"></i>
                            <span>  Forms  </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="forms-general">General Elements</a></li>
                            <li><a href="forms-advanced">Advanced Form</a></li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-bars"></i>
                            <span>  Tables </span>
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
                            <span>  Charts  </span>
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
                            <span>  Multi Level  </span>
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

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <!-- start  -->
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">Pricing</h4>

                                    <!-- Start row -->
                                    <div class="row mt-5 justify-content-center">
                                        <div class="col-md-10">
                                            <div class="text-center">
                                                <h4 class="mt-2 mb-2">Choose your perfect plan</h4>
                                            </div>

                                            <div class="row mt-5">
                                                <div class="col-lg-4">
                                                    <div class="card text-center mt-3 bg-light border-0">
                                                        <div class="card-header bg-primary">
                                                            <h5 class="text-uppercase text-white font-16">Starter Pack</h5>
                                                        </div>

                                                        <div class="text-center p-4 mb-3">
                                                            <h1 class="display-4 mt-0 font-weight-bold">$19</h1>
                                                            <p class="font-13">Per Month</p>

                                                            <div class="mt-4 pt-2">
                                                                <p>10 GB Storege</p>
                                                                <p>500 GB Bandwidth</p>
                                                                <p>No Domain</p>
                                                                <p>1 User</p>
                                                                <p>Email Support</p>
                                                                <p>24x7 Support</p>
                                                            </div>

                                                            <div class="text-center mt-5">
                                                                <a href="#" class="btn btn-danger width-md btn-rounded">Signup</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="card text-center mt-3 ribbon-box bg-light border-0">
                                                        
                                                        <div class="card-header bg-primary">
                                                            <div class="ribbon-two ribbon-two-success"><span>POPULAR</span></div>
                                                            <h5 class="text-uppercase text-white font-16">Professional Pack</h5>
                                                        </div>

                                                        <div class="text-center p-4 mb-3">
                                                            <h1 class="display-4 mt-0 font-weight-bold">$29</h1>
                                                            <p class="font-13">Per Month</p>

                                                            <div class="mt-4 pt-2">
                                                                <p>10 GB Storege</p>
                                                                <p>500 GB Bandwidth</p>
                                                                <p>No Domain</p>
                                                                <p>1 User</p>
                                                                <p>Email Support</p>
                                                                <p>24x7 Support</p>
                                                            </div>

                                                            <div class="text-center mt-5">
                                                                <a href="#" class="btn btn-danger width-md btn-rounded">Signup</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="card text-center mt-3 bg-light border-0">
                                                        <div class="card-header bg-primary">
                                                            <h5 class="text-uppercase text-white font-16">Enterprise Pack</h5>
                                                        </div>

                                                        <div class="text-center p-4 mb-3">
                                                            <h1 class="display-4 mt-0 font-weight-bold">$39</h1>
                                                            <p class="font-13">Per Month</p>

                                                            <div class="mt-4 pt-2">
                                                                <p>10 GB Storege</p>
                                                                <p>500 GB Bandwidth</p>
                                                                <p>No Domain</p>
                                                                <p>1 User</p>
                                                                <p>Email Support</p>
                                                                <p>24x7 Support</p>
                                                            </div>

                                                            <div class="text-center mt-5">
                                                                <a href="#" class="btn btn-danger width-md btn-rounded">Signup</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                    

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    2023 &copy; <a href="https://github.com/viettrungIT3">viettrungIT3</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>
                <!-- end content -->

            </div>
            <!-- END content-page -->

        </div>
        <!-- END wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="fas fa-close"></i>
                </a>
                <h5 class="font-16 m-0 text-white">Theme Customizer</h5>
            </div>
            <div class="slimscroll-menu">
        
                <div class="p-4">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="public\theme\images\admin\layouts\light.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="public\theme\images\admin\layouts\dark.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="public\theme\images\admin\layouts\rtl.png" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appstyle="assets/css/app-rtl.min.css">
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/EK71X" class="btn btn-danger btn-block mt-3" target="_blank"><i class="fas fa-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        

        <!-- Vendor js -->
        <script src="public\theme\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="public\theme\js\app.min.js"></script>

    </body>

</html>