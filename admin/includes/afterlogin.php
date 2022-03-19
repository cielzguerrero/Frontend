<?php

if (empty($_SESSION['adminid'])) {

    header("Location: logout.php");
}
$aid = $_SESSION['adminid'];

$sql = "SELECT * FROM users WHERE id = $aid";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
$afullname = $rows['fullname'];
$ausername = $rows['username'];
$apassword = $rows['password'];
$astatus = $rows['status'];

?>