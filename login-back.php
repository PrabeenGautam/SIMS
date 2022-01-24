<?php
/*
require_once "./php/config.php";
require_once "./php/session.php";
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $email = $_POST['email']; // check name = email and store in email variable
  $password = $_POST['password']; // check name= password and store

  //Check if email is empty
  if (empty($email) || empty($password)) {
    $message .= "Please fill the form.";
  }

  if (empty($message)) {
    $statments = $db->prepare("select * from users where email = ?");
    $statments->bind_param("s", $email);
    $statments->execute();
    $statments_result = $statments->get_result();
    if ($statments_result->num_rows > 0) {
      $data = $statments_result->fetch_assoc();
      if ($data['password'] === $password) {
        $message = "Login Successfully!";
        header("Refresh:1; url=./pages/index.php");
      } else {
        $message .= "Password is not valid";
      }
    } else {
      $message .= "Invalid email address";
    }
  }
}
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>College Management System</title>
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="stylesheet" href="./icons/all.css" />
</head>

<body>
  <section>
    <form action="" method="POST">
      <h1>Sign in</h1>

      <div class="message">
        <?php if (isset($message)) {
          echo $message;
        }
        ?>
      </div>

      <div class="input-field">
        <label for="email">Email Address</label>
        <input type="email" name="email" class="email" maxlength="20" />
      </div>

      <div class="input-field">
        <label for="password">Password</label>
        <input type="password" name="password" id="currentPass" maxlength="20" />
        <span>
          <i class="fas fa-eye" id="eye" onclick="toggle()"></i>
        </span>
      </div>
      <input type="submit" name=" submit" value=" Submit " class="button" />
      <h6>
        Note: Leave this page if you aren't authorized person to access the
        web
      </h6>
    </form>
  </section>
</body>
<script src="./JS/toggle.js"></script>

</html>