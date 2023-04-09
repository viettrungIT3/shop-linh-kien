<?php
$this->load->view("common/header"                       , $data);
$this->load->view("common/main_template"                , ["data" => $data]);
$this->load->view("common/footer"                       , $data);

