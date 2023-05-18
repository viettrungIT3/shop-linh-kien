<!-- Start container-fluid -->
<?php $users_list = $params["users_list"]['data'] ?>
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-sm-10">
            <h2 class="header-title mb-3 fs-2" style="font-size: 2rem;">
            <?= ($params["role_id"] == 1 ? "List Admin" : ($params["role_id"] == 2 ? "List Employee" : "List Users")) ?>
        </h2>
        </div>
        <div class="col-sm-2 text-left">
            <a href="#addCategoryModal" class="btn btn-success" data-toggle="modal" style="display: grid;">
                <i class="material-icons">&#xE147;</i>
                <span>Add New Employee</span>
            </a>
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
                            <th>Login</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Avatar</th>
                            <th>Created at</th>
                            <th>Status</th>
                            <th style="max-width: 110px!important;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $i = 0;
                        foreach ($users_list as $user_item) {
                            $i++;
                        ?>

                            <tr>
                                <td style="text-align: end;"><?= $i ?></td>
                                <td id="ca-name-<?= $user_item->id ?>"><?= $user_item->first_name . ' ' . $user_item->last_name ?></td>
                                <td id="ca-login-<?= $user_item->id ?>"><?= $user_item->login ?></td>
                                <td id="ca-address-<?= $user_item->id ?>"><?= $user_item->address ?></td>
                                <td id="ca-phone_number-<?= $user_item->id ?>"><?= $user_item->phone_number ?></td>
                                <td id="ca-avatar-<?= $user_item->id ?>">
                                    <img style="height: 50px;" src="<?php echo ($user_item->avatar ?? NULL ? get_uploads_file($user_item->avatar) : '') ?>" alt="">
                                </td>
                                <td id="ca-timeC-<?= $user_item->id ?>">
                                    <?php
                                    echo (date('d-m-Y', strtotime($user_item->created_at)));
                                    ?>
                                </td>
                                <td id="ca-status-<?= $user_item->id ?>">
                                    <?= ($user_item->status == 1 ? '<button type="button" style="cursor:default;" class="btn btn-success" disabled>Showing</button>' : ($user_item->status == 0 ? '<button type="button" style="cursor:default;" class="btn btn-warning" disabled>Blocked</button>' :
                                        '<button type="button" style="cursor:default;" class="btn btn-danger" disabled>Deleted</button>')) ?>
                                </td>
                                <td></td>
                                <!-- <td>
                                    <button type="button" class="btn btn-primary" href="#detailCategoryModal" onclick="Detail(<?= $user_item->id ?>)" class="detail" data-toggle="modal" style="color: #fff;"><i class="far fa-eye" title="Detail"></i></button>

                                    <?php if ($user_item->updated_by == $params["user_info"]['data'][0]->id || $user_item->role_id >= $params["user_info"]['data'][0]->role_id) { ?>
                                        <button type="button" class="btn btn-warning" href="#editCategoryModal" onclick="CategoryID(<?= $user_item->id ?>, <?= $user_item->status ?>)" class="edit" data-toggle="modal" style="color: #fff;">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" href="#deleteCategoryModal" <?= ($user_item->status == 2) ? 'disabled' : "onclick='CategoryID($user_item->id, $user_item->status)'" ?> class="delete" data-toggle="modal" style="color: #fff;">
                                            <i class="far fa-trash-alt" data-toggle="tooltip" title="Delete"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-warning" onclick="DontPermission('edit')" style="color: #fff; opacity: .65;">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="You don't have permission to edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" onclick="DontPermission('delete')" style="color: #fff; opacity: .65;">
                                            <i class="far fa-trash-alt" data-toggle="tooltip" title="You don't have permission to delete"></i>
                                        </button>
                                    <?php } ?>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <!-- end -->

        </div>
    </div>
    <!-- end row -->


    <!-- Add Modal HTML -->
    <div id="addCategoryModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Enter email:</label>
                            <input id="login" type="text" placeholder="Email..." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Enter Password:</label>
                            <input type="password" id="password" placeholder="Password..." class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-success" value="Add" onclick="AddEmployee()">
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

<script src="<?= get_assets_uri("js/user-admin.js") ?>"></script>

<style id="css-header-bar">
    <?= load_css("category-admin") ?><?= load_css("modal-admin") ?>
</style>