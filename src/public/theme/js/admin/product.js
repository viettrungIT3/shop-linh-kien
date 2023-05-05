let user_id = parseInt(document.getElementById("user_id").innerText);
let user_role_id = parseInt(document.getElementById("user_role_id").innerText);
let product_id;
function ProductID(id, status) {
    product_id = id, status;
    console.log(status);
    if (status == 1) {
        document.getElementById('customRadioInline1').checked = true;
    }
    if (status == 0) {
        document.getElementById('customRadioInline2').checked = true;
    }
}

// add product
function AddProduct() {
    let name_add = document.getElementById("name_add").value;
    let category_add = document.getElementById("category_add").value;
    let price_add = document.getElementById("price_add").value;
    let quantity_add = document.getElementById("quantity_add").value;
    let weight_add = document.getElementById("weight_add").value;
    let size_add = document.getElementById("size_add").value;
    let description = document.getElementById("summernote").value;
    let special_features = document.getElementById("summernote2").value;
    let gift_info = document.getElementById("summernote3").value;
    let warranty = document.getElementById("summernote4").value;
    let brand = document.getElementById("brand").value;

    var settings = {
        "url": "http://shop.localhost.com:9292/api/v1/product/create",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json",
            "Cookie": "lskafi_9w98zad=573b60d7f90e20fa3aa11e04e1a0b75b91dd4b19"
        },
        "data": JSON.stringify({
            "user_id": user_id,
            "category_id": category_add,
            "name": name_add,
            "price": price_add,
            "description": description,
            "brand": brand,
            "warranty": warranty,
            "gift_info": gift_info,
            "quantity": quantity_add,
            "size": size_add,
            "weight": weight_add,
            "special_features": special_features
        }),
    };

    $.ajax(settings).done(function (response) {
        alert('Create product successful!');
        window.location.reload();
    });
}

// Detail product
function Detail(id) {
    document.getElementById("name_detail").innerHTML = document.getElementById("ca-name-" + id).innerText;
    document.getElementById("desc_detail").innerHTML = document.getElementById("ca-desc-" + id).innerText;
    document.getElementById("total_detail").innerHTML = document.getElementById("ca-total-" + id).innerText;
    document.getElementById("cb_detail").innerHTML = document.getElementById("ca-nameC-" + id).innerText;
    document.getElementById("ub_detail").innerHTML = document.getElementById("ca-nameU-" + id).innerText;
    document.getElementById("ca_detail").innerHTML = document.getElementById("ca-timeC-" + id).innerText;
    document.getElementById("ua_detail").innerHTML = document.getElementById("ca-timeU-" + id).innerText;
    document.getElementById("status_detail").innerHTML = document.getElementById("ca-status-" + id).innerText;
}

// edit product
function EditProduct() {
    let name_edit = document.getElementById("name_edit").value;
    let desc_edit = document.getElementById("desc_edit").value;
    let status_edit = document.querySelector('input[name="editRadio"]:checked').value;

    if (name_edit.trim() === "") {
        alert("Cannot be left blank for input name!");
        return;
    }

    let data = {
        "user_id": user_id,
        "id": product_id,
        "name": name_edit.trim(),
        "description": desc_edit.trim(),
        "status": parseInt(status_edit)
    }
    // console.log(data);
    sendToServer(data);
}

// send data for edit and deltete /
function sendToServer(data) {

    $.ajax({
        type: "POST",
        url: window.location.origin + "/api/v1/product/update",
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (dataSuccess) {
            alert(dataSuccess['messages'][0]);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            alert("Product update failed!");
            console.error("Error sending data:", error);
        }
    });
}

// delete product
function DeleteProduct() {
    let data = {
        "user_id": user_id,
        "id": product_id,
        "status": 2
    }
    // console.log(data);
    sendToServer(data);
}