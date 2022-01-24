<?php
  //The require_once() will first check whether a file is already included or not and if it is already included then it will not include it again.
  require_once('./php/config.php'); 
  // require_once('./php/session.php'); 
  session_start();

  $email = $password = '';

  
  // $_SERVER["REQUEST_METHOD" =>If post request send then do it
  //isset => if submit is clicked 

  try {
  
    if(isset($_POST['submit'])) {
    $enteredEmail = $_POST["email"];
    $enteredPassword = $_POST["password"];

      //Check If Email Empty
    if(empty($enteredEmail)) {
      throw new Exception("Email can't be blank");
    } else if(empty($enteredPassword)) {
      throw new Exception("Password can't be blank");
    } else {
      $sql = "SELECT * FROM login where email = '$enteredEmail' AND password = '$enteredPassword'";
      $result = mysqli_query($db, $sql);

      if(mysqli_num_rows($result)) {
        $success=  'Logging in...';   
        $_SESSION['email'] = $enteredEmail; 
        sleep(2);
        header("location: ./pages/admin/index.php");
      } else {
        $error = 'Incorrect Email or Password';
      }
    }
  }
  } catch (Exception $errorData) {
    $error =  $errorData->getMessage();
  }
  
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Student Info Management</title>
  <link rel="stylesheet" href="./css/styles.css" />
  <link rel="stylesheet" href="./css/faculty.css" />
  <link rel="stylesheet" href="./dist/bootstrap/css/bootstrap.min.css" />
</head>

<body>
  <div class="center">
    <h1>Login</h1>

    <?php if(isset($error)) {
      ?>
    <div class="message">
      <?php echo $error; ?>
    </div>
    <?php
    }
    ?>

    <?php if(isset($success)) {
      ?>
    <div class="success">
      <?php echo $success; ?>
    </div>
    <?php
    }
    ?>

    <form method='POST'>
      <div class="txt_field mb-5">
        <label>Enter Email</label>
        <input type="email" name='email' />
      </div>

      <div class="txt_field">
        <label>Password</label>
        <input type="password" name='password' />
      </div>


      <input type="submit" value="Login" class="mb-5 mt-3" name='submit' />
    </form>
  </div>
</body>
<script src="./JS/script.js"></script>

</html>