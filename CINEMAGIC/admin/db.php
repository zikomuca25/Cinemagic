<?php
define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "moviedatabase");
define("PORT", 3306);
define("salt", "qwertyuiop"); 
$salt = "qwertyuiop";
$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE,PORT); 
  
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
?>