<!-- Start container-fluid -->

<?php $categories = $params["categories"]['data'] ?>
<div class="container-fluid">

    <!-- start  -->
    <div class="row">
        <div class="col-12">
            <div>
                <h4 class="header-title mb-3">Categories</h4>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="mt-5">

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($categories as $category) { ?>

                            <tr>
                                <td><?= $category->id ?></td>
                                <td><?= $category->name ?></td>
                                <td><?= $category->description ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                    <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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