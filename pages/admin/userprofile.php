<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

// if (count($_POST) > 0) {
//   $result = mysqli_query($conn, "SELECT *from users WHERE userId='" . $_SESSION["userId"] . "'");
//   $row = mysqli_fetch_array($result);
//   if ($_POST["currentPassword"] == $row["password"] && !empty($_POST['newPassword'])) {
//     mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
//     $message = "Password Changed";
//   } else
//     $message = "Current Password is not correct!!";
// }

  try {

    $sessionEmail = $_SESSION['email'];
    $sql = "Select * from login where email='$sessionEmail'"; //Selecting row from same 
    $result = mysqli_query($db, $sql);
    
    $row = mysqli_fetch_array($result);
    $db_password = $row['password'];
    $db_username = $row['username'];

    if(isset($_POST['submit'])) {
        $currentPasswordEntered = $_POST['currentPassword'];
        $newPasswordEntered = $_POST['newPassword'];
        $newPasswordReEntered = $_POST['newRePassword'];

        if(empty($currentPasswordEntered))
          throw new Exception("Current Password mustn't be empty");
        else if(empty($newPasswordEntered))
          throw new Exception("New Password mustn't be empty");
        else if($newPasswordEntered != $newPasswordReEntered) {
          throw new Exception('New Passwords do not matched.');
        } else if($currentPasswordEntered != $db_password) {
          throw new Exception('Incorrect Current Password');
        }
        else {
          $updateSQL = "UPDATE login set password='$newPasswordEntered' where email='$sessionEmail'";
          mysqli_query($db, $updateSQL);
          $success = 'Password Changed. Your new Pasword: ' . $newPasswordEntered;
        }
    }

  } catch (Exception $errors) {
    $error = $errors->getMessage();
  }

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
  <link rel="stylesheet" href="../../css/faculty.css" />
  <link rel="stylesheet" href="../../icons/all.css" />
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
          <td><a href="../../php/logout.php">Logout</a></td>
        </tr>
      </table>
    </section>

    <section class="grids">
      <div class="section">
        <div class="left-section">
          <div class='card-section'>
            <div class='heading'>
              <span class='title-icon'>
                <i class="fas fa-user-md"></i>
              </span>
              <span class='title'>Your Profile</span>
            </div>


            <div class="content-section">
              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-envelope mid-icon"></i>
                  <label class='mid-title'>Current Email</label>
                </div>

                <!-- Input Field  -->
                <input type='email' class='input custom-input' value='<?php echo $_SESSION['email'] ?>' disabled />
              </div>

              <div class="mid-content">
                <!-- Heading  -->
                <div class="label-title">
                  <i class="fas fa-user mid-icon"></i>
                  <label class='mid-title'>User Name</label>
                </div>

                <!-- Input Field  -->
                <input type='text' class='input custom-input' value='<?php echo $db_username?>' disabled />
              </div>
            </div>
          </div>
        </div>
        <div class="right-section">
          <form method='POST'>
            <div class='card-section'>
              <div class='heading'>
                <span class='title-icon'>
                  <i class="fas fa-user-md"></i>
                </span>
                <span class='title'>Change Password</span>
              </div>

              <div class="error-div">
                <?php if(isset($error)) {?>
                <div class="message">
                  <?php echo $error; ?>
                </div>
                <?php
                }?>
              </div>
              <div class="success-div">
                <?php if(isset($success)) {?>
                <div class="success">
                  <?php echo $success; ?>
                </div>
                <?php
                }?>
              </div>
              <div class="content-section">
                <div class="mid-content">
                  <!-- Heading  -->
                  <div class="label-title">
                    <i class="fas fa-code mid-icon"></i>
                    <label class='mid-title'>Current Password</label>
                  </div>

                  <!-- Input Field  -->
                  <input type='text' placeholder='Enter Current Password' class='input custom-input'
                    name='currentPassword' />
                </div>

                <div class="mid-content">
                  <!-- Heading  -->
                  <div class="label-title">
                    <i class="fas fa-code mid-icon"></i>
                    <label class='mid-title'>New Password</label>
                  </div>

                  <!-- Input Field  -->
                  <input type='text' class='input custom-input' placeholder='Enter Password' name='newPassword' />
                </div>

                <div class="mid-content">
                  <!-- Heading  -->
                  <div class="label-title">
                    <i class="fas fa-envelope mid-icon"></i>
                    <label class='mid-title'>Re-Enter Password</label>
                  </div>

                  <!-- Input Field  -->
                  <input type='text' class='input custom-input' placeholder='Re-Enter Password' name='newRePassword' />
                </div>
              </div>
              <button class="btn" name='submit'>Change Password</button>
            </div>
          </form>
        </div>

      </div>
      </form>
    </section>
  </div>
  <script src="../../JS/script.js"></script>
</body>


</html>