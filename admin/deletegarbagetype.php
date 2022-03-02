<?php
include ('js/slideshow.js');
include ('connections/connection.php');
$time = date("Y-m-d H:i:s");
$username = $_SESSION['username'];
$activity = "Deleted Garbage Type";
$id = $_GET['ID'];

if ($id == "") {

    $_SESSION['facility-not-found'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: garbagetype.php");

} else {

    $id = $_GET['ID'];
    
    if ($image_name != "") {

        $path = "images/garbage/".$image_name;
        $remove = unlink($path);

        if ($remove == FALSE) {
            header("Location: garbagetype.php");
            die();
        }
    }

    $sql = "DELETE FROM garbagetype WHERE garbage_ID = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: garbagetype.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}
?>