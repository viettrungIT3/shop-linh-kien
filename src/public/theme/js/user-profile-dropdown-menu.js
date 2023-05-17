let card = document.querySelector(".profile-dropdown-menu .card");
let displayPicture = document.querySelector(".profile-dropdown-menu .display-picture");

displayPicture.addEventListener("click", function () { //on click on profile picture toggle hidden class from css
    card.classList.toggle("hidden")
})