<?php $product = $params["product"]['data'][0] ?>

<?php
// echo '<pre>';
// var_dump($product);
// echo '</pre>';
// die();
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <div class="product-content-right">
                <div class="product-breadcroumb">
                    <a href="">Home</a>
                    <a href="">Shop</a>
                    <a href="" class="single-line-ellipsis" title="<?= $product->name ?>"><?= $product->name ?></a></a>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="product-images">
                            <?php $arr  = explode(",", $product->images); ?>
                            <div class="product-main-img">
                                <img src="<?php echo ((count($arr) > 0 && $arr[0] != '') ? get_uploads_file($arr[0]) : get_uploads_file('/no-img.jpg')) ?>" alt="">
                            </div>

                            <div class="product-gallery">
                                <?php foreach ($arr as $img) { ?>

                                    <img src="<?php echo get_uploads_file($img) ?>" alt="">
                                <? } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="product-inner">
                            <h2 class="product-name"><?= $product->name ?></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-inner-price">
                                <ins>$<?= $product->price ?></ins> <del>$800.00</del>
                            </div>

                            <form action="" class="cart">
                                <div class="quantity">
                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <button class="add_to_cart_button" type="submit">Add to cart</button>
                            </form>
                            <div role="tabpanel">
                                <ul class="product-tab" role="tablist">
                                    <li role="presentation" class="active"> <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                    <li role="presentation"> <a href="#Special" aria-controls="Special" role="tab" data-toggle="tab">Special features</a></li>
                                    <li role="presentation"> <a href="#Gift" aria-controls="Gift" role="tab" data-toggle="tab">Gift info</a></li>
                                    <li role="presentation"> <a href="#Warranty" aria-controls="Warranty" role="tab" data-toggle="tab">Warranty information</a></li>
                                    <li role="presentation"> <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <h2>Product Description</h2>
                                        <p>
                                            <?= $product->description ?>
                                        </p>                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="Special">
                                        <p>
                                            <?= $product->special_features ?>
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="Gift">
                                        <p>
                                            <?= $product->gift_info ?>
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="Warranty">
                                        <p>
                                            <?= $product->warranty ?>
                                        </p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <h2>Reviews</h2>
                                        <div class="submit-review">
                                            <p><label for="name">Name</label> <input name="name" type="text"></p>
                                            <p><label for="email">Email</label> <input name="email" type="email"></p>
                                            <div class="rating-chooser">
                                                <p>Your rating</p>

                                                <div class="rating-wrap-post">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                            <p><input type="submit" value="Submit"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo (get_media_uri('product-1.jpg')); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">Sony Smart TV - 2015</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$700.00</ins> <del>$800.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo (get_media_uri('product-2.jpg')); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                <div class="product-carousel-price">
                                    <ins>$899.00</ins> <del>$999.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo (get_media_uri('product-3.jpg')); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">Apple new i phone 6</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo (get_media_uri('product-4.jpg')); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">Sony playstation microsoft</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$200.00</ins> <del>$225.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo (get_media_uri('product-5.jpg')); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">Sony Smart Air Condtion</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$1200.00</ins> <del>$1355.00</del>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo (get_media_uri('product-6.jpg')); ?>" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="">Samsung gallaxy note 4</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$400.00</ins>
                                </div>
                            </div>
                        </div>
                    </div> -->
            </div>

        </div>
    </div>
</div>