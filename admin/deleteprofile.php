<?php

include ('connections/connection.php');
$time = date("Y-m-d H:i:s");
$username = $_SESSION['username'];
$activity = "Deleted Profile";
$id = $_GET['ID'];

if ($id == "") {

    $_SESSION['facility-not-found'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: members.php");

} else {

    $id = $_GET['ID'];
    
    if ($image_name != "") {

        $path = "images/profile/".$image_name;
        $remove = unlink($path);

        if ($remove == FALSE) {
            header("Location: members.php");
            die();
        }
    }

    $sql = "DELETE FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        $tsql = "DELETE FROM deposits WHERE d_id = '$id'";
            $result = mysqli_query($conn, $tsql);
        header("Location: members.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}
?>