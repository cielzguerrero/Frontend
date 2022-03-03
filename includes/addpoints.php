<?php
include ('connections/connection.php');
if (!isset($_GET['ID'])){

    $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: ../main.php?ID={$id}");

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
            header("Location: ../main.php?ID={$id}");
        }
    }

}
$profileuser = $row['profilename'];
$activity = $row['profilename']." : Gained 150 points";
$currentpoint = $row['points'];
$point = 150;
$collectedpoint = $currentpoint;
$sum = $collectedpoint + $point;

$sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
    $result = mysqli_query($conn, $log);
    header("Location: ../main.php?ID={$id}");
} else {
    header("Location: ../main.php?ID={$id}");
}
?>
