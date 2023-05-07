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
    let brand = document.getElementById("brand_add").value;
    var settings = {
        "url": window.location.origin + "/api/v1/product/create",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json",
            "Cookie": document.cookie
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

    console.log(settings);

    $.ajax(settings).done(function (response) {
        product_id = response.data[0].id;
        uploadImage(product_id);
        alert('Create product successful!');
        // window.location.reload();
    });

}

function uploadImage(product_id) {
    var files = $('input[name="image[]"]').prop('files');
    var formData = new FormData();
    $.each(files, function (key, value) {
        formData.append('image[]', value);
    });
    formData.append('product_id', product_id);

    $.ajax({
        url: window.location.origin + '/api/v1/product_images/create',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            window.location.reload();
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    })
}

// Detail product
function Detail(id) {
    console.log(id);
    document.getElementById("name_detail").innerHTML = document.getElementById("p-name-" + id).innerText;
    document.getElementById("category_name_detail").innerHTML = document.getElementById("p-category_name-" + id).innerText;
    document.getElementById("brand_detail").innerHTML = document.getElementById("p-brand-" + id).innerText;
    document.getElementById("price_detail").innerHTML = document.getElementById("p-price-" + id).innerText;
    document.getElementById("sold_quantity_detail").innerHTML = document.getElementById("p-sold_quantity-" + id).innerText;
    document.getElementById("total_detail").innerHTML = document.getElementById("p-total-" + id).innerText;
    document.getElementById("size_detail").innerHTML = document.getElementById("p-size-" + id).innerText;
    document.getElementById("weight_detail").innerHTML = document.getElementById("p-weight-" + id).innerText;
    document.getElementById("desc_detail").innerHTML = document.getElementById("p-desc-" + id).innerText;
    document.getElementById("special_features_detail").innerHTML = document.getElementById("p-special_features-" + id).innerText;
    document.getElementById("gift_info_detail").innerHTML = document.getElementById("p-gift_info-" + id).innerText;
    document.getElementById("warranty_detail").innerHTML = document.getElementById("p-warranty-" + id).innerText;
    document.getElementById("cb_detail").innerHTML = document.getElementById("p-nameC-" + id).innerText;
    document.getElementById("ub_detail").innerHTML = document.getElementById("p-nameU-" + id).innerText;
    document.getElementById("ca_detail").innerHTML = document.getElementById("p-timeC-" + id).innerText;
    document.getElementById("ua_detail").innerHTML = document.getElementById("p-timeU-" + id).innerText;
    document.getElementById("status_detail").innerHTML = document.getElementById("p-status-" + id).innerHTML;

    let images = document.getElementById("p-image-" + id).innerHTML;
    var imgWrap = document.getElementById('images-detail');
    var imgWrap2 = document.getElementById('images-detail-slide');
    imgWrap.innerHTML = ''; // clear previous images
    let arr_img = images.split(",");

    if (arr_img.length > 0 && arr_img[0] != "") {

        arr_img.forEach(function (img, index, array) {
            var img_url = window.location.origin + '/uploads/' + img;
            var html = "<div class='upload__img-box'><div style='background-image: url(" + img_url + ")' class='img-bg'></div></div>";
            imgWrap.innerHTML += html;

            if (index == 0) {
                var html2 = `
                    <div class="carousel-item active"  style="margin: 0 !important; padding: 0 !important;">
                        <div class="mt-3 mb-3" style="margin: 0 auto;display: flex;justify-content: center;">
                            <img src="` + img_url + `" alt="" height="200">
                        </div>
                    </div>
                `;
                imgWrap2.innerHTML += html2;

            } else {
                var html2 = `
                    <div class="carousel-item"  style="margin: 0 !important; padding: 0 !important;">
                        <div class="mt-3 mb-3" style="margin: 0 auto;display: flex;justify-content: center;">
                            <img src="` + img_url + `" alt="" height="200">
                        </div>
                    </div>
                `;
                imgWrap2.innerHTML += html2;

            }
        });
    }
}

// edit product
function EditProduct() {


    let name_edit = document.getElementById("name_edit").value;
    let category_edit = document.getElementById("category_edit").value;
    let price_edit = document.getElementById("price_edit").value;
    let quantity_edit = document.getElementById("quantity_edit").value;
    let weight_edit = document.getElementById("weight_edit").value;
    let size_edit = document.getElementById("size_edit").value;
    let description = document.getElementById("sn-desc_edit").value;
    let special_features = document.getElementById("sn-special_features_edit").value;
    let gift_info = document.getElementById("sn-gift_info_edit").value;
    let warranty = document.getElementById("sn-warranty_edit").value;
    let brand = document.getElementById("in-brand_edit").value;
    let selectedRadio = document.querySelector('input[name="editRadio"]:checked');

    if (name_edit.trim() === "") {
        alert("Cannot be left blank for input name!");
        return;
    }
    if (category_edit == 0) {
        alert('Please select category!');
        return;
    }
    if (price_edit == 0) {
        alert('Please enter price!');
        return;
    }
    if (quantity_edit == 0) {
        alert('Please enter quality!');
        return;
    }
    if (!selectedRadio) {
        alert('Please select status!');
        return;
    }

    let status_edit = document.querySelector('input[name="editRadio"]:checked').value;

    let data = {
        "user_id": user_id,
        "id": product_id,
        "category_id": category_edit,
        "name": name_edit,
        "price": price_edit,
        "description": description,
        "brand": brand,
        "warranty": warranty,
        "gift_info": gift_info,
        "quantity": quantity_edit,
        "size": size_edit,
        "weight": weight_edit,
        "special_features": special_features,
        "status": parseInt(status_edit)
    }
    console.log(data);
    sendToServer(data);
    uploadImageEdit(product_id);
}


function uploadImageEdit(product_id) {
    var files = $('input[name="image2[]"]').prop('files');
    var formData = new FormData();
    $.each(files, function (key, value) {
        formData.append('image[]', value);
    });
    formData.append('product_id', product_id);

    $.ajax({
        url: window.location.origin + '/api/v1/product_images/create',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log("success" = response);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    })
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
            // window.location.reload();
        },
        error: function (xhr, status, error) {
            alert("Product update failed!");
            console.error("Error sending data:", error);
        }
    });
}

// delete product
function DeleteProduct() {
    var settings = {
        "url": window.location.origin + "/api/v1/product/delete/" + user_id + "/" + product_id,
        "method": "DELETE",
        "timeout": 0,
    };

    $.ajax(settings)
        .done(function (response) {
            alert(response['messages'][0]);
            window.location.reload();
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            alert('Error: Delete Failed!');
        });
}