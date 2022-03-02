<?php
include ('js/slideshow.js');
include ('connections/connection.php');
$time = date("Y-m-d H:i:s");
$username = $_SESSION['username'];
$activity = "Deleted Prize";
$id = $_GET['ID'];

if ($id == "") {

    $_SESSION['facility-not-found'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: carousel.php");

} else {

    $id = $_GET['ID'];
    
    if ($image_name != "") {

        $path = "images/prize/".$image_name;
        $remove = unlink($path);

        if ($remove == FALSE) {
            header("Location: carousel.php");
            die();
        }
    }

    $sql = "DELETE FROM prizes WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: carousel.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}
?>