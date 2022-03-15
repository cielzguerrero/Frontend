<?php

include ('connections/connection.php');

    $sql = "DELETE FROM tempo";
    $result = mysqli_query($conn, $sql);

    if($result == TRUE) {
        $_SESSION['delete'] = "<div class='message success'>Removed Successfully!</div>";
        header("Location: actionlog.php");
    } else {
        $_SESSION['delete'] = "<div class='message warning'>Failed To Remove. Try Again Later.</div>";
    }
?>