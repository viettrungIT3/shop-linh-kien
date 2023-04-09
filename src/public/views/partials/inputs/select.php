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
        id="df_<?php echo $name;?>"
        class="input-wrapper
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
                    <div class="select-wrapper">

                        <select 
                            <?php if(isset($disabled) && $disabled): echo " disabled "; endif;?>
                            id="<?php echo $id;?>"
                            class="<?php echo $class;?>" name="<?php echo $name?>" 
                            data-current-value="<?php echo is_array($value)?$value[0]:$value;?>"
                                <?php 
                                if(isset($required) && $required): echo " required "; endif;
                                if(isset($attributes) && !empty($attributes)):
                                    foreach($attributes as $_key => $a_value): echo "{$_key}='{$a_value}'"; endforeach;
                                endif;
                                ?>
                        >
                        <?php if(isset($options) && !empty($options)): 
                                    foreach($options as $o_key => $single_option):
                                        echo "<option value='{$o_key}' " .( (is_array($value)?$value[0]:$value) === $o_key || (int)(is_array($value)?$value[0]:$value) === (int)$o_key ? ' selected ' : ''). " >{$single_option}</option>";
                                    endforeach;
                                endif;?>
                         </select>
                        <span class="icon"><em class="fa fa-chevron-down"></em></span>
                        <span class="icon-loading"><em class="fa fa-spin fa-spinner"></em></span>
                    </div>
                </div><!-- end of input el inner -->
            </div><!-- end of input el wrapper -->

            <?php if(isset($attributes['note']) && !empty($attributes['note'])):?>
                <div class="note"><?php echo $attributes['note'];?></div>
            <?php endif;?>
        </div><!-- end of input inner <?php echo $name;?>-->
    </div><!-- end of input wrapper <?php echo $name?>-->
<?php echo $after ?? "";?>
