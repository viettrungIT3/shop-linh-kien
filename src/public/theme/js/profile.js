function EditProfile(id) {
    // console.log(id);
    console.log(this);

    document.getElementById("change-avatar").classList.add("active");
    document.getElementById("tb1").style.display = "none";
    document.getElementById("tb2").style.display = "table";
    document.getElementById("edit-profile").style.display = "none";
    document.getElementById("save-profile").style.display = "block";
    document.getElementById('card-profile-img').insertAdjacentHTML('beforeend', '<input style="display: none;" type="file" id="imageUpload" accept=".png, .jpg, .jpeg" />');

}

function SaveProfile(id) {
    // console.log(id);
    console.log(this);

    document.getElementById("change-avatar").classList.remove("active");
    document.getElementById("tb1").style.display = "table";
    document.getElementById("tb2").style.display = "none";
    document.getElementById("edit-profile").style.display = "block";
    document.getElementById("save-profile").style.display = "none";
    var inputElement = document.getElementById('imageUpload');
    inputElement.remove();

}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').attr('src', e.target.result);
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});