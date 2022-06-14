<?php

if (isset($_POST['rsubmit'])){
$username = $_SESSION['username'];
$key = md5(rand(0, 9999));
$time = date("Y-m-d H:i:s");
$t_time = date("H:i:s");
$t_date = date("Y-m-d");
$profileuser = $rows['profilename'];
$prize = $_POST['rprize'];
$activity = $rows['profilename']." : Claimed with ". $_POST['rsubmit']. " points";
$currentpoint = $rows['points'];
$point = $_POST['rsubmit'];;
$collectedpoint = $currentpoint;
$sum = $collectedpoint - $point;

$sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if($result And $currentpoint > 999) {
    $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity','$time')";
    $result = mysqli_query($conn, $log);
    $temp ="INSERT INTO tempo (profile_name, t_reward, t_date, t_time, datetransaction, securitykey) VALUES ('$username', '$prize','$t_date', '$t_time', '$time' ,'$key')";
    $tresult = mysqli_query($conn, $temp);
    header("Location: receipt2.php?ID={$id}");
} else {
    echo "<meta http-equiv='refresh' content='0'>";
   
   

}
}
?>
