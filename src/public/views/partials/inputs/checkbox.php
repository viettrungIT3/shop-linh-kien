<?php echo $before ?? "";?>
    <!-- please set all vars as possible -->

<?php
$id = "input_{$name}";
if(isset($attributes['id'])):
    $id = $attributes['id'];
    unset($attributes['id']);
endif;
?>
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

            <div class="input-el-wrapper">
                <div class="input-el-inner">
                    <label class="control-label" for="input_<?php echo $name?>">
                        <input type="checkbox" 
                            name="<?php echo $name;?>"
                            value="<?php echo $value?>"
                            <?php if($value === ($attributes["value"] ?? "-1") || (int)$value === (int)($attributes['value'] ?? -1)):?> checked='checked' <?php endif;?>
                            id="<?php echo $id;?>" 
                            class="<?php echo $class ?? "";?>"
                                <?php 
                                if(isset($required) && $required): echo " required "; endif;
                                if(isset($disabled) && $disabled): echo " disabled "; endif;
                                if(isset($attributes) && !empty($attributes)):
                                    foreach($attributes as $_key => $a_value): echo "{$_key}='{$a_value}'"; endforeach;
                                endif;
                                ?>
                            />
                            <span class="label-text"><?php echo $label;?></span>
                    </label>
                    <span class="icon"></span>
                </div><!-- end of input el inner -->
            </div><!-- end of input el wrapper -->
        </div><!-- end of input inner <?php echo $name;?>-->
    </div><!-- end of input wrapper <?php echo $name?>-->
<?php echo $after ?? "";?>


