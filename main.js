let loginForm = document.getElementById("login-form");
let registerForm = document.getElementById("register-form");

function showSignin() {
    if (loginForm.className === "login-form") {
      loginForm.className += " visible";
      registerForm.className = "register-form";
    } else {
      loginForm.className = "login-form";
    }
  }
  function showRegister() {
    if (registerForm.className === "register-form") {
      registerForm.className += " visible";
      loginForm.className = "login-form";
    } else {
      registerForm.className = "register-form";
    }
  }