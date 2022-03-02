<?php

// Writing constants for non-repeating values
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "wastemanagement";

$conn = mysqli_connect($server, $user, $pass, $dbname); //Database connection

if(!$conn){
    echo "<script>alert('Connection Error')</script>";
}

session_start();
?>