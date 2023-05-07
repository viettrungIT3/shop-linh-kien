<!-- Start container-fluid -->
<?php
$total = $params["total"];
// var_dump($total['total_user']);
// die;
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Welcome !</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div>
                <div class="card-box widget-inline">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-success fa fa-folder-open mr-2"></i>
                                    <b><?= $total['total_category'] ?></b>
                                </h2>
                                <p class="text-muted mb-0">Total category</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-danger fa fa-shopping-cart mr-2"></i>
                                    <b><?= $total['total_product'] ?></b>
                                </h2>
                                <p class="text-muted mb-0">Total product</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 widget-inline-box">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-info mdi mdi-account-multiple mr-2"></i>
                                    <b><?= $total['total_user'] ?></b>
                                </h2>
                                <p class="text-muted mb-0">Total users</p>
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6">
                            <div class="text-center p-3">
                                <h2 class="mt-2">
                                    <i class="text-success mdi mdi-account-box-multiple mr-2"></i>
                                    <b><?= $total['total_admin_staff'] ?></b>
                                </h2>
                                <p class="text-muted mb-0">Total admin & staff</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row -->

    <!-- <div class="row">
        <div class="col-lg-6">
            <div class="card-box">
                <h5 class="mt-0 font-14">Total Revenue</h5>
                <div class="text-center">
                    <ul class="list-inline chart-detail-list">
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Series A</p>
                        </li>
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-muted"></i>Series B</p>
                        </li>
                    </ul>
                </div>
                <div id="dashboard-bar-stacked" class="morris-chart" dir="ltr" style="height: 300px;"></div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-box">
                <h5 class="mt-0 font-14">Sales Analytics</h5>
                <div class="text-center">
                    <ul class="list-inline chart-detail-list">
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-primary"></i>Mobiles</p>
                        </li>
                        <li class="list-inline-item">
                            <p class="font-weight-semibold"><i class="fa fa-circle mr-2 text-info"></i>Tablets</p>
                        </li>
                    </ul>
                </div>
                <div id="dashboard-line-chart" class="morris-chart" dir="ltr" style="height: 300px;"></div>
            </div>
        </div>
    </div> -->
    <!-- end row -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Top 5 employees best sell </h5>
                <div class="table-responsive">
                    <!-- <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Sold</th>
                                <th>Inventory</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $products = $params["top_5_bestsellers"]['data'];
                            foreach ($products as $product) { ?>
                                <tr>
                                    <td><?= $product->name ?></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $product->sold_quantity ?></td>
                                    <td><?= $product->quantity - $product->sold_quantity ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h5 class="mt-0 font-14 mb-3">Top 5 products best sell </h5>
                <div class="table-responsive">
                    <table class="table table-hover mails m-0 table table-actions-bar table-centered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Sold</th>
                                <th>Inventory</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $products = $params["top_5_bestsellers"]['data'];
                            foreach ($products as $product) { ?>
                                <tr>
                                    <td><?= $product->name ?></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $product->sold_quantity ?></td>
                                    <td><?= $product->quantity - $product->sold_quantity ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- end container-fluid -->

<!-- Vendor js -->
<script src="<?= get_assets_uri("js/admin/vendor.min.js") ?>"></script>

<script src="<?= get_assets_uri("libs/morris-js/morris.min.js") ?>"></script>

<script src="<?= get_assets_uri("libs/raphael/raphael.min.js") ?>"></script>

<script src="<?= get_assets_uri("js/admin/pages/dashboard.init.js") ?>"></script>