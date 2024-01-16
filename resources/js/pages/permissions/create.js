import { createPermission } from "@/src/permissions.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formCreatePermission = document.querySelector("#formCreatePermission");
  if (formCreatePermission) {
    formCreatePermission.addEventListener("submit", async (e) => {
      e.preventDefault();
      e.submitter.disabled = true;
      formCreatePermission.classList.add("was-validated");

      if (formCreatePermission.checkValidity()) {
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, create it!",
        }).then(async (result) => {
          if (result.isConfirmed) {
            const formAction = formCreatePermission.action;
            const formData = new FormData(formCreatePermission);

            const data = await createPermission(formAction, formData);

            if (data.status) {
              Toast.fire({
                icon: "success",
                title: data.message,
              }).then(() => {
                window.location.href = `/permissions/${data.data.id}/edit`;
              });
            }
          }
        });
      }

      e.submitter.disabled = false;
    });
  }
});
