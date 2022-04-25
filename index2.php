<?php
include('connections/connection.php');
include('includes/login.php');
include('includes/register.php');

$gdata = $_GET["gdata"];
if ($gdata == "1") {
    $_SESSION['test'] = "<div class='message warning'><h5>Incorrect Username or Password.</h5></div>";
    echo "<meta http-equiv='refresh' content='0'>";
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- MYCSS -->
	
	<link href="css/login1.css" rel="stylesheet" type="text/css" /></link>
	<link href="css/style.css" rel="stylesheet" type="text/css" /></link>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- BOOTSTRAP JS -->
	<script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!-- JS -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="login.js"></script>
	<script src="includes/modal.js"></script> 
	
</head>
<body>
	

		<div class="top">
		
		<nav class="navbar navbar-expand-lg">
			<img src="img/Glogo-white.png">
			<button class="navbar-toggler "id = "nav-toggle-button" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span><i class="fa-solid fa-bars fa-lg "></i></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ms-auto">
				<li class="nav-item active">
					<a class="nav-link" href="mainPage/GettingStarted.php">Getting Started <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mainPage/AboutUs.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mainPage/ContactUs.php">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mainPage/OurTeam.php">Our Team</a>
				</li>
			
				</ul>
			</div>
			</nav>
		</div>
		
	
 
	<header>
		<div class="nav-wrapper" id="head">
			<div class="hero-section" >
			<div class="hero-col1">
				<?php echo $_SESSION['test'];
    			unset($_SESSION['test']);?>
				<h1>SEGREGATE WASTE<br> EARN POINTS<br> CLAIM PRIZES!!!</h1>
				<div class="hero-btn">
				<button type="button" class="btn2 btn1" data-toggle="modal" data-target="#SignInModal">
				SIGN IN
				</button>
				<button type="button" class="btn2 btn3" data-toggle="modal" data-target="#SignUpModal">
				SIGN UP
				</button>
				</div>
			</div>
			<div class="hero-col2">
				<img src="img/grewardwhite.png" class="right-image img-fluid">
			</div>
		</div>





		<footer class="footerSocial">
		<div class="social-wrapper">
			<li><a href="https://www.facebook.com/aldrin.ramores.77" class="facebook"><i class="fa-brands fa-facebook fa-xl"></i></a></li>
			<li><a href="https://www.instagram.com/ramoresaldrin/" class="instagram"><i class="fa-brands fa-instagram fa-xl"></i></a></li>
			<li><a href="https://github.com/cielzguerrero" class="github"><i class="fa-brands fa-github fa-xl"></i></a></li>
			<li><a href="https://www.linkedin.com/in/aldrin-ramores-556798202/" class="linkedin"><i class="fa-brands fa-linkedin-in fa-xl"></i></a></li>
		</div>
	</footer>

	
	</div>

</header>

	

			<!-- MODAL -->
		
			

	<div class="modal fade" id="SignInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content w-75">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">SIGN IN</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<div class="modal-body">
				<form action="" class="text-center" method="post">
					<div class="form-group w-100 ">
						   <label for="formGroupExampleInput"><i class="fa-solid fa-user"></i>  Username</label>
 						   <input type="text" class="form-control w-75 shadow-none"  id="formGroupExampleInput" name="username" id="username" placeholder="">
					</div>
					<div class="form-group w-100">
						<label for="exampleInputPassword1"><i class="fa-solid fa-key"></i>  Password</label>
						<input type="password" class="form-control w-75 shadow-none" id="exampleInputPassword1" name="password" id="password" placeholder="">
					</div>

					<div class="modal-footer ">
					<input type="submit" name="submit" value="Sign In" class="btn btn-primary w-75">
				</div>
				</form>
				<?php if (isset($_SESSION['login'])){
    			echo $_SESSION['login'];
    			unset($_SESSION['login']);
				}?>
			</div>
				</div>
		</div>
	</div>



	
				<div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">SIGN UP</h5>
				
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<div class="modal-body">
			<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						   <label for="formGroupExampleInput">Username</label>
 						   <input type="text" class="form-control shadow-none" id="formGroupExampleInput" placeholder="" name="rusername" autocomplete="off" required>
					</div>
					<div class="form-group">
						   <label for="formGroupExampleInput">Full Name</label>
 						   <input type="text" class="form-control shadow-none" id="formGroupExampleInput" placeholder="" name="rfullname" autocomplete="off" required>
					</div>
					<div class="form-group">
						   <label for="formGroupExampleInput">Profile Name</label>
 						   <input type="text" class="form-control shadow-none" id="formGroupExampleInput" placeholder="" name="rprofilename" autocomplete="off" required>
					</div>
				<form>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control shadow-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ex: user@gmail.com"  name="remail" id="remail" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput">Contact</label>
						<input type="text" class="form-control shadow-none" id="formGroupExampleInput"  name="rcontact" autocomplete="off" required>
				
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control shadow-none" id="exampleInputPassword1" name="rpassword" placeholder="" autocomplete="off" required>
					</div>
				
					<div class="form-group">
					<label for="exampleFormControlSelect1">Barangay</label>
					<select class="form-control" id="exampleFormControlSelect1" name="raddress" autocomplete="off" required>
						<option>Barangay Nueva</option>
						<option>Barangay San Roque</option>
						<option>Barangay Landayan</option>
						<option>Barangay San Vicente</option>
						<option>Barangay San Antonio</option>
					</select>
					<label for="exampleFormControlSelect1">Status</label>
					<select class="form-control" id="exampleFormControlSelect1" name="rstatus" autocomplete="off" required>
						<option>Member</option>
					</select>
					<br>

					<div class="form-group">
						<label for="exampleFormControlFile1">Upload Profile Photo</label>
						<button class="btn " type="button"><input type="file" name="image"></button>
					</div>
					<form>

					<div class="modal-footer">
				

					
					<input type="submit" name="registersubmit" value="Confirm" class="btn btn-primary w-75">
				</div>
				</form>
			</form>
			</div>
				
			</div>
		</div>
	</div>
	
</body>
</html>