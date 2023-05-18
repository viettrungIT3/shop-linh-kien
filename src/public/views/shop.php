<?php $products = $params["products"]['data'] ?>

<?php
// echo '<pre>';
// var_dump($products);
// echo '</pre>';
// die();
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop <?= $params["category_name"] ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <?php $i = 0;
            foreach ($products as $product) {
                $i++;
                if ($i == 31) break;
            ?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php $arr  = explode(",", $product->images);
                                        echo ((count($arr) > 0 && $arr[0] != '') ? get_uploads_file($arr[0]) : get_uploads_file('/no-img.jpg')) ?>" alt="">
                        </div>
                        <h2>
                            <a href="<?= base_url("/single-product/" . $product->id) ?>" class="single-line-ellipsis" title="<?= $product->name ?>"><?= $product->name ?></a>
                        </h2>

                        <div class="row">
                            <div class="product-carousel-price col-6 col-sm-6">
                                <ins>$<?= $product->price ?></ins> <del>$999.00</del>
                            </div>

                            <div class="product-option-shop col-6 col-sm-6">
                                <a class="add_to_cart_button" onclick="Add1Cart(<?= ($product->id . ',' . $product->price) ?>)">Add cart</a>
                            </div>
                        </div>

                    </div>
                </div>

            <? } ?>

        </div>
    </div>
</div>


<!-- cart -->
<script src="<?= get_assets_uri("js/cart.js") ?>"></script>