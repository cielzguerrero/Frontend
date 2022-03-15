<?php
if (isset($_POST['rsubmit'])){
$username = $_SESSION['username'];
$time = date("Y-m-d H:i:s");
$profileuser = $rows['profilename'];
$activity = $rows['profilename']." : Lost ". $_POST['rsubmit']. " points";
$currentpoint = $rows['points'];
$point = $_POST['rsubmit'];;
$collectedpoint = $currentpoint;
$sum = $collectedpoint - $point;

$sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity','$time')";
    $result = mysqli_query($conn, $log);
    echo "<meta http-equiv='refresh' content='0'>";
} else {
    echo "<meta http-equiv='refresh' content='0'>";
}
}
?>
