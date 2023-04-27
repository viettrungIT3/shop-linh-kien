﻿<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Login Page | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
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
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-4 mt-3">
                                    <a href="">
                                        <span><img src="public\theme\images\admin\logo-dark.png" alt="" height="30"></span>
                                    </a>

                                </div>
                                <form action="mt-3" class="p-2">
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="john@deo.com">
                                    </div>
                                    <div class="form-group">
                                        <a href="page-recoverpw" class="text-muted float-right">Forgot your password?</a>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-4 pb-3">
                                        <div class="custom-control custom-checkbox checkbox-primary">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Don't have an account? <a href="pages-register" class="text-dark ml-1"><b>Sign Up</b></a></p>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="public\theme\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="public\theme\js\app.min.js"></script>

    </body>

</html>