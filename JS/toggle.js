var state = false;
function toggle() {
  if (state) {
    document.getElementById("currentPass").setAttribute("type", "password");
    state = false;
    document.getElementById("eye").className = "fas fa-eye";
  } else {
    document.getElementById("currentPass").setAttribute("type", "text");
    state = true;
    document.getElementById("eye").className = "fas fa-eye-slash";
  }
}

function toggle1() {
  if (state) {
    document.getElementById("newPass").setAttribute("type", "password");
    state = false;
    document.getElementById("eye1").className = "fas fa-eye";
  } else {
    document.getElementById("newPass").setAttribute("type", "text");
    state = true;
    document.getElementById("eye1").className = "fas fa-eye-slash";
  }
}

function toggle2() {
  if (state) {
    document.getElementById("confirmPass").setAttribute("type", "password");
    state = false;
    document.getElementById("eye2").className = "fas fa-eye";
  } else {
    document.getElementById("confirmPass").setAttribute("type", "text");
    state = true;
    document.getElementById("eye2").className = "fas fa-eye-slash";
  }
}

function validatePassword() {
  var currentPassword,
    newPassword,
    confirmPassword,
    output = true;

  currentPassword = document.frmChange.currentPassword;
  newPassword = document.frmChange.newPassword;
  confirmPassword = document.frmChange.confirmPassword;

  if (!currentPassword.value) {
    currentPassword.focus();
    document.getElementById("currentPassword").innerHTML = "Required!!";
    document.getElementById("currentPassword").style.backgroundColor =
      "#f2dede";
    output = false;
  } else if (!newPassword.value) {
    newPassword.focus();
    document.getElementById("newPassword").innerHTML = "Required!!";
    document.getElementById("newPassword").style.backgroundColor = "#f2dede";
    output = false;
  } else if (!confirmPassword.value) {
    confirmPassword.focus();
    document.getElementById("confirmPassword").innerHTML = "Required!!";
    document.getElementById("confirmPassword").style.backgroundColor =
      "#f2dede";
    output = false;
  }
  if (newPassword.value != confirmPassword.value) {
    newPassword.value = "";
    confirmPassword.value = "";
    newPassword.focus();
    document.getElementById("confirmPassword").innerHTML = "Not Same!!";
    document.getElementById("confirmPassword").style.backgroundColor =
      "#f2dede";
    output = false;
  }
  return output;
}
