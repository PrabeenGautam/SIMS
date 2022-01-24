<?php
    ob_start();
    session_start();

    //If user is already login
    if(isset($_SESSION['userid']) && $_SESSION['userid'] === true) {
      header("location: ../pages/index.html");
      exit();
    }
?>