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

function Detail(id) {
    var data;
    var settings = {
        "url": window.location.origin + "/api/v1/order/get/" + id,
        "method": "GET",
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        data = response;

        document.getElementById("user_name_order").innerText = data.orders[0].name;
        document.getElementById("price_ship").innerText = data.orders[0].shipping;
        document.getElementById("price_tax").innerText = (data.orders[0].total_amount / 1.05 * 0.05).toFixed(2);
        document.getElementById("price_total").innerText = data.orders[0].total_amount;
        document.getElementById("order_date").innerText = data.orders[0].order_date;

        var status = data.orders[0].status;

        // Lấy các phần tử trong HTML
        var step1 = document.getElementById('step1');
        var step2 = document.getElementById('step2');
        var step3 = document.getElementById('step3');
        var step4 = document.getElementById('step4');

        // Xác định trạng thái của mỗi bước và điều chỉnh lớp CSS và nội dung tương ứng
        if (status >= 1) {
            step1.classList.add('active');
        }

        if (status >= 2) {
            step2.classList.add('active');
        }

        if (status >= 3) {
            step3.classList.add('active');
        }

        if (status >= 4) {
            step4.classList.add('active');
        }

        const orderDetailsElement = document.querySelector('.card .card-body .card');

        // Xóa bản sao đầu tiên của card-body
        const clonedCardBody = orderDetailsElement.cloneNode(false);
        orderDetailsElement.parentNode.replaceChild(clonedCardBody, orderDetailsElement);

        // Lặp qua mỗi mục trong order_details và hiển thị thông tin
        data.order_details.forEach((detail) => {
            const cardBodyElement = document.createElement('div');
            cardBodyElement.classList.add('card-body');

            const rowElement = document.createElement('div');
            rowElement.classList.add('row');

            const imageColumnElement = document.createElement('div');
            imageColumnElement.classList.add('col-md-2');
            const imageElement = document.createElement('img');
            const images = detail.images;
            const firstImageName = images ? images.split(',')[0] : 'no-img.jpg';
            const imagePath = window.location.origin + '/uploads/' + firstImageName;
            imageElement.src = imagePath;
            imageElement.classList.add('img-fluid');
            imageColumnElement.appendChild(imageElement);
            rowElement.appendChild(imageColumnElement);

            const nameColumnElement = document.createElement('div');
            nameColumnElement.classList.add('col-md-6', 'text-center', 'd-flex', 'justify-content-center', 'align-items-center');
            const nameElement = document.createElement('p');
            nameElement.classList.add('text-muted', 'mb-0');
            nameElement.textContent = 'Name: ' + detail.name;
            nameColumnElement.appendChild(nameElement);
            rowElement.appendChild(nameColumnElement);

            const quantityColumnElement = document.createElement('div');
            quantityColumnElement.classList.add('col-md-2', 'text-center', 'd-flex', 'justify-content-center', 'align-items-center');
            const quantityElement = document.createElement('p');
            quantityElement.classList.add('text-muted', 'mb-0', 'small');
            quantityElement.textContent = 'Qty: ' + detail.quantity;
            quantityColumnElement.appendChild(quantityElement);
            rowElement.appendChild(quantityColumnElement);

            const priceColumnElement = document.createElement('div');
            priceColumnElement.classList.add('col-md-2', 'text-center', 'd-flex', 'justify-content-center', 'align-items-center');
            const priceElement = document.createElement('p');
            priceElement.classList.add('text-muted', 'mb-0', 'small');
            priceElement.textContent = '$' + detail.price;
            priceColumnElement.appendChild(priceElement);
            rowElement.appendChild(priceColumnElement);

            cardBodyElement.appendChild(rowElement);
            clonedCardBody.appendChild(cardBodyElement);
        });

    });

}