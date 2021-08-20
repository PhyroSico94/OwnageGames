<?php


 // but I strongly suggest you to use PDO or MySQLi.
 
 include "../../private/scripts/config.php";
 

 $conn = new mysqli($sqlservername,$sqlusername,$sqlpassword,$sqldatabasename);
 
 /* check connection */
 if (mysqli_connect_errno()) {
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
 }