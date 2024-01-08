import { createUser } from "@/src/users.src"

document.addEventListener("DOMContentLoaded", async () => {
  const formCreateUser = document.querySelector("#formCreateUser");
  if (formCreateUser) {
    formCreateUser.addEventListener("submit", async (event) => {
      event.preventDefault();
      event.submitter.disabled = true;
      formCreateUser.classList.add("was-validated")

      if (formCreateUser.checkValidity()) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, create it!'
        }).then(async (willCreate) => {
          if (willCreate.isConfirmed) {
            const formAction = formCreateUser.action;
            const formData = new FormData(formCreateUser);

            const data = await createUser(formAction, formData);

            if (data.status) {
              Toast.fire({
                icon: 'success',
                title: data.message,
              }).then((result) => {
                window.location.href = `/users/${data.data.id}/edit`;
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message,
              })
            }
          }
        })
      }

      event.submitter.disabled = false;
    })
  }
})
