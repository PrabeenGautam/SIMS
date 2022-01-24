<?php 
    ob_start();
    session_start();

    //If user is already login
    if(!isset($_SESSION['email'])) {
      header("location: ../../index.php");
      exit();
    }
?>