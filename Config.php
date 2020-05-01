<?php 
    $host = "localhost"; /* Host name */
    $user = "Bradley"; /* User */
    $password = "Bradra201!"; /* Password */
    $dbname = "shareit"; /* Database name */
    
    $con = mysqli_connect($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());}
?>