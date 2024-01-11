import { login } from "@/src/auth.src";

document.addEventListener("DOMContentLoaded", async () => {
  const formLogin = document.querySelector("#formLogin");
  if (formLogin) {
    const togglePassword = formLogin.querySelector("#togglePassword");
    if (togglePassword) {
      togglePassword.addEventListener("click", (event) => {
        event.preventDefault();

        const password = formLogin.password;
        if (password.type === "password") {
          password.type = "text";
        } else {
          password.type = "password";
        }
      });
    }

    formLogin.addEventListener("submit", async (e) => {
      e.preventDefault();
      e.submitter.disabled = true;

      if (formLogin.checkValidity()) {
        const formAction = formLogin.action;
        const formData = new FormData(formLogin);

        const data = await login(formAction, formData);

        if (data.status) {
          Toast.fire({
            icon: "success",
            title: data.message,
          }).then(() => {
            localStorage.setItem("access_token", data.access_token);

            window.location.reload();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: data.message,
          });
        }
      }

      e.submitter.disabled = false;
    });
  }
});
