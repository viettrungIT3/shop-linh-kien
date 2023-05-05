<!-- Start container-fluid -->
<?php $categories = $params["categories"]['data'] ?>
<?php $products = $params["products"]['data'] ?>

<!-- style -->
<link rel='stylesheet' href='<?= get_assets_uri("libs/summernote/summernote-bs4.css") ?>'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css'>
<link rel='stylesheet' href='<?= get_assets_uri("libs/monokai/monokai.css") ?>'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">

<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-sm-10">
            <h2 class="header-title mb-3 fs-2" style="font-size: 2rem;">Categories</h2>
        </div>
        <div class="col-sm-2 text-left">
            <a href="#addProductModal" class="btn btn-success" data-toggle="modal" style="display: grid;">
                <i class="material-icons">&#xE147;</i>
                <span>Add New Product</span>
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
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Quantity sold</th>
                            <th>Quantity in stock</th>
                            <th class="d-none">Created by</th>
                            <th class="d-none">Updated by</th>
                            <th class="d-none">Created at</th>
                            <th class="d-none">Update at</th>
                            <th>Status</th>
                            <th style="max-width: 110px!important;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $i = 0;
                        foreach ($products as $product) {
                            $i++;
                        ?>

                            <tr>
                                <td style="text-align: end;"><?= $i ?></td>
                                <td id="ca-name-<?= $product->id ?>"><?= $product->name ?></td>
                                <td id="ca-desc-<?= $product->id ?>"><?= $product->price ?></td>
                                <td id="ca-total-<?= $product->id ?>"><?= $product->brand ?></td>
                                <td id="ca-total-<?= $product->id ?>"><?= $product->sold_quantity ?></td>
                                <td id="ca-total-<?= $product->id ?>"><?= $product->quantity - $product->sold_quantity ?></td>
                                <td id="ca-nameC-<?= $product->id ?>" class="d-none"><?= $product->name_of_created_by ?></td>
                                <td id="ca-nameU-<?= $product->id ?>" class="d-none"><?= $product->name_of_updated_by ?></td>
                                <td id="ca-timeC-<?= $product->id ?>" class="d-none"><?= $product->created_at ?></td>
                                <td id="ca-timeU-<?= $product->id ?>" class="d-none"><?= $product->updated_at ?></td>
                                <td id="ca-status-<?= $product->id ?>">
                                    <?= ($product->status == 1 ? '<button type="button" style="cursor:default;" class="btn btn-success" disabled>Showing</button>' : ($product->status == 0 ? '<button type="button" style="cursor:default;" class="btn btn-warning" disabled>Blocked</button>' :
                                        '<button type="button" style="cursor:default;" class="btn btn-danger" disabled>Deleted</button>')) ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" href="#detailProductModal" onclick="Detail(<?= $product->id ?>)" class="detail" data-toggle="modal" style="color: #fff;"><i class="far fa-eye" title="Detail"></i></button>

                                    <?php if ($product->updated_by == $params["user_info"]['data'][0]->id || $product->role_id >= $params["user_info"]['data'][0]->role_id) { ?>
                                        <button type="button" class="btn btn-warning" href="#editProductModal" onclick="ProductID(<?= $product->id ?>, <?= $product->status ?>)" class="edit" data-toggle="modal" style="color: #fff;">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" href="#deleteProductModal" <?= ($product->status == 2) ? 'disabled' : "onclick='ProductID($product->id, $product->status)'" ?> class="delete" data-toggle="modal" style="color: #fff;">
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
    <div id="detailProductModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5" style="max-width: 850px !important;">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Product</h4>
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
    <div id="addProductModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5" style="max-width: 850px !important;">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-7">
                                <label>Name</label>
                                <input id="name_add" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-5">
                                <label>Category</label>
                                <select class="custom-select mr-sm-2" id="category_add">
                                    <option selected>Choose...</option>
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Price</label>
                                <input id="price_add" type="number" class="form-control" step="0.01" min="0" required>
                            </div>
                            <div class="form-group col-3">
                                <label>quantity</label>
                                <input id="quantity_add" type="number" class="form-control" min="0" required>
                            </div>
                            <div class="form-group col-3">
                                <label>Weight</label>
                                <input id="weight_add" type="number" class="form-control" step="0.01" min="0" required>
                            </div>
                            <div class="form-group col-3">
                                <label>Size</label>
                                <input id="size_add" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group" style="min-height: 321px;">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#wrapper-summernote" role="tab" aria-controls="wrapper-summernote" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Special Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Gift info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="warranty-tab" data-toggle="tab" href="#warranty" role="tab" aria-controls="warranty" aria-selected="false">Warranty</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="brand-tab" data-toggle="tab" href="#brand" role="tab" aria-controls="brand" aria-selected="false">Brand</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="wrapper-summernote" role="tabpanel" aria-labelledby="home-tab">
                                    <textarea id="summernote" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#summernote').summernote({
                                                placeholder: 'Description...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['insert', ['table']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'monokai'
                                                }
                                            });
                                        })
                                    </script>

                                    <style>
                                        .note-editor button {
                                            color: #797979 !important;
                                            min-width: unset !important;
                                        }
                                    </style>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <textarea id="summernote2" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#summernote2').summernote({
                                                placeholder: 'Special Features...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['insert', ['table']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'monokai'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <textarea id="summernote3" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#summernote3').summernote({
                                                placeholder: 'Gift info...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['insert', ['table']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'monokai'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="warranty" role="tabpanel" aria-labelledby="warranty-tab">
                                    <textarea id="summernote4" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#summernote4').summernote({
                                                placeholder: 'Gift info...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['insert', ['table']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'monokai'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                                    <!-- <div class="row"> -->
                                        <input id="brand_add" class="col-4" type="text" class="form-control" placeholder="Enter brand..." required>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-success" value="Add" onclick="AddProduct()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editProductModal" class="modal fade">
        <div class="modal-dialog modal-lg" style="max-width: 850px !important;">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product</h4>
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
                        <input class="btn btn-info" style="width: 100px;" value="Save" onclick="EditProduct()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteProductModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
                        <input type="button" class="btn btn-danger" value="Delete" onclick="DeleteProduct()">
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css" integrity="sha512-uf06llspW44/LZpHzHT6qBOIVODjWtv4MxCricRxkzvopAlSWnTf6hpZTFxuuZcuNE9CBQhqE0Seu1CoRk84nQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js" integrity="sha512-8RnEqURPUc5aqFEN04aQEiPlSAdE0jlFS/9iGgUyNtwFnSKCXhmB6ZTNl7LnDtDWKabJIASzXrzD0K+LYexU9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/theme-monokai.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.js"></script>

<!-- Product js -->
<script src="<?= get_assets_uri("js/admin/product.js") ?>"></script>


<style id="css-header-bar">
    <?= load_css("product-admin") ?><?= load_css("modal-admin") ?>
</style>