<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= get_assets_uri('images/favicon.ico') ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?php echo $styles; ?>

</head>

<body class="<?php echo $body_classes; ?>" <?php if (isset($is_ie) && $is_ie) : ?> data-browser='ie' <?php endif; ?>>
    <main id="page-wrapper">
        <?php
        $currentPage = basename($_SERVER['REQUEST_URI']);
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Lấy phần đường dẫn của URL
        $parts = explode('/', $path); // Tách đường dẫn thành các phần dựa trên ký tự '/'
        $verify = $parts[1]; // Lấy phần tử thứ 2

        if ($currentPage !== "login" && $currentPage !== "register" && $currentPage !== "forgot-password" && $verify != "verify") {
            $this->load->view("partials/header-bar");
        }
        ?>