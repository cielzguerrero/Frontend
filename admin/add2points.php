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
$profileuser = $row['username'];
$datetime = date("Y-m-d H:i:s");
$pu = $row['profilename'];
$activity = $row['profilename']." : Gained 2 points";
$currentpoint = $row['points'];
$point = 100;
$img = $row['img_name'];
$collectedpoint = $currentpoint;
$sum = $collectedpoint + $point;
$currenttotal= $row['totalpoints'];
$totalsum = $currenttotal + $point;

$sql = "UPDATE members SET points = '$sum', totalpoints = '$totalsum' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
    $result = mysqli_query($conn, $log);

    $deposit ="INSERT INTO deposits (d_id, profileuser, user, img_name, dpoints, datetime) VALUES ('$id', '$pu', '$profileuser', '$img', '$point', '$datetime')";
    $result = mysqli_query($conn, $deposit);

    header("Location: viewmemberprofile.php?ID={$id}");
} else {
    header("Location: members.php");
}
?>
