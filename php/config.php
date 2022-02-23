<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '123456789');
   define('DB_DATABASE', 'sims');

   //Connect to Mysql database
   try {
      $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);  
   } catch (error) {
      echo "Connection Failed";
   }
?>