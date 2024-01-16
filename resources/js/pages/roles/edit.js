import { updateRole } from "@/src/roles.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formUpdateRole = document.querySelector("#formUpdateRole");
  if (formUpdateRole) {
    formUpdateRole.addEventListener("submit", async (e) => {
      e.preventDefault();
      e.submitter.disabled = true;
      formUpdateRole.classList.add("was-validated");

      if (formUpdateRole.checkValidity()) {
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
            const formAction = formUpdateRole.action;
            const formData = new FormData(formUpdateRole);

            const data = await updateRole(formAction, formData);

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
