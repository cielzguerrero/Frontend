<?php
include ('connections/connection.php');
if (isset($_POST['100points'])){
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
    
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
if (isset($_POST['2500points'])){
    $username = $_SESSION['username'];
    $profileuser = $row['username'];
    $datetime = date("Y-m-d H:i:s");
    $pu = $row['profilename'];
    $activity = $row['profilename']." : Gained 2 points";
    $currentpoint = $row['points'];
    $point = 2500;
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
    
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
if (isset($_POST['5000points'])){
    $username = $_SESSION['username'];
    $profileuser = $row['username'];
    $datetime = date("Y-m-d H:i:s");
    $pu = $row['profilename'];
    $activity = $row['profilename']." : Gained 2 points";
    $currentpoint = $row['points'];
    $point = 5000;
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
    
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
if (isset($_POST['reduce1000points'])){
    $username = $_SESSION['username'];
    $profileuser = $row['username'];
    $datetime = date("Y-m-d H:i:s");
    $pu = $row['profilename'];
    $activity = $row['profilename']." : Gained 2 points";
    $currentpoint = $row['points'];
    $point = 1000;
    $img = $row['img_name'];
    $collectedpoint = $currentpoint;
    $sum = $collectedpoint - $point;
    
    $sql = "UPDATE members SET points = '$sum' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        $log = "INSERT INTO logs (user, activity) VALUES ('$profileuser', '$activity')";
        $result = mysqli_query($conn, $log);
    
        $deposit ="INSERT INTO deposits (d_id, profileuser, user, img_name, dpoints, datetime) VALUES ('$id', '$pu', '$profileuser', '$img', '$point', '$datetime')";
        $result = mysqli_query($conn, $deposit);
    
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>