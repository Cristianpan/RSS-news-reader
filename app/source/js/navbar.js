
const botonMenu = document.getElementById("header_nav-btn");
const nav = document.querySelector(".nav");
const imagenBoton = document.querySelector(".header__nav-btn-img");
const linksNav = document.querySelectorAll(".nav__link");

botonMenu.addEventListener("click", function() {
    nav.classList.toggle("nav--mobile");
    imagenBoton.classList.add("rotate");
    
    if (imagenBoton.src.includes("list.svg")) {
        imagenBoton.src = "/assets/images/x-circle.svg";
    } else {
        imagenBoton.src = "/assets/images/list.svg";
    }
});

linksNav.forEach(function(link) {
    link.addEventListener("click", function() {
        nav.classList.remove("nav--mobile");
        imagenBoton.src = "/assets/images/list.svg";
    });
});