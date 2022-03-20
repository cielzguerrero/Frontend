<?php
if (isset($_POST['asubmit'])){
    $time = date("Y-m-d H:i:s");
    $username = $ausername;
    $activity = $afullname." edited Admin Profile";
    $full_name = $_POST['afullname'];
    $user_name = $_POST['ausername'];
    $pass_word = $_POST['apass'];

        $sql = "UPDATE users SET fullname = '$full_name', username = '$user_name' , password = '$pass_word' WHERE id = '$aid'";
        $result = mysqli_query($conn, $sql);
    
        if($result) {
            $_SESSION['aupdate'] = "<div class='message success'>Details Updated Successfully!</div>";
            $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
            $result = mysqli_query($conn, $log);
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            $_SESSION['aupdate'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
}
?>