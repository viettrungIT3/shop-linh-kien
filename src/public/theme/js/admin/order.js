function ConfirmOrder(id, status) {
    console.log(id, status);
    status = status + 1;

    var orders = {
        "1": "Order Processing",
        "2": "Order Processed",
        "3": "Order Shipping",
        "4": "Order Complete"
    }
    

    var settings = {
        "url": window.location.origin + "/api/v1/order/" + id + "/change-status/" + status,
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        if (response.status == false || response.errors[0] == 'Insufficient quantity!') {
            alert(response.errors[0] + " Please update the stock quantity of the product with id = " + response.data.product_id);
        } else {
            alert(response.messages[0] + " Please check " + orders[status]);
            window.location.href = window.location.origin + "/admin/orders/" + status;
        }
    });
}