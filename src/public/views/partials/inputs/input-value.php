<?php echo $before ?? ""; ?>
    <!-- please set all vars as possible -->
    <div class="input-wrapper">
        <div class="input-inner">
            <label class="control-label"><?php echo $label;?></label>
            <div class="input-el-wrapper">
                <div class="input-el-inner">
                    <span class="input-value"><?=$value?></span>
                </div><!-- end of input el inner -->
            </div><!-- end of input el wrapper -->

        </div><!-- end of input inner -->
    </div><!-- end of input wrapper -->

<?php echo $after ?? "";?>


