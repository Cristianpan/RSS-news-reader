import Swal from "sweetalert2";

document.addEventListener("DOMContentLoaded", () => {
  const deleteBtns = document.querySelectorAll(".website-delete");

  deleteBtns.forEach((deleteBtn) => {
    deleteBtn.addEventListener("submit", deleteWebsite);
  });

  document.querySelector(".websites-form").addEventListener("submit", sendForm);
});

function sendForm(e) {
  const searchValue = e.target["websiteUrl"].value;
  if (!searchValue) {
    e.preventDefault();
    createMessage(e.target);
  }
}

async function deleteWebsite(e) {
  e.preventDefault();
  const result = await Swal.fire({
    icon: 'warning',
    title: '¿Desea eliminar el sitio?',
    text: 'Si elimina el sitio, se eliminarán todas las noticias y no podrá deshacer esta acción.',
    showCancelButton: true, 
    showDenyButton: true, 
    showConfirmButton: false, 
    denyButtonText: 'Aceptar'
  });

  if (result.isDenied) {
    this.submit(); 
  }
}

function createMessage(parent) {
  let message = document.querySelector("websites-fomr__message");
  if (!message) {
    message = document.createElement("p");
    message.classList.add( "websites-form__message");
    message.textContent =
      "Por favor ingrese una URL para poder registrar el sitio";
    parent.after(message);
    setTimeout(() => {
      message.remove();
    }, 3000);
  }
}
