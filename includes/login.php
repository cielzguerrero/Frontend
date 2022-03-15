<?php 
if(isset($_POST['submit'])){

$username = mysqli_real_escape_string($conn, $_POST['username']); 
$password = mysqli_real_escape_string($conn, $_POST['password']); 
$sql = "SELECT * FROM members WHERE username = '$username' AND password = '$password'";
				
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$fullname = $row['fullname'];
$status = $row['status'];
$id = $row['id'];
if ($count == 1) {
	if ($status == "Admin")
		{
		$_SESSION['login'] = "<div class='message success'>Logged In Successfully!</div>";
		$_SESSION['username'] = $username;
		$_SESSION['fullname'] = $fullname;
		$_SESSION['status'] = $status;
		header("Location: admin/index.php");  
		}
	else if($status == "Member")
		{
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $username;
		header("Location: mainPage/mainFinal.php");
		}
		else
		{
			$_SESSION['login'] = "<div class='message warning'>Incorrect Username or Password.</div>";
		}
} else {
		$_SESSION['login'] = "<div class='message warning'>Incorrect Username or Password.</div>";
				}
}
?>     