<?php
    $currentPage = basename($_SERVER['REQUEST_URI']);
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Lấy phần đường dẫn của URL
    $parts = explode('/', $path); // Tách đường dẫn thành các phần dựa trên ký tự '/'
    $verify = $parts[1]; // Lấy phần tử thứ 2

    // var_dump($verify); die();

    if ($verify == "admin") {
        $this->load->view("common/admin/header"                       , $data);
        $this->load->view("common/admin/main_template"                , ["data" => $data]);
        $this->load->view("common/admin/footer"                       , $data);
    } else {
        $this->load->view("common/header"                       , $data);
        $this->load->view("common/main_template"                , ["data" => $data]);
        $this->load->view("common/footer"                       , $data);
    }
?>
