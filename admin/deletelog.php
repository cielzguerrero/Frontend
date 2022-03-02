<?php

include ('connections/connection.php');

$id = $_GET['ID'];

if ($id == "") {

    $_SESSION['facility-not-found'] = "<div class='message warning'>Facility Not Found.</div>";
    header("Location: actionlog.php");

} else {

    $id = $_GET['ID'];
    $sql = "DELETE FROM logs WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        header("Location: actionlog.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
}
?>