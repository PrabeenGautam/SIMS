<?php
  session_start();

  //Destroy Session
  if(session_destroy()) {
    //redirect to login page
    header("location: ../index.php");
  }
?>