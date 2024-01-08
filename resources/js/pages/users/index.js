import {deleteUser, exportUser, importUser} from "@/src/users.src";

document.addEventListener("DOMContentLoaded", async () => {
  const btnDeleteUser = document.querySelectorAll('.btnDeleteUser');
  if (btnDeleteUser) {
    btnDeleteUser.forEach(element => {
      element.addEventListener('click', async (event) => {
        event.preventDefault();

        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then(async (result) => {
          if (result.isConfirmed) {
            const formAction = element.getAttribute("data-action");

            const data = await deleteUser(formAction)

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
          }
        })
      });
    });
  }

  const formImportUser = document.querySelector("#formImportUser")
  if (formImportUser) {
    formImportUser.addEventListener("submit", async (e) => {
      e.preventDefault()
      e.submitter.disabled = true
      formImportUser.classList.add("was-validated")

      if (formImportUser.checkValidity()) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, import it!'
        }).then(async (result) => {
          if (result.isConfirmed) {
            const formAction = formImportUser.action
            const formData = new FormData(formImportUser)

            const data = await importUser(formAction, formData)

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
          }
        })
      }

      e.submitter.disabled = false
    })
  }

  const formExportUser = document.querySelector("#formExportUser")
  if (formExportUser) {
    formExportUser.addEventListener("submit", async (e) => {
      e.preventDefault()
      e.submitter.disabled = true
      formExportUser.classList.add("was-validated")

      if (formExportUser.checkValidity()) {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, export it!'
        }).then(async (result) => {
          if (result.isConfirmed) {
            const formAction = formExportUser.action
            const formData = new FormData(formExportUser)

            const data = await exportUser(formAction, formData)

            if (data.status) {
              Toast.fire({
                icon: 'success',
                title: data.message
              }).then(() => {
                window.location.href = data.result
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: data.message
              })
            }
          }
        })
      }

      e.submitter.disabled = false
    })
  }
})
