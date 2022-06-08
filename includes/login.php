<?php 
if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $fullname = $row['fullname'];
    $status = $row['status'];
    $adminid = $row['id'];
    if ($count == 1) {
         
        $_SESSION['login'] = "<div class='message success'>Logged In Successfully!</div>";
		$_SESSION['username'] = $username;
		$_SESSION['fullname'] = $fullname;
		$_SESSION['status'] = $status;
        $_SESSION['adminid'] = $adminid;
		header("Location: admin/newindex.php"); 
    } else if($count == 0){
        $sql = "SELECT * FROM members WHERE username = '$username' AND password = '$password'";				
        $rresult = mysqli_query($conn, $sql);
        $rcount = mysqli_num_rows($rresult);
        $rows = mysqli_fetch_assoc($rresult);
        $fullname = $rows['fullname'];
        $status = $rows['status'];
        $id = $rows['id'];
        if ($rcount == 1 AND $status == "Member" ){
        $_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
        // Old Main Design
		// header("Location: mainPage/mainFinal.php");

        //New Main Design 
        header("Location: mainPage/MainTailWind.php");
        }
        else
        {
            $_SESSION['login'] = "<div class='message warning'><h5>Incorrect Username or Password.</h5></div>";
        }
    }
    else
    {
        $_SESSION['login'] = "<div class='message warning'><h5>Incorrect Username or Password.</h5></div>";

    }
}
?>     
