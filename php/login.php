<?php 

require_once('./config.php');

  if(isset($_POST["email"]) && isset($_POST["password"])) {
    $_email = $_POST["email"];
    $_password = $_POST["password"];
    
    if(empty($_email)) {
      header("Location: ../index.php?error=Email can't be blank");
      exit();
    } else  if(empty($_password)) {
      header("Location: ../index.php?error=Password can't be blank");
      exit();
    }  else {
      $sql = "SELECT * FROM login where email = '$_email' AND password = '$_password'";
      $result = mysqli_query($db, $sql);

      if(mysqli_num_rows($result)) {
        echo 'Hello';        
      }
     
    }
  }

  else {
    header("Location: ../index.php?error");
    exit();
  }
?>