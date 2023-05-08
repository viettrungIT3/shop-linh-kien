let user_id = parseInt(document.getElementById("user_id").innerText);
let product_id;
let price;
let qty;

function Add1Cart(id,p) {
    product_id = id;
    price = p;
    qty = 1;
    senData();
}

function AddCart(id,p) {
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
        'position': 'absolute',
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
    }).on('click', function() {
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
    }).on('click', function() {
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
