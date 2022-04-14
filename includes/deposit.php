<?php
include('../connections/connection.php');

$mysql = "SELECT tdeposit FROM tempdeposit ORDER BY id DESC LIMIT 1;";
$myresult = mysqli_query($conn, $mysql);
$myrows = mysqli_fetch_assoc($myresult);
$mycount = mysqli_num_rows($myresult);
$datafrom = $myrows['tdeposit'];

if($mycount>=250)
{
      
 $mysql = "DELETE * FROM tempdeposit";
 $myresult = mysqli_query($conn, $mysql);
 $myrows = mysqli_fetch_assoc($myresult);
 $mresult = mysqli_query($conn,$sql);
}
if ($datafrom == "1") {
      $profileuser = $rows['profilename'];
      $activity = $rows['profilename'] . " : Deposited Doy Pack = 2 points";
      $currentpoint = $rows['points'];
      $point = 2;
      $collectedpoint = $currentpoint;
      $sum = $collectedpoint + $point;
      $sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
            $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
            $result = mysqli_query($conn, $log);
            echo "<meta http-equiv='refresh' content='0'>";  
      } else {
            echo "<meta http-equiv='refresh' content='0'>";
      }
} else if ($datafrom == "2") {
      $profileuser = $rows['profilename'];
      $activity = $rows['profilename'] . " : Deposited Glass Bottle = 2 points";
      $currentpoint = $rows['points'];
      $point = 4;
      $collectedpoint = $currentpoint;
      $sum = $collectedpoint + $point;
      $sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
            $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
            $result = mysqli_query($conn, $log);
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
            echo "<meta http-equiv='refresh' content='0'>";
      }
} else if ($datafrom == "3") {
      $profileuser = $rows['profilename'];
      $activity = $rows['profilename'] . " : Deposited Plastic Bottle = 3 points";
      $currentpoint = $rows['points'];
      $point = 3;
      $collectedpoint = $currentpoint;
      $sum = $collectedpoint + $point;

      $sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
            $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
            $result = mysqli_query($conn, $log);
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
            echo "<meta http-equiv='refresh' content='0'>";
      }
} else if ($datafrom == "4") {
      $profileuser = $rows['profilename'];
      $activity = $rows['profilename'] . " : Deposited Aluminum = 10 points";
      $currentpoint = $rows['points'];
      $point = 10;
      $collectedpoint = $currentpoint;
      $sum = $collectedpoint + $point;

      $sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
            $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
            $result = mysqli_query($conn, $log);
            echo "<meta http-equiv='refresh' content='0'>";
      } else {
            echo "<meta http-equiv='refresh' content='0'>";
      }
} else {
}

?>