(() => {
  const alertResponse = document.querySelector("#alert-response");

  if (alertResponse) {
    const {title, message, type} = JSON.parse(
      alertResponse.getAttribute("data-response")
    );

    setTimeout(function () {
      Swal.fire({
        icon: type,
        title: title,
        text: message,
        confirmButtonText: 'Aceptar'
      });
    }, 300);
  }
})();

