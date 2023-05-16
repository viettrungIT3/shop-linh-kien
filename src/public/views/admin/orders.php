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
    <div id="detailCategoryModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5" style="max-width: 600px !important;">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label> - Name: </label>
                            <span id="name_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Description: </label>
                            <span id="desc_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Total Products: </label>
                            <span id="total_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Created by: </label>
                            <span id="cb_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Updated by: </label>
                            <span id="ub_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Created at: </label>
                            <span id="ca_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Update ay: </label>
                            <span id="ua_detail" style="font-size: 1rem;"></span>
                        </div>
                        <div class="form-group">
                            <label> - Status: </label>
                            <span id="status_detail" style="font-size: 1rem;"></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addCategoryModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input id="name_add" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="desc_add" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-success" value="Add" onclick="AddCategory()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editCategoryModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name <span style="color: red;">(*)</span></label>
                            <input id="name_edit" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="desc_edit" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="editRadio" class="custom-control-input" value="1">
                                    <label class="custom-control-label" for="customRadioInline1">Show</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="editRadio" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="customRadioInline2">Block</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                        <input class="btn btn-info" style="width: 100px;" value="Save" onclick="EditCategory()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteCategoryModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-danger" value="Delete" onclick="DeleteCategory()">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://maxbn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
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