import { updateUser } from "@/src/users.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formUpdateUser = document.querySelector("#formUpdateUser");
  if (formUpdateUser) {
    formUpdateUser.addEventListener("submit", async (event) => {
      event.preventDefault();
      event.submitter.disabled = true;
      formUpdateUser.classList.add("was-validated");

      if (formUpdateUser.checkValidity()) {
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, update it!",
        }).then(async (willCreate) => {
          if (willCreate.isConfirmed) {
            const formAction = formUpdateUser.action;
            const formData = new FormData(formUpdateUser);

            const data = await updateUser(formAction, formData);

            if (data.status) {
              Toast.fire({
                icon: "success",
                title: data.message,
              }).then((result) => {
                window.location.reload();
              });
            }
          }
        });
      }

      event.submitter.disabled = false;
    });
  }
});
