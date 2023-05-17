<?php
$categories = $params["categories"]['data'];
?>

<style id="css-header-bar">
    <?= load_css("main-nav") ?>
</style>
<style id="css-responsive">
    <?= load_css("style"); ?>
</style>
<style id="css-owl-carousel">
    <?= load_css("owl.carousel"); ?>
</style>
<style id="css-responsive">
    <?= load_css("responsive"); ?>
</style>
<style>
    .slide-one {
        background-image: url("<?php echo (get_media_uri('slide-1.jpg')); ?>");
    }

    .slide-two {
        background-image: url("<?php echo (get_media_uri('slide-2.jpg')); ?>");
    }

    .slide-three {
        background-image: url("<?php echo (get_media_uri('slide-3.jpg')); ?>");
    }

    .product-big-title-area {
        background: url("<?php echo (get_media_uri('crossword.png')); ?>") repeat scroll 0 0 #1ABC9C;
    }
</style>

<div class="shop">
    <div class="wrapper-inner">

        <div class="user-login">
            <div class="container">

                <div class="container-head">
                    <?php $this->load->view("partials/icons/logo") ?>

                    <div class="container-nav">
                        <?php $this->load->view("partials/header-nav") ?>

                        <?php if (isset($params['user'])) { ?>
                            <span style="display: none;" id="user_id"><?= $params['user']->id ?></span>
                            <button type="button" class="btn btn-outline-danger"><a href="/logout">Logout</a></button>
                        <?php } else { ?>
                            <button type="button" class="btn btn-outline-primary"><a href="/register">Register</a></button>
                            <button type="button" class="btn btn-outline-primary"><a href="/login">Log in</a></button>
                        <?php } ?>
                    </div>

                </div>
            </div>

        </div><!-- end of wrapper inner -->


    </div><!-- end of header bar wrapper -->


    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" style="flex-direction: row;">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php foreach ($categories as $category) { ?>
                                <li><a href="<?= base_url("shop/" . $category->id) ?>"><?= $category->name; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="<?= base_url("shop") ?>">Shop page</a></li>
                        <li><a href="<?= base_url("cart") ?>">Cart</a></li>
                        <li><a href="<?= base_url("order") ?>">Others</a></li>
                        <li><a href="<?= base_url() ?>">Blog</a></li>
                        <li><a href="<?= base_url("contact") ?>">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->