let user_id = parseInt(document.getElementById("user_id").innerText);
let user_role_id = parseInt(document.getElementById("user_role_id").innerText);
let category_id;
function CategoryID(val) {
    category_id = val;
    console.log(category_id);
}

function submitEdit() {
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
    editToServer(data);
}

// send data /
function editToServer(data) {

    // Sử dụng Ajax để gửi dữ liệu lên server
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
            console.error("Error sending data:", error);
        }
    });
}