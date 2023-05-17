function ConfirmOrderClient(id, status) {
    status = status + 1;

    var settings = {
        "url": window.location.origin + "/api/v1/order/" + id + "/change-status/" + status,
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        if (response.status == false || response.errors[0] == 'Insufficient quantity!') {
            alert(response.errors[0] + " Please update the stock quantity of the product with id = " + response.data.product_id);
        } else {
            alert("Your order has been completed successfully, thank you <3");
            // Tải lại trang
            location.reload();

        }
    });
}