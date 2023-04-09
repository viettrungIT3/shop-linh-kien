<?php
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename={$data['params']['file_name']}");
header("Pragma: no-cache");
header("Expires: 0");
    $this->load->view($data['params']['main_template']      , $data);
