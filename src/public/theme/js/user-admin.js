let in_id;
function GetID(id) {
    in_id = id;
    console.log(in_id);
}

function AddEmployee() {
    let login = document.getElementById("login").value;
    let password = document.getElementById("password").value;
    console.log(login, password);

    if (login.trim() === '' || password.trim() === '') {
        alert('Please complete all information');
        return false; // Ngăn chặn việc submit form
    }

    var settings = {
        "url": "http://shop.localhost.com:9292/api/v1/user/create-employee",
        "method": "POST",
        "timeout": 0,
        "data": JSON.stringify({
            "login": login.trim(),
            "password": password.trim()
        }),
    };

    $.ajax(settings).done(function (response) {
        alert('You have successfully registered an employee with, with gmail ' + login + ', the password is ' + password);
        window.location.reload();
    });
}

function DeleteUser() {
    var settings = {
        "url": "http://shop.localhost.com:9292/api/v1/user/delete/" + in_id,
        "method": "GET",
        "timeout": 0,
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        alert(response.message);
        window.location.reload();
    });
}