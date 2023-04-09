<style id="css-datepicker">
    <?= load_css("node_modules/flatpickr/dist/flatpickr.min", false, true); ?>
</style>
<div id="dashboard-listing-filter" class="panel-wrapper filter-wrapper dashboard-filter-wrapper" data-type="data-table-filter">
    <div class="panel-inner">
        <div class="row">
		<?php
            $this->load->view("partials/inputs/input", [
                "value"     => genics_get_value($params ?? NULL, "input_start_date", "", FALSE),
                "type"      => "text",
                "class"     => "form-control datepicker",
                "name"      => "input_start_date",
                "label"     => "Start Date:",
                "before"    => "<div class='col-md-5 form-group'>",
                "after"     => "</div>",
                "attributes" => []

            ]);
            ?>
            <?php
            $this->load->view("partials/inputs/input", [
                "value"     => genics_get_value($params ?? NULL, "input_end_date", "", FALSE),
                "type"      => "text",
                "class"     => "form-control datepicker",
                "name"      => "input_end_date",
				"label"     => "End Date:",
                "before"    => "<div class='col-md-5 form-group'>",
                "after"     => "</div>",
                "attributes" => []

            ]);
            ?>

        </div><!-- row -->
        <!--row for keyword and button-->
        <div class="row">
            <span class="col-md-12">
                <a href="#" class="btn-submit btn btn-primary" data-type="btn-submit"><span class='fa fa-filter'></span> Go</a>
                <a href="#" class="btn-clear btn btn-default" data-type="btn-clear"><span class='fa fa-times-circle'></span> Reset</a>
            </span>
        </div><!--second row-->
    </div><!-- wrapper inner -->
</div><!-- end of filter wrapper -->


<script type="module">


    import {Theme} from "<?=get_script_uri('controllers/theme')?>";

    let flat_picker_path = "<?= get_script_uri("../node_modules/flatpickr/dist/flatpickr.min"); ?>",
        theme_controller = new Theme();

    theme_controller.load_script(flat_picker_path);
    document.addEventListener("flat-picker-ready", () => {

        flatpickr(".datepicker", {
            "dateFormat": "Y-m-d",
            "allowInput": true,
            "onOpen": function(selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            }
        });

    });

</script>
