function loginRedirect() {
  window.location.href = "../html/login.php";
}

function logout() {
  window.location.href = "../html/logout.php";
}

function profileRedirect() {
  window.location.href = "../html/profile.php";
}

function copyToClipBoard(username) {
  address = window.location.href;
  console.log(address)
  if (!address.includes("?username")) {
    address = address + `?username=${username}`
  }
  navigator.clipboard.writeText(address);
  alert(address + " copied to Clipboard")
}

function isStrongPassword(password) {
  const error = document.getElementById("invalid_password");
  if (password.length < 8) {
    error.hidden = false;
    error.innerText = "Password is not strong enough. It should be at least 8 characters long."
    return false;
  }

  if (!/[A-Z]/.test(password)) {
    error.hidden = false;
    error.innerText = "Password is not strong enough. It should contain at least one uppercase letter."
    return false;
  }

  if (!/[a-z]/.test(password)) {
    error.hidden = false;
    error.innerText = "Password is not strong enough. It should contain at least one lowercase letter."
    return false;
  }

  if (!/[0-9]/.test(password)) {
    error.hidden = false;
    error.innerText = "Password is not strong enough. It should contain at least one digit."
    return false;
  }

  if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
    error.hidden = false;
    error.innerText = "Password is not strong enough. It should contain at least one special character."
    return false;
  }

  return true;
}

function register() {
  let password = document.getElementById("password").value;
  if (isStrongPassword(password)) {
    return true;
  }
  else {
    return false;
  }
}

function profileRedirect() {
  let username = document.getElementById('noLoginProfile').value;
  let link = "./profile.php?username=" + username;
  window.location.href = link;
}

function mentionUser() {
  return;
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






