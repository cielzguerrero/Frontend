<?php
include('../connections/connection.php');
$currentuser = $_SESSION['id'];
$datafrom = $_GET["gdata"];

if($datafrom == true)
{
    $sql = "INSERT INTO test (stuffed, userid) VALUES ('$datafrom', '$currentuser')";
    $result = mysqli_query($conn,$sql);
}

?>
