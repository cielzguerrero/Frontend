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
		header("Location: AdminTailWind/dashboard.php"); 
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
            echo '<div class="claimAlert flex p-4 text-center justify-center text-md text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div>
              <span class="font-medium text-center">Incorrect Username or Password</span> 
            </div>
          </div>';
            // $_SESSION['login'] = "<div class='message warning'><h5>Incorrect Username or Password.</h5></div>";
        }
    }
    else
    {
        // $_SESSION['login'] = "<div class='message warning'><h5>Incorrect Username or Password.</h5></div>";

    }
}
?>     
