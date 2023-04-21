﻿<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>form Advanced | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description">
        <meta content="Coderthemes" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- App favicon -->
        <link rel="shortcut icon" href="public/theme/images/admin/favicon.ico">
        <!-- Plugin css -->
        <link href="assets\libs\bootstrap-tagsinput\bootstrap-tagsinput.css" rel="stylesheet">
        <link href="assets\libs\switchery\switchery.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\clockpicker\bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="assets\libs\bootstrap-timepicker\bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\bootstrap-colorpicker\bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\bootstrap-datepicker\bootstrap-datepicker.css" rel="stylesheet">
        <link href="assets\libs\bootstrap-daterangepicker\daterangepicker.css" rel="stylesheet">
        <!-- Summernote css -->
        <link href="assets\libs\summernote\summernote-bs4.css" rel="stylesheet" type="text/css">
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
                        <a href="ui-elements.html">
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
                            <li><a href="components-range-slider.html">Range Slider</a></li>
                            <li><a href="components-alerts.html">Alerts</a></li>
                            <li><a href="components-icons.html">Icons</a></li>
                            <li><a href="components-widgets.html">Widgets</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="typography.html">
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
                            <li><a href="forms-general.html">General Elements</a></li>
                            <li><a href="forms-advanced.html">Advanced Form</a></li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-bars"></i>
                            <span>  Tables </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="tables-basic.html">Basic Tables</a></li>
                            <li><a href="tables-advanced.html">Advanced Tables</a></li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="charts.html">
                            <i class="fas fa-chart-pie"></i>
                            <span>  Charts  </span>
                            <span class="badge badge-primary float-right">5</span>
                        </a>
                    </li>
    
                    <li>
                        <a href="maps.html">
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
                            <li><a href="pages-login.html">Login</a></li>
                            <li><a href="pages-register.html">Register</a></li>
                            <li><a href="pages-forget-password.html">Forget Password</a></li>
                            <li><a href="pages-lock-screen.html">Lock-screen</a></li>
                            <li><a href="pages-blank.html">Blank page</a></li>
                            <li><a href="pages-404.html">Error 404</a></li>
                            <li><a href="pages-confirm-mail.html">Confirm Mail</a></li>
                            <li><a href="pages-session-expired.html">Session Expired</a></li>
                        </ul>
                    </li>
    
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-chevron-down"></i>
                            <span> Extra Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
    
                            <li><a href="extras-timeline.html">Timeline</a></li>
                            <li><a href="extras-invoice.html">Invoice</a></li>
                            <li><a href="extras-profile.html">Profile</a></li>
                            <li><a href="extras-calendar.html">Calendar</a></li>
                            <li><a href="extras-faqs.html">FAQs</a></li>
                            <li><a href="extras-pricing.html">Pricing</a></li>
                            <li><a href="extras-contacts.html">Contacts</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-th-large"></i>
                            <span> Layouts </span>
                            <span class="badge badge-danger badge-pill float-right">New</span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="layouts-horizontal.html">Horizontal</a></li>
                            <li><a href="layouts-dark-sidebar.html">Dark Sidebar</a></li>
                            <li><a href="layouts-small-sidebar.html">Small Sidebar</a></li>
                            <li><a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a></li>
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
                            <div class="col-lg-6">
                                <div>
                                    <h4 class="header-title mb-3">Switchery</h4>

                                    <div>
                                        <h5 class="mt-0 font-14">Basic</h5>
                                        <p class="sub-header">
                                            Add an attribute <code>
                                                    data-plugin="switchery" data-color="@colors"</code> to your input element and it will be converted into switch.
                                        </p>

                                        <div class="switchery-demo">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#039cfd">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#f1b53d">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#1bb99a">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#ff5d48">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#3db9dc">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#2b3d51">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#9261c6">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#ff7aa3">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#98a6ad">
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="mt-5 font-14">Sizes & Secondary color</h5>
                                        <p class="sub-header">
                                            Add an attribute <code>
                                                    data-size="small",data-size="large"</code> to your input element and it will be converted into switch. Add an attribute <code>
                                                    data-color="@color" data-secondary-color="@color"</code> to your input element and it will be converted into switch.
                                        </p>

                                        <div class="switchery-demo">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#64b0f2" data-size="small">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#ff7aa3">
                                            <input type="checkbox" checked="" data-plugin="switchery" data-color="#2b3d51" data-size="large">
                                            <input type="checkbox" data-plugin="switchery" data-color="#1bb99a" data-secondary-color="#ff5d48">
                                            <input type="checkbox" data-plugin="switchery" data-color="#9261c6" data-secondary-color="#ff7aa3" checked="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-5 mt-lg-0">
                                    <h4 class="header-title mb-3">Tags Input</h4>
                                
                                    <div>
                                        <h5 class="mt-0 font-14">Input Tags</h5>
                                        <p class="sub-header">
                                            Just add <code>data-role="tagsinput"</code> to your input field to automatically change it to a tags input field.
                                        </p>

                                        <div class="tags-default">
                                            <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags">
                                        </div>
                                    </div>

                                    <div>
                                        <h5 class="mt-5 font-14">True multi value</h5>
                                        <p class="sub-header">
                                            Use a <code>&lt;select multiple /&gt;</code> as your input element for a tags input, to gain true multivalue support. Instead of a comma separated string, the values will be set in an array. Existing <code>&lt;option /&gt;</code> elements will automatically be set as tags. This makes it also possible to create tags containing a comma.
                                        </p>

                                        <div class="mb-0">
                                            <select multiple="" data-role="tagsinput">
                                                <option value="Amsterdam">Amsterdam</option>
                                                <option value="Washington">Washington</option>
                                                <option value="Sydney">Sydney</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start  -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title mb-3">Select2</h4>

                                    <div>
                                        <h5 class="font-14">Single Select</h5>
                                        <p class="sub-header">
                                            Select2 can take a regular select box like this...
                                        </p>

                                        <select class="form-control" data-toggle="select2">
                                            <option>Select</option>
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                            <optgroup label="Mountain Time Zone">
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="ID">Idaho</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Utah</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Central Time Zone">
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TX">Texas</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="WI">Wisconsin</option>
                                            </optgroup>
                                            <optgroup label="Eastern Time Zone">
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div>
                                        <h5 class="font-14 mt-4">Multiple Select</h5>
                                        <p class="sub-header">
                                            Select2 can take a regular select box like this...
                                        </p>
            
                                        <select class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                            </optgroup>
                                            <optgroup label="Pacific Time Zone">
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
                                                <option value="OR">Oregon</option>
                                                <option value="WA">Washington</option>
                                            </optgroup>
                                            <optgroup label="Mountain Time Zone">
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="ID">Idaho</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Utah</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Central Time Zone">
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TX">Texas</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="WI">Wisconsin</option>
                                            </optgroup>
                                            <optgroup label="Eastern Time Zone">
                                                <option value="CT">Connecticut</option>
                                                <option value="DE">Delaware</option>
                                                <option value="FL">Florida</option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </optgroup>
                                        </select>
                                    </div>

                                    <div>
                                        <h5 class="font-14 mt-4">Disabled results</h5>
                                        <p class="sub-header">
                                            Select2 will correctly handle disabled results, both with data coming from a standard select (when the disabled attribute is set) and from remote sources, where the object has disabled: true set.
                                        </p>
            
                                        <select class="select2 form-control" data-toggle="select2">
                                            <option value="one">First</option>
                                            <option value="two" disabled="disabled">Second (disabled)</option>
                                            <option value="three">Third</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title mb-3">Bootstrap FileStyle</h4>
                                
                                    <div>
                                        <h5 class="font-14">Input Tag</h5>
                                        <p class="sub-header">
                                            You can limit the number of elements you are allowed to select via the
                                            <code>
                                                                    data-max-option
                                                                </code> attribute. It also works for option groups.
                                        </p>

                                        <form>
                                            <div class="form-group">
                                                <p>Default file input</p>
                                                <input type="file" class="filestyle">
                                            </div>
                                            <div class="form-group">
                                                <p>File style without input</p>
                                                <input type="file" class="filestyle" data-input="false">
                                            </div>
                                            <div class="form-group">
                                                <p>Small file style</p>
                                                <input type="file" class="filestyle" data-size="sm">
                                            </div>
                                            <div class="form-group">
                                                <p>Disable file style</p>
                                                <input type="file" class="filestyle" data-disabled="true">
                                            </div>
                                            <div class="form-group">
                                                <p>File style with custom icon</p>
                                                <input type="file" class="filestyle" id="filestyleicon">
                                            </div>
                                            <div class="form-group mb-0">
                                                <p>File style with button style</p>
                                                <input type="file" class="filestyle" data-btnclass="btn-primary">
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start  -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title mb-3">Form Validation - Basic Form</h4>
                                    <p class="sub-header">
                                        Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                    </p>

                                    <div class="">
                                        <form action="#" class="form-validation">
                                            <div class="form-group">
                                                <label for="userName">User Name<span class="text-danger">*</span></label>
                                                <input type="text" name="nick" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                                            </div>
                                            <div class="form-group">
                                                <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                                <input type="email" name="email" parsley-trigger="change" required="" placeholder="Enter email" class="form-control" id="emailAddress">
                                            </div>
                                            <div class="form-group">
                                                <label for="pass1">Password<span class="text-danger">*</span></label>
                                                <input id="pass1" type="password" placeholder="Password" required="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                                <input data-parsley-equalto="#pass1" type="password" required="" placeholder="Password" class="form-control" id="passWord2">
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="remember-1" type="checkbox">
                                                    <label for="remember-1"> Remember me </label>
                                                </div>
                                            </div>

                                            <div class="form-group text-right mb-0">
                                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger waves-effect">
                                                    Cancel
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title mb-3">Form Validation - Horizontal Form</h4>
                                    <p class="sub-header">
                                        Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                                    </p>

                                    <div class="mb-4">
                                        <form class="form-validation">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-4 form-control-label">Email<span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="email" required="" parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-md-4 form-control-label">Password<span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <input id="hori-pass1" type="password" placeholder="Password" required="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hori-pass2" class="col-md-4 form-control-label">Confirm Password
                                                    <span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <input data-parsley-equalto="#hori-pass1" type="password" required="" placeholder="Password" class="form-control" id="hori-pass2">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="webSite" class="col-md-4 form-control-label">Web Site<span class="text-danger">*</span></label>
                                                <div class="col-md-7">
                                                    <input type="url" required="" parsley-type="url" class="form-control" id="webSite" placeholder="URL">
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-end">
                                                <div class="col-md-8">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="remember-2" type="checkbox">
                                                        <label for="remember-2"> Remember me </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row justify-content-end">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                        Register
                                                    </button>
                                                    <button type="reset" class="btn btn-danger waves-effect">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start  -->
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title mb-3">Timepicker</h4>
                                    <p class="sub-header">Easily select a time for a text input using your mouse or keyboards arrow keys.</p>
                                
                                    <div class="">
                                        <div class="form-group">
                                            <label>Default Time Picker</label>
                                            <div class="input-group">
                                                <input id="timepicker" type="text" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div class="form-group">
                                            <label>24 Hour Mode Time Picker</label>
                                            <div class="input-group">
                                                <input id="timepicker2" type="text" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                        <div class="form-group">
                                            <label>Specify a step for the minute field</label>
                                            <div class="input-group">
                                                <input id="timepicker3" type="text" class="form-control">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                                </div>
                                            </div>
                                            <!-- input-group -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title mb-3">Colorpicker</h4>
                                    <p class="sub-header">Add color picker to field or to any other element.</p>
                                        
                                    <div class="">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Default</label>
                                                <input type="text" class="form-control" id="default-colorpicker" value="#8fff00">
                                            </div>
                                            <div class="form-group">
                                                <label>RGBA</label>
                                                <input type="text" class="form-control" id="rgba-colorpicker" value="rgb(0,194,255,0.78)" data-color-format="rgba">
                                            </div>

                                            <div class="form-group">
                                                <label>As Component</label>
                                                <div id="component-colorpicker" class="input-group" title="Using format option">
                                                    <input type="text" class="form-control input-lg" value="#188ae2">
                                                    <span class="input-group-append">
                                                            <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start  -->
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <div>
                                    <h4 class="header-title mb-3">Date Picker</h4>
                                    <p class="sub-header">The datepicker is tied to a standard form input field. Click on the input to open an interactive calendar in a small overlay. Click elsewhere on the page or hit the Esc key to close. If a date is chosen, feedback is shown as the input's value.</p>

                                    <div class="row">
                                        <div class="col-lg-8">

                                            <div class="">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label>Default Functionality</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                            <!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Auto Close</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                            <!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Multiple Date</label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                </div>
                                                            </div>
                                                            <!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date Range</label>
                                                        <div>
                                                            <div class="input-daterange input-group" id="date-range">
                                                                <input type="text" class="form-control" name="start">
                                                                <input type="text" class="form-control" name="end">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">

                                            <div class="text-center mt-4 mt-lg-0">

                                                <label class="text-center">Display Inline</label>
                                                <div class="input-group">
                                                    <div id="datepicker-inline" style="margin: 10px auto"></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start  -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title">Date Range Picker</h4>
                                    <p class="sub-header">A JavaScript component for choosing date ranges. Designed to work with the Bootstrap CSS framework.</p>
                                

                                    <div class="">
                                        <form>
                                            <div class="form-group">
                                                <label>With all options</label>
                                                <div id="reportrange" class="form-control">
                                                    <i class="fa fa-calendar mr-2"></i>
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Date Range Pick</label>
                                                <div>
                                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Date Range With Time</label>
                                                <div>
                                                    <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Limit Selectable Dates</label>
                                                <div>
                                                    <input class="form-control input-limit-datepicker" type="text" name="daterange" value="06/01/2015 - 06/07/2015">
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="mt-5">
                                    <h4 class="header-title">Clock Picker</h4>
                                    <p class="sub-header"> A clock-style timepicker for Bootstrap (or jQuery).Your awesome text goes here.</p>
                                
                                    <div>
                                        <label>Default Clock Picker</label>
                                        <div class="input-group clockpicker mb-3">
                                            <input type="text" class="form-control" value="09:30">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label>Auto close</label>
                                        <div class="input-group clockpicker mb-3" data-placement="top" data-align="top" data-autoclose="true">
                                            <input type="text" class="form-control" value="13:14">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label>Now time</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" id="single-input" value="" placeholder="Now">
                                            <span class="input-group-append">
                                                        <button type="button" id="check-minutes" class="btn waves-effect waves-light btn-primary">Check the minutes</button>
                                                    </span>
                                        </div>
                                    </div>

                                    <div>
                                        <label>Place at left, align the arrow to top </label>
                                        <div class="input-group clockpicker" data-placement="top" data-align="top">
                                            <input type="text" class="form-control" value="13:14">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <!-- start  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mt-5">
                                    <h4 class="header-title">Summernote Editor</h4>
                                    <p class="sub-header">A JavaScript component for choosing date ranges. Designed to work with the Bootstrap CSS framework.</p>
                                
                                    <div class="summernote">
                                        <h5>Hello Summer note</h5>
                                        <ul>
                                            <li>
                                                Select a text to reveal the toolbar.
                                            </li>
                                            <li>
                                                Edit rich document on-the-fly, so elastic!
                                            </li>
                                        </ul>
                                    </div>
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
        <script src="public\theme\libs\moment\moment.min.js"></script>
        <script src="public\theme\libs\bootstrap-tagsinput\bootstrap-tagsinput.min.js"></script>
        <script src="public\theme\libs\switchery\switchery.min.js"></script>
        <script src="public\theme\libs\select2\select2.min.js"></script>
        <script src="public\theme\libs\parsleyjs\parsley.min.js"></script>
        <script src="public\theme\libs\bootstrap-filestyle2\bootstrap-filestyle.min.js"></script>
        <script src="public\theme\libs\bootstrap-timepicker\bootstrap-timepicker.min.js"></script>
        <script src="public\theme\libs\bootstrap-colorpicker\bootstrap-colorpicker.min.js"></script>
        <script src="public\theme\libs\clockpicker\bootstrap-clockpicker.min.js"></script>
        <script src="public\theme\libs\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>
        <script src="public\theme\libs\bootstrap-daterangepicker\daterangepicker.js"></script>
        <!-- Summernote js -->
        <script src="public\theme\libs\summernote\summernote-bs4.min.js"></script>

        <!-- Init js-->
        <script src="public\theme\js\pages\form-advanced.init.js"></script>

        <!-- App js -->
        <script src="public\theme\js\app.min.js"></script>

    </body>

</html>