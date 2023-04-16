<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <?php echo $styles; ?>

    <style id="css-main-template">
        <?= load_css("core"); ?>
    </style>
</head>

<body class="<?php echo $body_classes; ?>" <?php if (isset($is_ie) && $is_ie) : ?> data-browser='ie' <?php endif; ?>>
    <main id="page-wrapper">
        <?php
        $currentPage = basename($_SERVER['REQUEST_URI']);
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Lấy phần đường dẫn của URL
        $parts = explode('/', $path); // Tách đường dẫn thành các phần dựa trên ký tự '/'
        $verify = $parts[1]; // Lấy phần tử thứ 2
        
        if ($currentPage !== "login" && $currentPage !== "register" && $verify != "verify") {
            $this->load->view("partials/header-bar");
        }
        ?>