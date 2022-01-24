<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'cms');

   //Connect to Mysql database
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   //Check DB Connection
   if($db === false){
      die("Error: connection error".mysqli_connect_error());
   }
?>