import "../components/alert-response";

document.addEventListener("DOMContentLoaded", () => {
  document
    .querySelector(".websites-form")
    .addEventListener("submit", enviarFormulari);
});

function enviarFormulari(e) {
  const searchValue = e.target["websiteUrl"].value;
  if (!searchValue) {
    e.preventDefault();
    createMessage(e.target);
  }
}

function createMessage(parent) {
  let message = document.querySelector("websites-fomr__message");
  if (!message) {
    message = document.createElement("p");
    message.classList.add("container", "websites-form__message");
    message.textContent =
      "Por favor ingrese una URL para poder registrar el sitio";
    parent.after(message);
    setTimeout(() => {
      message.remove();
    }, 3000);
  }
}
