<?php echo $before ?? "";?>
<?php
$id = "input_{$name}";
if(isset($attributes['id'])):
    $id = $attributes['id'];
    unset($attributes['id']);
endif;
?>
    <!-- please set all vars as possible -->
    <div
        id="df_<?php echo $name;?>" class="input-wrapper
        <?php
            if(
                    isset(
                        $params['validation']['validation_errors'][$name]['error'])
                    && !empty($params['validation']['validation_errors'][$name]['error'])
            ):?>
                has-error
            <?php endif;?>
    ">
        <div class="input-inner">
            <label class="control-label" for="input_<?php echo $name?>"><?php echo $label;?></label>
            <div class="input-el-wrapper">
                <div class="input-el-inner">
                    <textarea
                            <?php
                                if(isset($required) && $required): echo " required "; endif;
                                if(isset($disabled) && $disabled): echo " disabled "; endif;
                                if(isset($attributes) && !empty($attributes)):
                                    foreach($attributes as $_key => $a_value): echo "{$_key}='{$a_value}'"; endforeach;
                                endif;
                            ?>
                            rows="<?php  if(isset($rows) && $rows): echo $rows; endif;?>"
                            cols="<?php if(isset($cols) && $cols): echo $cols; endif;?>"
                            name="<?php if(isset($name) && $name): echo $name; endif;?>"
                            id="<?php if(isset($id) && $id): echo $id; endif;?>"
                            class="<?php echo $class ?? "";?>"><?php echo is_array($value)?$value[0]:$value;?></textarea>
                    <span class="icon"></span>
                </div><!-- end of input el inner -->
            </div><!-- end of input el wrapper -->

            <?php if(isset($attributes['note']) && !empty($attributes['note'])):?>
                <div class="note"><?php echo $attributes['note'];?></div>
            <?php endif;?>
        </div><!-- end of input inner <?php echo $name;?>-->
    </div><!-- end of input wrapper <?php echo $name?>-->
<?php echo $after ?? "";?>


