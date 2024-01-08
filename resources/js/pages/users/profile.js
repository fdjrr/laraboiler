import {updateProfile} from "@/src/users.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formUpdateUserProfile = document.querySelector("#formUpdateUserProfile");
  if (formUpdateUserProfile) {
    formUpdateUserProfile.addEventListener("submit", async (event) => {
      event.preventDefault();
      event.submitter.disabled = true;
      formUpdateUserProfile.classList.add("was-validated")

      if (formUpdateUserProfile.checkValidity()) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, update it!'
        }).then(async (willUpdate) => {
          if (willUpdate.isConfirmed) {
            const formAction = formUpdateUserProfile.action;
            const formData = new FormData(formUpdateUserProfile);

            const data = await updateProfile(formAction, formData);

            if (data.status) {
              Toast.fire({
                icon: 'success',
                title: data.message,
              }).then((result) => {
                window.location.reload();
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
