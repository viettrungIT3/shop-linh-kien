function EditProfile(id) {
    // console.log(id);
    console.log(this);
    
    document.getElementById("change-avatar").classList.add("active");
    document.getElementById("tb1").style.display = "none";
    document.getElementById("tb2").style.display = "table";
    document.getElementById("edit-profile").style.display = "none";
    document.getElementById("save-profile").style.display = "block";
}

function SaveProfile(id) {
    // console.log(id);
    console.log(this);
    
    document.getElementById("change-avatar").classList.remove("active");
    document.getElementById("tb1").style.display = "table";
    document.getElementById("tb2").style.display = "none";
    document.getElementById("edit-profile").style.display = "block";
    document.getElementById("save-profile").style.display = "none";
}