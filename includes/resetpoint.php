<?php

$username = $_SESSION['username'];
$profileuser = $row['profilename'];
$activity = $row['profilename']." : Profile Points Restarted";
$currentpoint = $row['points'];
$point = 0;
$sql = "UPDATE members SET points = '$point' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
    $result = mysqli_query($conn, $log);
    echo "<meta http-equiv='refresh' content='0'>";
} else {
    echo "<meta http-equiv='refresh' content='0'>";
}

?>
