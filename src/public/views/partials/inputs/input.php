<?php echo $before ?? ""; ?>
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
            <label class="control-label" for="<?php echo $id?>"><?php echo $label;?></label>
            <div class="input-el-wrapper">
                <div class="input-el-inner">
                    <input 

                                <?php 
                                if(isset($required) && $required): echo " required "; endif;
                                if(isset($disabled) && $disabled): echo " disabled "; endif;
                                if(isset($attributes) && !empty($attributes)):
                                    foreach($attributes as $_key => $a_value): echo "{$_key}='{$a_value}'"; endforeach;
                                endif;
                                ?>
                            data-current-value="<?php echo is_array($value)?$value[0]:$value;?>"
                            type="<?php echo $type;?>" value="<?php echo is_array($value)?$value[0]:$value;?>" name="<?php echo $name;?>" 
                            id="<?php echo $id;?>"
                            placeholder = "<?php if(isset($placeholder) && $placeholder): echo $placeholder;endif; ?>"
                            class="<?php echo $class ?? "";?>"/>
                    <span class="icon">
                    <?php 
                        switch($type):

                            case "tel":
                                echo "<span class='far fa-phone'></span>"; 
                                break;

                            case "email":
                                echo "<span class='far fa-envelope'></span>"; 
                                break;

                            default:
                                if(strpos($class, "datepicker") > -1) echo "<span class='far fa-calendar-alt'></span>"; 

                        endswitch;
                    ?>
                    </span>
                </div><!-- end of input el inner -->
            </div><!-- end of input el wrapper -->

            <?php if(isset($attributes['note']) && !empty($attributes['note'])):?>
                <div class="note"><?php echo $attributes['note'];?></div>
            <?php endif;?>
        </div><!-- end of input inner <?php echo $name;?>-->
    </div><!-- end of input wrapper <?php echo $name?>-->

<?php echo $after ?? "";?>


