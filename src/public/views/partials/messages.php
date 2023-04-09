
    <?php
    if(isset($params['error_message']) && !empty($params['error_message'])):
    ?>

        <div class="message red">
            <div class="message-inner">
                <p><?php echo $params['error_message']?></p>
            </div>
        </div>

    <?php
    endif;



    if(isset($params['messages']) && !empty($params['messages'])):
        echo $params['messages'];
    endif;
    if(isset($params['errors']) && !empty($params['errors'])):
        echo $params['errors'];
    endif;
