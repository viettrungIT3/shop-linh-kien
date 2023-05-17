<?php $products_top5new = $params["products_top5new"]['data'];

// echo '<pre>';
// var_dump($products_top5new);
// die();
?>

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

<div class="wrapper main-page-wrapper">

    <div class="wrapper-inner">

        <!-- <div class="slider-area">
            <div class="zigzag-bottom"></div>
            <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">

                <div class="slide-bulletz">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="carousel-indicators slide-indicators">
                                    <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                    <li data-target="#slide-list" data-slide-to="1"></li>
                                    <li data-target="#slide-list" data-slide-to="2"></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="single-slide">
                            <div class="slide-bg slide-one"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>We are awesome</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, dolorem, excepturi. Dolore aliquam quibusdam ut quae iure vero exercitationem ratione!</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ab molestiae minus reiciendis! Pariatur ab rerum, sapiente ex nostrum laudantium.</p>
                                                    <a href="" class="readmore">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-slide">
                            <div class="slide-bg slide-two"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>We are great</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, dolorum harum molestias tempora deserunt voluptas possimus quos eveniet, vitae voluptatem accusantium atque deleniti inventore. Enim quam placeat expedita! Quibusdam!</p>
                                                    <a href="" class="readmore">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-slide">
                            <div class="slide-bg slide-three"></div>
                            <div class="slide-text-wrapper">
                                <div class="slide-text">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-6">
                                                <div class="slide-content">
                                                    <h2>We are superb</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eius?</p>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptates necessitatibus dicta recusandae quae amet nobis sapiente explicabo voluptatibus rerum nihil quas saepe, tempore error odio quam obcaecati suscipit sequi.</p>
                                                    <a href="" class="readmore">Learn more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
        <!-- End slider area -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
        <link href="<?= get_assets_uri("css/Carousel-with-Swiper.css") ?>" rel="stylesheet" type="text/css" id="slider-swiper-stylesheet">
        <section class="section slider-section">
            <div class="container slider-column">
                <div class="swiper swiper-slider">
                    <div class="swiper-wrapper">
                        <img class="swiper-slide" src="https://promotions.newegg.com/nepro/23-0612/1920x660.jpg" alt="Swiper">
                        <img class="swiper-slide" src="https://promotions.newegg.com/msi/23-0621/1920x660.png" alt="Swiper">
                        <img class="swiper-slide" src="https://promotions.newegg.com/samsung/21-2378/1920x660.jpg" alt="Swiper">
                        <img class="swiper-slide" src="https://promotions.newegg.com/nepro/23-0588/1920x660.jpg" alt="Swiper">
                        <img class="swiper-slide" src="https://promotions.newegg.com/nepro/22-2297/1920x660.jpg" alt="Swiper">
                        <!-- <img class="swiper-slide" src="https://source.unsplash.com/1920x1280/?fruits" alt="Swiper"> -->
                    </div>
                    <span class="swiper-pagination"></span>
                    <span class="swiper-button-prev"></span>
                    <span class="swiper-button-next"></span>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="<?= get_assets_uri("js/Carousel-with-Swiper.js") ?>"></script>

        <div class="promo-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo">
                            <i class="fa fa-refresh"></i>
                            <p>30 Days return</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo">
                            <i class="fa fa-truck"></i>
                            <p>Free shipping</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo">
                            <i class="fa fa-lock"></i>
                            <p>Secure payments</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-promo">
                            <i class="fa fa-gift"></i>
                            <p>New products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End promo area -->

        <!-- <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-product">
                            <h2 class="section-title">Latest Products</h2>
                            <div class="product-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo (get_media_uri('product-1.jpg')); ?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="single-product" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$800.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo (get_media_uri('product-2.jpg')); ?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="single-product" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo (get_media_uri('product-3.jpg')); ?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="single-product" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo (get_media_uri('product-4.jpg')); ?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="single-product" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo (get_media_uri('product-5.jpg')); ?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="single-product" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo (get_media_uri('product-6.jpg')); ?>" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="single-product" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="single-product">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->
        <!-- End main content area -->

        <!-- <div class="brands-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-wrapper">
                            <h2 class="section-title">Brands</h2>
                            <div class="brand-list">
                                <img src="<?php echo (get_media_uri('services_logo__1.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__2.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__3.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__4.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__1.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__2.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__3.jpg')); ?>" alt="">
                                <img src="<?php echo (get_media_uri('services_logo__4.jpg')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  -->
        <!-- End brands area -->

        <div class="product-widget-area">
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Top Sellers</h2>
                            <a href="" class="wid-view-more">View All</a>
                            <div class="single-wid-product">
                                <a href="single-product"><img src="<?php echo (get_media_uri('product-thumb-1.jpg')); ?>" alt="" class="product-thumb"></a>
                                <h2><a href="single-product">Sony Smart TV - 2015</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product"><img src="<?php echo (get_media_uri('product-thumb-2.jpg')); ?>" alt="" class="product-thumb"></a>
                                <h2><a href="single-product">Apple new mac book 2015</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product"><img src="<?php echo (get_media_uri('product-thumb-3.jpg')); ?>" alt="" class="product-thumb"></a>
                                <h2><a href="single-product">Apple new i phone 6</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Recently Viewed</h2>
                            <a href="#" class="wid-view-more">View All</a>
                            <div class="single-wid-product">
                                <a href="single-product"><img src="<?php echo (get_media_uri('product-thumb-4.jpg')); ?>" alt="" class="product-thumb"></a>
                                <h2><a href="single-product">Sony playstation microsoft</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product"><img src="<?php echo (get_media_uri('product-thumb-1.jpg')); ?>" alt="" class="product-thumb"></a>
                                <h2><a href="single-product">Sony Smart Air Condtion</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                            <div class="single-wid-product">
                                <a href="single-product"><img src="<?php echo (get_media_uri('product-thumb-2.jpg')); ?>" alt="" class="product-thumb"></a>
                                <h2><a href="single-product">Samsung gallaxy note 4</a></h2>
                                <div class="product-wid-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-wid-price">
                                    <ins>$400.00</ins> <del>$425.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-product-widget">
                            <h2 class="product-wid-title">Top New</h2>
                            <a href="#" class="wid-view-more">View All</a>

                            <?php $i = 0;
                            foreach ($products_top5new as $product) {
                                $i++;
                                if ($i == 4) break;
                            ?>
                                <div class="single-wid-product row">
                                    <a href="single-product col-4 col-sm-4"><img src="<?php $arr  = explode(",", $product->images);
                                                                        echo (count($arr) > 0 ? get_uploads_file($arr[0]) : get_uploads_file('no-img.jpg')) ?>" alt="" class="product-thumb"></a>
                                    <div class="col-8 col-sm-8 ">
                                        <h2>
                                            <a href="<?= base_url("/single-product/" . $product->id)?>" class="single-line-ellipsis" title="<?= $product->name ?>"><?= $product->name ?></a>
                                        </h2>
                                        <div class="product-wid-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-wid-price">
                                            <ins>$<?= $product->price ?></ins> <del>$425.00</del>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End product widget area -->

    </div><!-- wrapper inner -->

</div><!-- end of main page wrapper -->

<!-- script -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>