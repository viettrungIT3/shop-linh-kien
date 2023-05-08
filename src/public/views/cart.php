<?php $carts = $params["carts"]['data'] ?>

<?php
// echo '<pre>';
// var_dump(($carts));
// echo '</pre>';
// die();
?>


<link href="<?= get_assets_uri("css/cart.css") ?>" rel="stylesheet" type="text/css" id="cart-stylesheet">

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="shopping-cart">

                <div class="column-labels">
                    <label class="product-image">Image</label>
                    <label class="product-details">Product</label>
                    <label class="product-price">Price</label>
                    <label class="product-quantity">Quantity</label>
                    <label class="product-removal">Remove</label>
                    <label class="product-line-price">Total</label>
                </div>

                <?php foreach ($carts as $cart) { ?>
                    <div class="product">
                        <div class="product-image">
                            <img src="<?php $arr  = explode(",", $cart->images);
                                        echo ((count($arr) > 0 && $arr[0] != '') ? get_uploads_file($arr[0]) : get_uploads_file('/no-img.jpg')) ?>">
                        </div>
                        <div class="product-details">
                            <div class="product-title"><?= $cart->name ?></div>
                            <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
                        </div>
                        <div class="product-price"><?= $cart->product_price ?></div>
                        <div class="product-quantity">
                            <input type="number" value="<?= $cart->qty ?>" min="1">
                        </div>
                        <div class="product-removal">
                            <button class="remove-product">
                                Remove
                            </button>
                        </div>
                        <div class="product-line-price">25.98</div>
                    </div>

                <?php } ?>

                <div class="product">
                    <div class="product-image">
                        <img src="https://s.cdpn.io/3/large-NutroNaturalChoiceAdultLambMealandRiceDryDogFood.png">
                    </div>
                    <div class="product-details">
                        <div class="product-title">Nutro™ Adult Lamb and Rice Dog Food</div>
                        <p class="product-description">Who doesn't like lamb and rice? We've all hit the halal cart at 3am while quasi-blackout after a night of binge drinking in Manhattan. Now it's your dog's turn!</p>
                    </div>
                    <div class="product-price">45.99</div>
                    <div class="product-quantity">
                        <input type="number" value="1" min="1">
                    </div>
                    <div class="product-removal">
                        <button class="remove-product">
                            Remove
                        </button>
                    </div>
                    <div class="product-line-price">45.99</div>
                </div>

                <div class="totals">
                    <div class="totals-item">
                        <label>Subtotal</label>
                        <div class="totals-value" id="cart-subtotal">71.97</div>
                    </div>
                    <div class="totals-item">
                        <label>Tax (5%)</label>
                        <div class="totals-value" id="cart-tax">3.60</div>
                    </div>
                    <div class="totals-item">
                        <label>Shipping</label>
                        <div class="totals-value" id="cart-shipping">15.00</div>
                    </div>
                    <div class="totals-item totals-item-total">
                        <label>Grand Total</label>
                        <div class="totals-value" id="cart-total">90.57</div>
                    </div>
                </div>

                <button class="checkout">Checkout</button>

            </div>
        </div>
    </div>
</div>




<!-- cart -->
<script src="<?= get_assets_uri("js/cart.js") ?>"></script>