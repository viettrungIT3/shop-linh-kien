let user_id = parseInt(document.getElementById("user_id").innerText);
let user_role_id = parseInt(document.getElementById("user_role_id").innerText);
let category_id;
function CategoryID(id, status) {
    category_id = id, status;
    console.log(status);
    if (status == 1) {
        document.getElementById('customRadioInline1').checked = true;
    } 
    if (status == 0) {
        document.getElementById('customRadioInline2').checked = true;
    }
}

// Detail category
function Detail(id) {
    document.getElementById("name_detail").innerHTML = document.getElementById("ca-name-"+id).innerText;
    document.getElementById("desc_detail").innerHTML = document.getElementById("ca-desc-"+id).innerText;
    document.getElementById("total_detail").innerHTML = document.getElementById("ca-total-"+id).innerText;
    document.getElementById("cb_detail").innerHTML = document.getElementById("ca-nameC-"+id).innerText;
    document.getElementById("ub_detail").innerHTML = document.getElementById("ca-nameU-"+id).innerText;
    document.getElementById("ca_detail").innerHTML = document.getElementById("ca-timeC-"+id).innerText;
    document.getElementById("ua_detail").innerHTML = document.getElementById("ca-timeU-"+id).innerText;
    document.getElementById("status_detail").innerHTML = document.getElementById("ca-status-"+id).innerText;
}

// edit category
function EditCategory() {
    let name_edit = document.getElementById("name_edit").value;
    let desc_edit = document.getElementById("desc_edit").value;
    let status_edit = document.querySelector('input[name="editRadio"]:checked').value;

    if (name_edit.trim() === "") {
        alert("Cannot be left blank for input name!");
        return;
    }
    
    let data = {
        "user_id": user_id,
        "id": category_id,
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
        url: window.location.origin + "/api/v1/category/update",
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (dataSuccess) {
            alert(dataSuccess['messages'][0]);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            alert("Category update failed!");
            console.error("Error sending data:", error);
        }
    });
}

// delete category
function DeleteCategory() {    
    let data = {
        "user_id": user_id,
        "id": category_id,
        "status": 2
    }
    // console.log(data);
    sendToServer(data);
}

// add category
function AddCategory() {
    let name_add = document.getElementById("name_add").value;
    let desc_add = document.getElementById("desc_add").value;

    if (name_add.trim() === "") {
        alert("Cannot be left blank for input name!");
        return;
    }
    
    let data = {
        "user_id": user_id,
        "name": name_add.trim(),
        "description": desc_add.trim()
    }
    // console.log(data);
    sendNewToServer(data);
}

// send data for add category/
function sendNewToServer(data) {

    $.ajax({
        type: "POST",
        url: window.location.origin + "/api/v1/category/create",
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (dataSuccess) {
            alert(dataSuccess['messages'][0]);
            window.location.reload();
        },
        error: function (xhr, status, error) {
            alert("Add new failed category!")
            console.error("Error sending data:", error);
        }
    });
}

// don't permission 
function DontPermission(str) {
    alert("You don't have permission to " + str);
}