let user_id = parseInt(document.getElementById("user_id").innerText);
let product_id;
let price;
let qty;

function Add1Cart(id, p) {
    product_id = id;
    price = p;
    qty = 1;
    senData();
}

function AddCart(id, p) {
    if (document.getElementById("qty-product") == null || document.getElementById("qty-product").value <= 0) {
        alert("Please enter a quantity!");
        return;
    }
    product_id = id;
    price = p;
    qty = parseInt(document.getElementById("qty-product").value);
    // console.log(qty);
    senData();
}

function customConfirm(message, btn1Text, btn2Text) {
    var confirmBox = $('<div>').css({
        'border': '1px solid #ccc',
        'background-color': '#f9f9f9',
        'padding': '20px',
        'width': '300px',
        'position': 'fixed',
        'z-index': '9999',
        'left': '50%',
        'top': '100px',
        'transform': 'translate(-50%, -50%)'
    });
    var messageBox = $('<p>').text(message).css({
        'font-size': '16px',
        'margin-bottom': '20px'
    });
    var btn1 = $('<button>').text(btn1Text).css({
        'background-color': '#4CAF50',
        'border': 'none',
        'color': 'white',
        'padding': '10px 20px',
        'text-align': 'center',
        'text-decoration': 'none',
        'display': 'inline-block',
        'font-size': '16px',
        'margin-right': '10px'
    }).on('click', function () {
        confirmBox.remove();
        window.location.href = window.location.origin + "/shop";
    });
    var btn2 = $('<button>').text(btn2Text).css({
        'background-color': '#f44336',
        'border': 'none',
        'color': 'white',
        'padding': '10px 20px',
        'text-align': 'center',
        'text-decoration': 'none',
        'display': 'inline-block',
        'font-size': '16px'
    }).on('click', function () {
        confirmBox.remove();
        window.location.href = window.location.origin + "/cart";
    });
    confirmBox.append(messageBox, btn1, btn2);
    $('body').append(confirmBox);
}

function senData() {
    var settings = {
        "url": "http://shop.localhost.com:9292/api/v1/cart/create",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json",
            "Cookie": document.cookie.replace(/(?:(?:^|.*;\s*)my_cookie\s*\=\s*([^;]*).*$)|^.*$/, "$1")
        },
        "data": JSON.stringify({
            "user_id": user_id,
            "product_id": product_id,
            "price": price,
            "qty": qty
        }),
    };

    $.ajax(settings).done(function (response) {
        console.log(response);

        // Show confirmation message and buttons
        customConfirm('The product has been added to the cart. Do you want to continue shopping or go to the cart?', 'Go to Shop', 'Go to Cart');
    });
}

function DeleteCart(u, p) {
    var settings = {
        "url": "http://shop.localhost.com:9292/api/v1/cart/delete/" + u + "/" + p,
        "method": "GET",
        "timeout": 0,
        "headers": {
            "Cookie": document.cookie.replace(/(?:(?:^|.*;\s*)my_cookie\s*\=\s*([^;]*).*$)|^.*$/, "$1")
        },
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
    });
}


/* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 0;
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change(function () {
    updateQuantity(this);
});

$('.product-removal button').click(function () {
    removeItem(this);
});


/* Recalculate cart */
function recalculateCart() {
    var subtotal = 0;

    /* Sum up row totals */
    $('.product').each(function () {
        if ($(this).find('input[type="checkbox"]').prop('checked')) {
            subtotal += parseFloat($(this).children('.product-line-price').text());
        }
    });

    /* Calculate totals */
    var tax = subtotal * taxRate;
    var shipping = (subtotal > 0 ? shippingRate : 0);
    var total = subtotal + tax + shipping;

    /* Update totals display */
    $('.totals-value').fadeOut(fadeTime, function () {
        $('#cart-subtotal').html(subtotal.toFixed(2));
        $('#cart-tax').html(tax.toFixed(2));
        $('#cart-shipping').html(shipping.toFixed(2));
        $('#cart-total').html(total.toFixed(2));
        if (total == 0) {
            $('.checkout').fadeOut(fadeTime);
        } else {
            $('.checkout').fadeIn(fadeTime);
        }
        $('.totals-value').fadeIn(fadeTime);
    });
}


/* Update quantity */
function updateQuantity(quantityInput) {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.product-price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.product-line-price').each(function () {
        $(this).fadeOut(fadeTime, function () {
            $(this).text(linePrice.toFixed(2));
            recalculateCart();
            $(this).fadeIn(fadeTime);
        });
    });
}


/* Remove item from cart */
function removeItem(removeButton) {
    /* Remove row from DOM and recalc cart total */
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function () {
        productRow.remove();
        recalculateCart();
    });
}

recalculateCart();


// select all
let checkAll = document.getElementById('check-all')
let otherCheckboxes = document.querySelectorAll('input[type=checkbox]:not(#check-all)')

checkAll.addEventListener('change', onCheckAllChange)
otherCheckboxes.forEach(input => input.addEventListener('change', onOtherCheckboxChange))

function onCheckAllChange() {
    otherCheckboxes.forEach((input) => input.checked = checkAll.checked)
    recalculateCart();
}

function onOtherCheckboxChange() {
    let allChecked = Array.from(otherCheckboxes).every(input => input.checked);
    checkAll.checked = allChecked;
    recalculateCart();
}

// checkout all check
function Checkout() {

    var carts = [];
    $('.product').each(function () {
        if ($(this).find('input[type="checkbox"]').prop('checked')) {
            carts.push($(this).find('input[type="checkbox"]').val());
        }
    });

    var encodedString = encodeURIComponent(carts);

    window.location.href = window.location.origin + "/checkout/" + encodedString;
}

