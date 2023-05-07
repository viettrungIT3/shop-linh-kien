<!-- Start container-fluid -->
<?php $categories = $params["categories"]['data'] ?>
<?php $products = $params["products"]['data'] ?>

<!-- style -->
<!-- CSS Summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<!-- CSS CodeMirror -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/blackboard.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-sm-10">
            <h2 class="header-title mb-3 fs-2" style="font-size: 2rem;">Products</h2>
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
                            <th class="d-none">Category id</th>
                            <th>Category</th>
                            <th class="d-none">Brand</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Sold</th>
                            <th>Inventory</th>
                            <th class="d-none">Size</th>
                            <th class="d-none">Weight</th>
                            <th class="d-none">Description</th>
                            <th class="d-none">Special features</th>
                            <th class="d-none">Gift info</th>
                            <th class="d-none">Warranty</th>
                            <th class="d-none">Created by</th>
                            <th class="d-none">Updated by</th>
                            <th class="d-none">Created at</th>
                            <th class="d-none">Update at</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $i = 0;
                        foreach ($products as $product) {
                            $i++;
                        ?>

                            <tr>
                                <td style="text-align: end;"><?= $i ?></td>
                                <td id="p-name-<?= $product->id ?>"><?= $product->name ?></td>
                                <td id="p-category_id-<?= $product->id ?>" class="d-none"><?= $product->category_id ?></td>
                                <td id="p-category_name-<?= $product->id ?>"><?= $product->category_name ?></td>
                                <td id="p-brand-<?= $product->id ?>" class="d-none"><?= $product->brand ?></td>
                                <td> <span id="p-image-<?= $product->id ?>" class="d-none"><?= $product->images ?></span>
                                    <img style="height: 50px;" src="<?php $arr  = explode(",", $product->images);
                                                                    echo (count($arr) > 0 ? get_uploads_file($arr[0]) : '') ?>" alt="">
                                </td>
                                <td id="p-price-<?= $product->id ?>"><?= $product->price ?></td>
                                <td id="p-sold_quantity-<?= $product->id ?>"><?= $product->sold_quantity ?></td>
                                <td id="p-total-<?= $product->id ?>"><?= $product->quantity - $product->sold_quantity ?></td>
                                <td id="p-size-<?= $product->id ?>" class="d-none"><?= $product->size ?></td>
                                <td id="p-weight-<?= $product->id ?>" class="d-none"><?= $product->weight ?></td>
                                <td id="p-desc-<?= $product->id ?>" class="d-none"><?= $product->description ?></td>
                                <td id="p-special_features-<?= $product->id ?>" class="d-none"><?= $product->special_features ?></td>
                                <td id="p-gift_info-<?= $product->id ?>" class="d-none"><?= $product->gift_info ?></td>
                                <td id="p-warranty-<?= $product->id ?>" class="d-none"><?= $product->warranty ?></td>
                                <td id="p-nameC-<?= $product->id ?>" class="d-none"><?= $product->name_of_created_by ?></td>
                                <td id="p-nameU-<?= $product->id ?>" class="d-none"><?= $product->name_of_updated_by ?></td>
                                <td id="p-timeC-<?= $product->id ?>" class="d-none"><?= $product->created_at ?></td>
                                <td id="p-timeU-<?= $product->id ?>" class="d-none"><?= $product->updated_at ?></td>
                                <td id="p-status-<?= $product->id ?>">
                                    <?= ($product->status == 1 ? '<button type="button" style="cursor:default;" class="btn btn-success" disabled>Showing</button>' : ($product->status == 0 ? '<button type="button" style="cursor:default;" class="btn btn-warning" disabled>Blocked</button>' :
                                        '<button type="button" style="cursor:default;" class="btn btn-danger" disabled>Deleted</button>')) ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" href="#detailProductModal" onclick="Detail(<?= $product->id ?>)" class="detail" data-toggle="modal" style="color: #fff;">
                                        <i class="far fa-eye" title="Detail"></i>
                                    </button>

                                    <?php if ($product->updated_by == $params["user_info"]['data'][0]->id || $product->role_id >= $params["user_info"]['data'][0]->role_id) { ?>
                                        <button type="button" class="btn btn-warning" href="#editProductModal" onclick="
                                            OpenModalEdit(<?= $product->id ?>, <?= $product->status ?>)" class="edit" data-toggle="modal" style="color: #fff;">
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
        <div class="modal-dialog modal-lg mt-5" style="max-width: 900px !important;">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <link href="<?= get_assets_uri("css/owl.carousel.css") ?>" rel="stylesheet" type="text/css" id="carousel-stylesheet">
                        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
                        <div class="pd-wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="card social-feed-box">
                                            <div class="card-body" style="margin: 0 !important; padding: 0 !important;">
                                                <div id="twitter-slider" class="carousel slide social-feed-slider" data-ride="carousel" style="margin: 0 !important; padding: 0 !important;">
                                                    <div class="carousel-inner" id="images-detail-slide" style="margin: 0 !important; padding: 0 !important;">
                                                        <!-- <div class="carousel-item active"  style="margin: 0 !important; padding: 0 !important;">
                                                            <div class="mt-3 mb-3" style="margin: 0 auto;display: flex;justify-content: center;">
                                                                <img src="http://shop.localhost.com:9292/uploads/00d9da0057ed4c1be7a3923b817dc3c8_1683429889.jpg" alt="" height="200">
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <div class="mt-3 mb-3" style="margin: 0 auto;display: flex;justify-content: center;">
                                                                <img src="http://shop.localhost.com:9292/uploads/0df11ca96b19fe4f8fe54fb40eb14632_1683429601.jpg" alt="" height="200">
                                                            </div>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <div class="mt-3 mb-3" style="margin: 0 auto;display: flex;justify-content: center;">
                                                                <img src="http://shop.localhost.com:9292/uploads/00d9da0057ed4c1be7a3923b817dc3c8_1683428668.jpg" alt="" height="200">
                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        
                                        <div id="images-detail">

                                        </div>

                                    </div>
                                    <div class="col-md-7">
                                        <div class="product-dtl">
                                            <div class="product-info">
                                                <h2>
                                                    <span id="name_detail"></span>
                                                    <span id="status_detail"></span>
                                                </h2>
                                                <div class="product-price-discount">
                                                    $<span id="price_detail"></span>
                                                    <span class="line-through">$...</span>
                                                </div>
                                            </div>
                                            <p></p>
                                            <div class="row">
                                                <table class="table table-hover table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Category</th>
                                                            <td><span id="category_name_detail"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Brand</th>
                                                            <td><span id="brand_detail"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Quantity stock</th>
                                                            <td><span id="total_detail"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Quantity sold</th>
                                                            <td><span id="sold_quantity_detail"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Size</th>
                                                            <td><span id="size_detail"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Weight</th>
                                                            <td><span id="weight_detail"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Created by</th>
                                                            <td><span id="cb_detail"></span> (<span id="ca_detail"></span>).</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Updated by</th>
                                                            <td><span id="ub_detail"></span> (<span id="ua_detail"></span>).</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info-tabs" style="min-height: 350px;">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="special_features_detail-tab" data-toggle="tab" href="#special_features_detail" role="tab" aria-controls="special_features_detail" aria-selected="false">Special features</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="gift_info_detail-tab" data-toggle="tab" href="#gift_info_detail" role="tab" aria-controls="gift_info_detail" aria-selected="false">Gift info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="warranty_detail-tab" data-toggle="tab" href="#warranty_detail" role="tab" aria-controls="warranty_detail" aria-selected="false">Warranty information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                            <span id="desc_detail"></span>
                                        </div>
                                        <div class="tab-pane fade" id="special_features_detail" role="tabpanel" aria-labelledby="special_features_detail-tab">
                                            <span id="special_features_detail"></span>
                                        </div>
                                        <div class="tab-pane fade" id="gift_info_detail" role="tabpanel" aria-labelledby="gift_info_detail-tab">
                                            <span id="gift_info_detail"></span>
                                        </div>
                                        <div class="tab-pane fade" id="warranty_detail" role="tabpanel" aria-labelledby="warranty_detail-tab">
                                            <span id="warranty_detail"></span>
                                        </div>
                                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                            <div class="review-heading">REVIEWS</div>
                                            <p>There are no reviews yet.</p>
                                            <div class="review-form">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <link href="<?= get_assets_uri("css/product.css") ?>" rel="stylesheet" type="text/css" id="product-stylesheet">
                        <script src="<?= get_assets_uri("js/owl.carousel.min.js") ?>"></script>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addProductModal" class="modal fade">
        <div class="modal-dialog modal-lg mt-5" style="max-width: 900px !important;">
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

                        <!-- Multiple File Upload -->
                        <link href="<?= get_assets_uri("css/Multiple-img-upload-preview.css") ?>" rel="stylesheet" type="text/css" id="multi-img-stylesheet">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Image: </label>
                                <div class="upload__box">
                                    <div class="upload__img-wrap"></div>
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p>Upload images</p>
                                            <input type="file" name="image[]" multiple data-max_length="20" class="upload__inputfile" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            jQuery(document).ready(function() {
                                ImgUpload();
                            });

                            function ImgUpload() {
                                var imgWrap = "";
                                var imgArray = [];

                                $('.upload__inputfile').each(function() {
                                    $(this).on('change', function(e) {
                                        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                                        var maxLength = $(this).attr('data-max_length');

                                        var files = e.target.files;
                                        var filesArr = Array.prototype.slice.call(files);
                                        var iterator = 0;
                                        filesArr.forEach(function(f, index) {

                                            if (!f.type.match('image.*')) {
                                                return;
                                            }

                                            if (imgArray.length > maxLength) {
                                                return false
                                            } else {
                                                var len = 0;
                                                for (var i = 0; i < imgArray.length; i++) {
                                                    if (imgArray[i] !== undefined) {
                                                        len++;
                                                    }
                                                }
                                                if (len > maxLength) {
                                                    return false;
                                                } else {
                                                    imgArray.push(f);

                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                                        imgWrap.append(html);
                                                        iterator++;
                                                    }
                                                    reader.readAsDataURL(f);
                                                }
                                            }
                                        });
                                    });
                                });

                                $('body').on('click', ".upload__img-close", function(e) {
                                    var file = $(this).parent().data("file");
                                    for (var i = 0; i < imgArray.length; i++) {
                                        if (imgArray[i].name === file) {
                                            imgArray.splice(i, 1);
                                            break;
                                        }
                                    }
                                    $(this).parent().parent().remove();
                                });
                            }
                        </script>

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
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
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
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
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
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
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
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                                    <input id="brand_add" class="col-4" type="text" class="form-control" placeholder="Enter brand..." required>
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


    <script>
        // open modal edit 
        function OpenModalEdit(id, status) {
            product_id = id;
            // var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
            // let images = document.getElementById("p-image-" + id).innerHTML;
            // var imgWrap = document.getElementById('upload__img-wrap_edit');
            // imgWrap.innerHTML = ''; // clear previous images
            // let arr_img = images.split(",");

            // if (arr_img.length > 0 && arr_img[0] != "") {

            //     arr_img.forEach(function(img) {
            //         var img_url = get_uploads_file(img);
            //         var html = "<div class='upload__img-box'><div style='background-image: url(" + img_url + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + img + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
            //         imgWrap.innerHTML += html;
            //     });
            // }

            document.getElementById("name_edit").value = document.getElementById("p-name-" + id).innerText;
            document.getElementById("category_edit").value = document.getElementById("p-category_id-" + id).innerText;
            document.getElementById("price_edit").value = document.getElementById("p-price-" + id).innerText;
            document.getElementById("quantity_edit").value = parseInt(document.getElementById("p-sold_quantity-" + id).innerText) + parseInt(document.getElementById("p-total-" + id).innerText);
            document.getElementById("weight_edit").value = document.getElementById("p-weight-" + id).innerText;
            document.getElementById("size_edit").value = document.getElementById("p-size-" + id).innerText;
            document.getElementById("in-brand_edit").value = document.getElementById("p-brand-" + id).innerText;

            $('#sn-desc_edit').summernote('code', document.getElementById("p-desc-" + id).innerHTML);
            $('#sn-special_features_edit').summernote('code', document.getElementById("p-special_features-" + id).innerHTML);
            $('#sn-gift_info_edit').summernote('code', document.getElementById("p-gift_info-" + id).innerHTML);
            $('#sn-warranty_edit').summernote('code', document.getElementById("p-warranty-" + id).innerHTML);

            if (status == 1) {
                document.getElementById('customRadioInline1').checked = true;
            }
            if (status == 0) {
                document.getElementById('customRadioInline2').checked = true;
            }
        }
    </script>
    <!-- Edit Modal HTML -->
    <div id="editProductModal" class="modal fade">
        <div class="modal-dialog modal-lg" style="max-width: 900px !important;">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-7">
                                <label>Name <span style="color: red;">(*)</span></label>
                                <input id="name_edit" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-5">
                                <label>Category <span style="color: red;">(*)</span></label>
                                <select class="custom-select mr-sm-2" id="category_edit">
                                    <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label>Price <span style="color: red;">(*)</span></label>
                                <input id="price_edit" type="number" class="form-control" step="0.01" min="0" required>
                            </div>
                            <div class="form-group col-3">
                                <label>Quantity <span style="color: red;">(*)</span></label>
                                <input id="quantity_edit" type="number" class="form-control" min="0" required>
                            </div>
                            <div class="form-group col-3">
                                <label>Weight</label>
                                <input id="weight_edit" type="number" class="form-control" step="0.01" min="0" required>
                            </div>
                            <div class="form-group col-3">
                                <label>Size</label>
                                <input id="size_edit" type="text" class="form-control" required>
                            </div>
                        </div>
                        <!-- Multiple File Upload -->
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Image: </label>
                                <div class="upload__box">
                                    <div class="upload__img-wrap_edit" id="upload__img-wrap_edit"></div>
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <p>Upload images</p>
                                            <input type="file" name="image2[]" multiple data-max_length="20" class="upload__inputfile_edit" style="opacity: 0;width: 0;height: 0;" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            jQuery(document).ready(function() {
                                ImgUploadEdit();
                            });

                            function ImgUploadEdit() {
                                var imgWrap = "";
                                var imgArray = [];

                                $('.upload__inputfile_edit').each(function() {
                                    $(this).on('change', function(e) {
                                        imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap_edit');
                                        var maxLength = $(this).attr('data-max_length');

                                        var files = e.target.files;
                                        var filesArr = Array.prototype.slice.call(files);
                                        var iterator = 0;
                                        filesArr.forEach(function(f, index) {

                                            if (!f.type.match('image.*')) {
                                                return;
                                            }

                                            if (imgArray.length > maxLength) {
                                                return false
                                            } else {
                                                var len = 0;
                                                for (var i = 0; i < imgArray.length; i++) {
                                                    if (imgArray[i] !== undefined) {
                                                        len++;
                                                    }
                                                }
                                                if (len > maxLength) {
                                                    return false;
                                                } else {
                                                    imgArray.push(f);

                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                                        imgWrap.append(html);
                                                        iterator++;
                                                    }
                                                    reader.readAsDataURL(f);
                                                }
                                            }
                                        });
                                    });
                                });

                                $('body').on('click', ".upload__img-close", function(e) {
                                    var file = $(this).parent().data("file");
                                    for (var i = 0; i < imgArray.length; i++) {
                                        if (imgArray[i].name === file) {
                                            imgArray.splice(i, 1);
                                            break;
                                        }
                                    }
                                    $(this).parent().parent().remove();
                                });
                            }
                        </script>
                        <div class="form-group" style="min-height: 321px;">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" id="desc_edit-tab" data-toggle="tab" href="#desc_edit" role="tab" aria-controls="desc_edit" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="special_features_edit-tab" data-toggle="tab" href="#special_features_edit" role="tab" aria-controls="special_features_edit" aria-selected="false">Special Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="gift_info_edit-tab" data-toggle="tab" href="#gift_info_edit" role="tab" aria-controls="gift_info_edit" aria-selected="false">Gift info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="warranty_edit-tab" data-toggle="tab" href="#warranty_edit" role="tab" aria-controls="warranty_edit" aria-selected="false">Warranty</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="brand_edit-tab" data-toggle="tab" href="#brand_edit" role="tab" aria-controls="brand_edit" aria-selected="false">Brand</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="desc_edit" role="tabpanel" aria-labelledby="desc_edit-tab">
                                    <textarea id="sn-desc_edit" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#sn-desc_edit').summernote({
                                                placeholder: 'Description...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
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
                                <div class="tab-pane fade" id="special_features_edit" role="tabpanel" aria-labelledby="special_features_edit-tab">
                                    <textarea id="sn-special_features_edit" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#sn-special_features_edit').summernote({
                                                placeholder: 'Special Features...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="gift_info_edit" role="tabpanel" aria-labelledby="gift_info_edit-tab">
                                    <textarea id="sn-gift_info_edit" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#sn-gift_info_edit').summernote({
                                                placeholder: 'Gift info...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="warranty_edit" role="tabpanel" aria-labelledby="warranty_edit-tab">
                                    <textarea id="sn-warranty_edit" name="editordata"></textarea>
                                    <script>
                                        $(document).ready(function() {
                                            $('#sn-warranty_edit').summernote({
                                                placeholder: 'Gift info...',
                                                toolbar: [
                                                    ['style', ['bold', 'italic', 'underline']],
                                                    ['para', ['ul', 'ol']],
                                                    ['codeview']
                                                ],
                                                height: 200,
                                                codemirror: {
                                                    theme: 'blackboard'
                                                }
                                            });
                                        })
                                    </script>
                                </div>
                                <div class="tab-pane fade" id="brand_edit" role="tabpanel" aria-labelledby="brand_edit-tab">
                                    <input id="in-brand_edit" class="col-4" type="text" class="form-control" placeholder="Enter brand..." required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status <span style="color: red;">(*)</span></label>
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

<!-- JS Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<!-- JS CodeMirror -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/xml/xml.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/js/bootstrap.bundle.js"></script>

<!-- Product js -->
<script src="<?= get_assets_uri("js/admin/product.js") ?>"></script>


<style id="css-header-bar">
    <?= load_css("product-admin") ?><?= load_css("modal-admin") ?>
</style>