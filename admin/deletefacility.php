<?php

include ('connections/connection.php');
$time = date("Y-m-d H:i:s");
$username = $_SESSION['username'];
$activity = "Deleted Facility";
$id = $_GET['ID'];

if ($id == "") {

    $_SESSION['facility-not-found'] = "<div class='message warning'>Facility Not Found.</div>";
    header("Location: mrfs.php");

} else {

    $id = $_GET['ID'];
    $sql = "DELETE FROM facility WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: mrfs.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}
?>