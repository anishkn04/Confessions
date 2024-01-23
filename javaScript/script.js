function loginRedirect() {
  window.location.href = "../html/login.php";
}

function logout(){
  window.location.href = "../html/logout.php";
}

function isStrongPassword(password) {
  if (password.length < 8) {
      alert("Password is not strong enough. It should be at least 8 characters long.");
      return false;
  }

  if (!/[A-Z]/.test(password)) {
      alert("Password is not strong enough. It should contain at least one uppercase letter.");
      return false;
  }

  if (!/[a-z]/.test(password)) {
      alert("Password is not strong enough. It should contain at least one lowercase letter.");
      return false;
  }

  if (!/[0-9]/.test(password)) {
      alert("Password is not strong enough. It should contain at least one digit.");
      return false;
  }

  if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
      alert("Password is not strong enough. It should contain at least one special character.");
      return false;
  }

  return true;
}

function register() {
  let password = document.getElementById("password").value;

  if (isStrongPassword(password)) {
      alert("Registration successful!");
  }
  else
  {
    return false;
  }
}

// function emailRetaintion() {
//   let mail = document.getElementById("email").value;

//   if (mail.trim() === "") {
//       alert("Email cannot be empty!");
//       return false;
//   }

//   document.getElementById("email").value = mail;
//   return true;
// }






