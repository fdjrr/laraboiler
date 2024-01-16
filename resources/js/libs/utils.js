export const showLoading = () => {
  Swal.fire({
    icon: "info",
    title: "Tunggu Sebentar",
    text: "Sedang melakukan proses verifikasi!",
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
    },
  });
};

export const modalApplicationError = (error) => {
  Swal.close();

  if (error.response.status == 500) {
    const btnClose = document.querySelector(".btn-close");
    if (btnClose) {
      btnClose.click();
    }

    const modalApplicationError = document.querySelector(
      "#modal-application-error",
    );
    if (modalApplicationError) {
      modalApplicationError.querySelector("#statusCode").innerHTML =
        `${error.response.status} ${error.response.statusText}`;
      modalApplicationError.querySelector("#Message").innerHTML = error.message;
      modalApplicationError.querySelector("#Method").innerHTML =
        error.config.method.toUpperCase();
      modalApplicationError.querySelector("#URL").innerHTML = error.config.url;
      modalApplicationError.querySelector("#Headers").innerHTML =
        JSON.stringify(error.config.headers);
      modalApplicationError.querySelector("#Request").innerHTML =
        JSON.stringify(
          error.config.data || error.config.params || error.config,
        );
      modalApplicationError.querySelector("#Response").innerHTML =
        JSON.stringify(error.response.data);

      const Modal = new bootstrap.Modal(modalApplicationError);
      Modal.show();
    }
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: error.response.data.message,
    });
  }
};
