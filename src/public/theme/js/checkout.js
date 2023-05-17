let user_id = parseInt(document.getElementById("user_id").innerText);

function Orders() {
    let name = document.getElementById("name").value;
    let country = document.getElementById("country").value;
    let city = document.getElementById("city").value;
    let county = document.getElementById("county").value;
    let address = document.getElementById("address").value;
    let street_address = document.getElementById("street_address").value;
    let zip = document.getElementById("zip").value;
    let phone = document.getElementById("phone").value;
    let total_amount = document.getElementById("total_amount").innerText;

    if (name === '' || country === 'select' || city === '' || county === '' || address === '' || street_address === '' || zip === '' || phone === '') {
        alert('Please enter full information!');
        return;
    }

    const url = window.location.href;
    const encodedString = url.substring(url.lastIndexOf('/') + 1);

    let decodedString = decodeURIComponent(encodedString);

    let orders = {
        "user_id": user_id,
        "name": name,
        "total_amount": total_amount,
        "address": street_address + "(" + address + ", " + county + ", " + city + ", " + country + ")",
        "phone_number": phone,
        "carts": decodedString.split(',')
    }

    var settings = {
        "url": window.location.origin + "/api/v1/order/create",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json"
        },
        "data": JSON.stringify(orders),
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        createAlert('', ' Successful order!', ' Your order is waiting for admin confirmation. You can check your Orders for details.', 'success', true, true, 'pageMessages');
        window.location.href = window.location.origin + '/order';
    });
}