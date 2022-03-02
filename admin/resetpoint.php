<?php
include ('connections/connection.php');
if (!isset($_GET['ID'])){

    $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: members.php");

} else {

    $id = $_GET['ID'];

    $sql = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
            header("Location: members.php");
        }
    }

}

$username = $_SESSION['username'];
$activity = $row['profilename']." : Profile Points Restarted";
$currentpoint = $row['points'];
$point = 0;
$sql = "UPDATE members SET points = '$point' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    $log = "INSERT INTO logs (user, activity) VALUES ('$username', '$activity')";
    $result = mysqli_query($conn, $log);
    header("Location: viewmemberprofile.php?ID={$id}");
} else {
    header("Location: members.php");
}
?>
