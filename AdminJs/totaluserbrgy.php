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

$sql = "SELECT Barangay, total_user FROM barangays";
$result = mysqli_query($conn, $sql);

$data = array();
foreach ($result as $rows) {
  $data[] = $rows;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();
header('Content-Type: application/json');
print json_encode($data);
?>