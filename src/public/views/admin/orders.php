<!-- Start container-fluid -->
<?php
$orders = $params["orders"]['data'];
$order_status = $params["order_status"];
$order_desc = [
    "1" => "Processing",
    "2" => "Processed",
    "3" => "Shipping",
    "4" => "Complete"
];

// echo '<pre>';
// var_dump(isset($order_desc[$order_status]) == NULL);
// echo '</pre>';
// die();
?>

<link href="<?= get_assets_uri("css/order-detail.css") ?>" rel="stylesheet" type="text/css" id="order-detail-stylesheet">
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-sm-12">
            <h2 class="header-title mb-3 fs-2" style="font-size: 2rem;">
                <?= isset($order_desc[$order_status]) != NULL ? $order_desc[$order_status] : "All Orders" ?>
            </h2>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="mt-3">

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th style="max-width: 10px!important;">#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Tax</th>
                            <th>Ship</th>
                            <th>Total price</th>
                            <th>Created at</th>
                            <th>Order date</th>
                            <th>Status</th>
                            <th style="max-width: 110px!important;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $i = 0;
                        foreach ($orders as $order) {
                            $i++;
                        ?>

                            <tr>
                                <td style="text-align: end;"><?= $i ?></td>
                                <td id="o-name-<?= $order->id ?>"><?= $order->name ?></td>
                                <td id="o-phone-<?= $order->id ?>"><?= $order->phone_number ?></td>
                                <td id="o-address-<?= $order->id ?>"><?= $order->address ?></td>
                                <td id="o-tax-<?= $order->id ?>"><?= $order->tax ?></td>
                                <td id="o-shipping-<?= $order->id ?>"><?= $order->shipping ?></td>
                                <td id="o-total-<?= $order->id ?>"><?= $order->total_amount ?></td>
                                <td id="o-created_at-<?= $order->id ?>"><?= $order->created_at ?></td>
                                <td id="o-order_date-<?= $order->id ?>"><?= $order->order_date ?></td>
                                <td id="o-status-<?= $order->id ?>">
                                    <?= $order_desc[$order->status] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" href="#detailCategoryModal" onclick='Detail(<?= $order->id; ?>)' class="detail" data-toggle="modal" style="color: #fff;">
                                        Get info
                                    </button>
                                    <br>
                                    <?php if ($order->status == 1) { ?>
                                        <button class="btn btn-success" onclick="ConfirmOrder(<?= $order->id; ?>, <?= $order->status ?>)">Confirm Order</button>
                                    <?php } elseif ($order->status == 2) { ?>
                                        <button class="btn btn-success" onclick="ConfirmOrder(<?= $order->id; ?>, <?= $order->status ?>)">Shipping</button>
                                    <?php } elseif ($order->status == 3) { ?>
                                        <button class="btn btn-success" onclick="ConfirmOrder(<?= $order->id; ?>, <?= $order->status ?>)">Complete</button>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <!-- end -->

        </div>
    </div>
    <!-- end row -->

    <!-- ===modal=== -->
    <!-- Detail Modal HTML -->
    <div id="detailCategoryModal" class="modal fade order-detail">
        <div class="modal-dialog modal-lg mt-5" style="max-width: 850px !important;">
            <div class="modal-content">
                <section class="h-100 gradient-custom">
                    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">
                                <div class="card" style="border-radius: 10px;">
                                    <div class="card-header px-4 py-5">
                                        <h5 class="text-muted mb-0">Thanks for your Order, <span id="user_name_order" style="color: #a8729a;">...</span>!</h5>
                                    </div>
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                            <p class="small text-muted mb-0">Receipt Voucher : 1KAU9-84UIL</p>
                                        </div>
                                        <div class="card shadow-0 border mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0">Name: </p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0 small">Qty: 1</p>
                                                    </div>
                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                        <p class="text-muted mb-0 small">$499</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="fw-bold mb-0">Order Details</p>
                                            <p class="text-muted mb-0">
                                                <span class="fw-bold me-4">Ship: $</span>
                                                <span id="price_ship">0.00</span>
                                            </p>
                                        </div>

                                        <div class="d-flex justify-content-between pt-2">
                                            <p class="text-muted mb-0">Invoice Number : 788152</p>
                                            <p class="text-muted mb-0">
                                                <span class="fw-bold me-4">Tax(5%): $</span>
                                                <span id="price_tax">0.00</span>
                                            </p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted mb-0">Order Date : <span id="order_date"></span></p>
                                            <p class="text-muted mb-0">
                                                <span class="fw-bold me-4">Total: $</span>
                                                <span id="price_total">0.00</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card card-stepper text-black" style="border-radius: 16px;">

                                    <div class="card-body">

                                        <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0">
                                            <li class="step0 active text-center" id="step1"></li>
                                            <li class="step0 text-muted text-center" id="step2"></li>
                                            <li class="step0 text-muted text-center" id="step3"></li>
                                            <li class="step0 text-muted text-end" id="step4"></li>
                                        </ul>

                                        <div class="d-flex justify-content-between">
                                            <div class="d-lg-flex align-items-center">
                                                <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                                <div>
                                                    <p class="fw-bold mb-1">Order</p>
                                                    <p class="fw-bold mb-0">Processing</p>
                                                </div>
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                                <div>
                                                    <p class="fw-bold mb-1">Order</p>
                                                    <p class="fw-bold mb-0">Processed</p>
                                                </div>
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                                <div>
                                                    <p class="fw-bold mb-1">Order</p>
                                                    <p class="fw-bold mb-0">Shipping</p>
                                                </div>
                                            </div>
                                            <div class="d-lg-flex align-items-center">
                                                <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                                <div>
                                                    <p class="fw-bold mb-1">Order</p>
                                                    <p class="fw-bold mb-0">Complete</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <!-- partial -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src="">
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle=btooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>

    <!-- end modal -->

</div>
<!-- end container-fluid -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/alchemyjs/0.4.2/scripts/vendor.js"></script>

<!-- script -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Vendor js -->
<script src="<?= get_assets_uri("js/admin/vendor.min.js") ?>"></script>


<!-- Required datatable js -->
<script src="<?= get_assets_uri("libs/datatables/jquery.dataTables.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/datatables/dataTables.bootstrap4.min.js") ?>"></script>

<!-- Buttons examples -->
<script src="<?= get_assets_uri("libs/datatables/dataTables.buttons.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/datatables/buttons.bootstrap4.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/datatables/dataTables.select.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/jszip/jszip.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/pdfmake/pdfmake.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/pdfmake/vfs_fonts.js") ?>"></script>
<script src="<?= get_assets_uri("libs/datatables/buttons.html5.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/datatables/buttons.print.min.js") ?>"></script>

<!-- Responsive examples -->
<script src="<?= get_assets_uri("libs/datatables/dataTables.responsive.min.js") ?>"></script>
<script src="<?= get_assets_uri("libs/datatables/responsive.bootstrap4.min.js") ?>"></script>

<!-- Datatables init -->
<script src="<?= get_assets_uri("js/admin/pages/datatables.init.js") ?>"></script>

<!-- order js -->
<script src="<?= get_assets_uri("js/admin/order.js") ?>"></script>


<style id="css-header-bar">
    <?= load_css("category-admin"); ?><?= load_css("modal-admin"); ?><?= load_css("order-admin"); ?>
</style>