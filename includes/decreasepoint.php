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
$point = $_POST['rsubmit'];
$collectedpoint = $currentpoint;
$sum = $collectedpoint - $point;


// $result = mysqli_query($conn, $sql);
if($currentpoint > 999) {
    // Update Client Points
    $sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    // Update Logs
    $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity','$time')";
    $result = mysqli_query($conn, $log);
    // Update Ranking Points
    $temp ="INSERT INTO tempo (profile_name, t_reward, t_date, t_time, datetransaction, securitykey) VALUES ('$username', '$prize','$t_date', '$t_time', '$time' ,'$key')";
    $tresult = mysqli_query($conn, $temp);
    // Receipt
    header("Location: receipt2.php?ID={$id}");
} else {
   echo '<div class="claimAlert flex p-4 text-center justify-center text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
   <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
   <div>
     <span class="font-medium text-center">Insufficient Points!</span> 
   </div>
 </div>';

}
}
?>
