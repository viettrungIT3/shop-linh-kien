<?php echo $before ?? "";?>
    <!-- please set all vars as possible -->

    <div class="input-wrapper" >
        <div class="input-inner">
            <div class="input-el-wrapper">
                <div class="input-el-inner">
                    <label data-value="<?=$value?>" class="control-label"> 
                        <span class="label-text"><?=$label;?></span>
                    </label>
                    <span class="input-value"><?=$value;?></span>
                    <span class="icon"></span>
                </div><!-- end of input el inner -->
            </div><!-- end of input el wrapper -->
        </div><!-- end of input inner-->
    </div><!-- end of input wrapper -->
<?php echo $after ?? "";?>


