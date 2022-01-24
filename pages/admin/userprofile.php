<?php
// session_start();
// $_SESSION["userId"] = "1";
// $conn = mysqli_connect("localhost", "root", "", "cms") or die("Connection Error: " . mysqli_error($conn));

// if (count($_POST) > 0) {
//   $result = mysqli_query($conn, "SELECT *from users WHERE userId='" . $_SESSION["userId"] . "'");
//   $row = mysqli_fetch_array($result);
//   if ($_POST["currentPassword"] == $row["password"] && !empty($_POST['newPassword'])) {
//     mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
//     $message = "Password Changed";
//   } else
//     $message = "Current Password is not correct!!";
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Management System</title>
  <link rel="stylesheet" href="../../css/sharedsb.css" />
  <link rel="stylesheet" href="../../css/sharedgrid.css" />
  <link rel="stylesheet" href="../../css/userprofile.css" />
  <link rel="stylesheet" href="../../icons/all.css" />
  <script src="../JS/toggle.js"></script>
</head>

<body>
  <div class="full-section">
    <section class="main-sidebar">
      <table class="table">
        <h1 class="admin-panel">Admin Panel</h1>
        <tr>
          <td><i class="fas fa-home"></i></td>
          <td><a href="./index.php">Dashboard</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-user"></i></td>
          <td><a href="./addstudent.php">Add Student Info</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-user-friends"></i></td>
          <td><a href="./viewstudents.php">View Students</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-book"></i></td>
          <td><a href="./addsubject.php">Add Subjects</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-chart-line"></i></td>
          <td><a href="./addclass.php">Add Class</a></td>
        </tr>

        <tr>
          <td><i class="fas fa-cog"></i></td>
          <td><a href="./settings.php">Settings</a></td>
        </tr>

        <tr class="active">
          <td><i class="fas fa-id-badge"></i></td>
          <td><a href="./userprofile.php">User Profile</a></td>
        </tr>

        <tr>
          <td><i class="fas fa-plus"></i></td>
          <td><a href="./createid.php">Create Id</a></td>
        </tr>

        <tr>
          <td><i class=" fas fa-arrow-alt-circle-left"></i></td>
          <td><a href="../php/logout.php">Logout</a></td>
        </tr>
      </table>
    </section>

    <section class="grids">
      <fieldset>
        <legend>Your Email account:</legend>
        <div class="data">
          <label for="email">Current Email: </label>
          <input type="email" id="email" value="admin@admin.com" disabled />
        </div>
      </fieldset>
      <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <fieldset>
          <legend>Change Password:</legend>
          <div class="message">
            <?php if (isset($message)) {
              echo $message;
            }
            ?>
          </div>
          <div class="data">
            <div>
              <label for="password">Current Password: </label>
              <input type="password" id="currentPass" name="currentPassword" />
              <span>
                <i class="fas fa-eye" id="eye" onclick="toggle()"></i>
              </span>
              <span id="currentPassword" class="required"></span>
            </div>

            <br />

            <div>
              <label for="password1">New Password: </label>
              <input type="password" id="newPass" name="newPassword" />
              <span>
                <i class="fas fa-eye" id="eye1" onclick="toggle1()"></i>
              </span>
              <span id="newPassword" class="required"></span>
            </div>

            <br />

            <div>
              <label for="password2">Confirm New Password: </label>
              <input type="password" id="confirmPass" name="confirmPassword" />
              <span>
                <i class="fas fa-eye" id="eye2" onclick="toggle2()"></i>
              </span>
              <span id="confirmPassword" class="required"></span>
            </div>
          </div>
          <input type="submit" name="submit" value="Submit" class="button">
        </fieldset>
      </form>
    </section>
  </div>
</body>


</html>