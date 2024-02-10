const botonMenu = document.getElementById("header_nav-btn");
const nav = document.querySelector(".nav");
const imageOpen = document.getElementById("btn-open");
const imageClose = document.getElementById("btn-close");

document.addEventListener("DOMContentLoaded", () =>
  isMobile() ? createMobileMenu() : ""
);

window.addEventListener("resize", () =>
  isMobile() ? createMobileMenu() : removeMobileMenu()
);

botonMenu.addEventListener("click", function () {
  nav.classList.toggle("nav--mobile-active");
  imageOpen.classList.toggle("header__nav-btn-img--hidden");
  imageClose.classList.toggle("header__nav-btn-img--hidden");
});

function isMobile() {
  return window.innerWidth < 768;
}

function createMobileMenu() {
  nav.classList.add("nav--mobile");
}

function removeMobileMenu() {
  nav.classList.remove("nav--mobile", "nav--mobile-active");
  imageOpen.classList.remove("header__nav-btn-img--hidden");
  imageClose.classList.add("header__nav-btn-img--hidden");
}