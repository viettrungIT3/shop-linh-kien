<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Session expired | Simple - Responsive Bootstrap 4 Admin Dashboard</title>
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
            <?= load_css("app.min") ?>
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
                                    <img src="public\theme\images\admin\warming.svg" title="invite.svg" class="avatar-xl">
                                    <h3 class="font-weight-normal w-75 mx-auto mt-4">Your session has expired due to inactivity</h3>
                                </div>
                                <form action="mt-4" class="p-2">
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="john@deo.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets\js\vendor.min.js"></script>

        <!-- App js -->
        <script src="assets\js\app.min.js"></script>

    </body>

</html>