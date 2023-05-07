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
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="shop">Shop page</a></li>
                        <li><a href="single-product">Single product</a></li>
                        <li><a href="cart">Cart</a></li>
                        <li><a href="checkout">Checkout</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> <!-- End mainmenu area -->