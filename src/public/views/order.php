<?php
$orders = $params["orders"]['data'];
$order_desc = [
    "1" => "Processing",
    "2" => "Processed",
    "3" => "Shipping",
    "4" => "Complete"
];

// echo '<pre>';
// var_dump($orders);
// echo '</pre>';
// die();
?>


<link href="<?= get_assets_uri("css/order.css") ?>" rel="stylesheet" type="text/css" id="cart-stylesheet">
<link href="<?= get_assets_uri("css/order-detail.css") ?>" rel="stylesheet" type="text/css" id="order-detail-stylesheet">

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Orders</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->

<div class="container container-order">
    <div class="d-flex justify-content-center row mt-2">
        <div class="col-md-12">
            <div class="rounded">
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Created</th>
                                <th>Order date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <?php foreach ($orders as $order) { ?>
                                <tr class="cell-1">
                                    <td>#<?= $order->key ?></td>
                                    <td style="max-width: 250px;"><?= $order->address ?></td>
                                    <td>$<?= $order->total_amount ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                        $date = date('Y-m-d', strtotime($order->created_at));

                                        if ($date == date('Y-m-d')) {
                                            echo "Today";
                                        } elseif ($date == date('Y-m-d', strtotime('-1 day'))) {
                                            echo "Yesterday";
                                        } else {
                                            echo (date('H:i:s', strtotime($order->created_at)) . "<br>" .  date('d-m-Y', strtotime($order->created_at)));
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        $date = date('Y-m-d', strtotime($order->order_date));

                                        if ($date == date('Y-m-d')) {
                                            echo "Today";
                                        } elseif ($date == date('Y-m-d', strtotime('-1 day'))) {
                                            echo "Yesterday";
                                        } else {
                                            echo (date('H:i:s', strtotime($order->order_date)) . "<br>" .  date('d-m-Y', strtotime($order->order_date)));
                                        }
                                        ?>
                                    </td>
                                    <td><span class=""><?= $order_desc[$order->status]; ?></span></td>
                                    <td style="text-align: center;">
                                        <button type="button" class="btn btn-primary" href="#detailModal" data-toggle="modal">See details</button>
                                        <br> <br>
                                        <?php if ($order->status == 3) { ?>
                                            <button type="button" class="btn btn-success">Order received</button>
                                        <?php } else if ($order->status == 1) { ?>
                                        <?php } else { ?>
                                            <i class="fa fa-ellipsis-h text-black-50"></i>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===modal=== -->
<!-- Detail Modal HTML -->
<div id="detailModal" class="modal fade order-detail">
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

<!-- order js -->
<script src="<?= get_assets_uri("js/admin/order.js") ?>"></script>