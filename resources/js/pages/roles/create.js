import {createRole} from "@/src/roles.src"

document.addEventListener("DOMContentLoaded", async () => {
  const formCreateRole = document.querySelector("#formCreateRole")
  if (formCreateRole) {
    formCreateRole.addEventListener("submit", async (e) => {
      e.preventDefault();
      e.submitter.disabled = true
      formCreateRole.classList.add("was-validated")

      if (formCreateRole.checkValidity()) {
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
            const formAction = formCreateRole.action
            const formData = new FormData(formCreateRole)

            const data = await createRole(formAction, formData)

            if (data.status) {
              Toast.fire({
                icon: "success",
                title: data.message,
              }).then(() => {
                window.location.href = `/roles/${data.data.id}/edit`
              })
            } else {
              Swal.fire({
                icon: "error",
                title: "Oops...",
                text: data.message,
              })
            }
          }
        })
      }

      e.submitter.disabled = false
    })
  }
})
