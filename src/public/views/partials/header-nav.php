<nav class="wrapper nav-wrapper main-nav-wrapper" name="Main Nav">
    <div class="wrapper-inner">
        <ul class="list-unstyled list-inline" style="margin: 0;">
            <li class="dropdown dropdown-small">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">USD</a></li>
                    <li><a href="#">INR</a></li>
                    <li><a href="#">GBP</a></li>
                </ul>
            </li>

            <li class="dropdown dropdown-small">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                </ul>
            </li>
            <li>
                <div style="margin-right: 12px;">
                    <a href="<?= base_url("cart") ?>"  style="margin-right: 12px;">
                        <i class="fa fa-cart-plus"></i>
                        <span class="product-count"><?= $params["num_carts"] ?></span>
                    </a>
                    <a href="<?= base_url() ?>">
                        <i class="fa fa-bell"></i>
                        <span class="product-count">4</span>
                    </a>
                </div>
            </li>
        </ul>
    </div><!-- wrapper inner -->
</nav><!-- end of main nav wrapper -->