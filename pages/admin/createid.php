<?php
  require_once('../../php/config.php'); 
  require_once('../../php/session.php'); 

  try {
    $sessionEmail = $_SESSION['email'];

    if(isset($_POST['submit'])) {
      $enteredEmail = $_POST['registerEmail'];
      $enteredPassword = $_POST['registerPassword'];
      $reenteredPassword = $_POST['reenterPassword'];
      $enteredUsername = $_POST['registerUsername'];     
      
      if(empty($enteredEmail)) throw new Error('Email should not be empty');
      else if(empty($enteredPassword)) throw new Error('Password should not be empty');
      else if($reenteredPassword != $enteredPassword) throw new Error("Password didn't matched");
      else if(empty($enteredUsername)) throw new Error('Username should not be empty');
      else {
        $sql = "SELECT * from login";
        $result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($result)) {
          if($enteredEmail == $row['email']) {
            throw new Error('Email Already Existed');
          } 
        }
        $insertSQL = "INSERT INTO login (email, password, username) VALUES ('$enteredEmail', '$enteredPassword', '$enteredUsername')";
        mysqli_query($db, $insertSQL);
        $success = 'Account Created Succesfully with email ' . $enteredEmail;
      }
    
    }

  } catch (Error $errorData) {
    $error = $errorData->getMessage();
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
  <link rel="stylesheet" href="../../icons/all.css" />
  <link rel="stylesheet" href="../../css/sharedgrid.css" />
  <link rel="stylesheet" href="../../css/faculty.css" />
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
          <td><i class="fas fa-id-badge"></i></td>
          <td><a href="./userprofile.php">User Profile</a></td>
        </tr>

        <tr class="active">
          <td><i class="fas fa-plus"></i></td>
          <td><a href="./createid.php">Create Id</a></td>
        </tr>

        <tr>
          <td><i class="fas fa-arrow-alt-circle-left"></i></td>
          <td><a href="../../php/logout.php">Logout</a></td>
        </tr>
      </table>
    </section>
    <section class="grids">
      <h3>Create Login Id</h3>
      <form method="POST">
        <div class='card-section'>
          <div class='heading'>
            <span class='title-icon'>
              <i class="fas fa-plus"></i>
            </span>
            <span class='title'>Add Subjects</span>
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
                <i class="fas fa-envelope mid-icon"></i>
                <label class='mid-title'>Email</label>
                <span class=' '> *</span>
              </div>

              <!-- Input Field  -->
              <input type='email' class='input' placeholder='Enter Email' name='registerEmail' />
            </div>
            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-code mid-icon"></i>
                <label class='mid-title'>Password</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='password' class='input' placeholder='Enter Password' name='registerPassword' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-code mid-icon"></i>
                <label class='mid-title'>Re-enter Password</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='password' class='input' placeholder='ReEnter Password' name='reenterPassword' />
            </div>

            <div class="mid-content">

              <!-- Heading  -->
              <div class="label-title">
                <i class="fas fa-user mid-icon"></i>
                <label class='mid-title'>UserName</label>
                <span class='required'> *</span>
              </div>

              <!-- Input Field  -->
              <input type='password' class='input' placeholder='Enter User Fullname' name='registerUsername' />
            </div>
          </div>
          <button class="btn" name='submit'>Create</button>
        </div>
      </form>
    </section>
    <div></div>
</body>

</html>