import {logout} from "@/src/auth.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formLogout = document.querySelectorAll("#formLogout")
  if (formLogout) {
    formLogout.forEach(element => {
      element.addEventListener("submit", async (e) => {
        e.preventDefault()

        const formAction = element.action

        const data = await logout(formAction)

        if (data.status) {
          Toast.fire({
            icon: 'success',
            title: data.message
          }).then(() => {
            window.location.reload();
          })
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.message
          })
        }
      })
    })
  }
})
