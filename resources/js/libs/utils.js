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
