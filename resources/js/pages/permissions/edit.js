import { updatePermission } from "@/src/permissions.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formUpdatePermission = document.querySelector("#formUpdatePermission");
  if (formUpdatePermission) {
    formUpdatePermission.addEventListener("submit", async (e) => {
      e.preventDefault();
      e.submitter.disabled = true;
      formUpdatePermission.classList.add("was-validated");

      if (formUpdatePermission.checkValidity()) {
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, update it!",
        }).then(async (result) => {
          if (result.isConfirmed) {
            const formAction = formUpdatePermission.action;
            const formData = new FormData(formUpdatePermission);

            const data = await updatePermission(formAction, formData);

            if (data.status) {
              Toast.fire({
                icon: "success",
                title: data.message,
              }).then(() => {
                window.location.reload();
              });
            }
          }
        });
      }

      e.submitter.disabled = false;
    });
  }
});
