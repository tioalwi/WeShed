// Dropdown
var dropdown = document.getElementsByClassName("dropdown");
var i;
for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var isidropdown = this.nextElementSibling;
        if (isidropdown.style.display === "block") {
            isidropdown.style.display = "none";
        } else {
            isidropdown.style.display = "block";
        }
    });
}

// Hamburger hide show sidebar
var hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click", function () {
    document.querySelector("body").classList.toggle("active");
})

// Active Link
// $(document).ready(function() {
//     $('.sidebar_list').click(function () {
//         $('.sidebar_list').removeClass('active');
//         $(this).addClass('active');
//     })
// })