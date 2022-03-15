<?php
include('connections/connection.php');
include('includes/login.php');
include('includes/register.php');
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
	
	
		<!-- <nav>
			<div class="navbar-wrapper"><div><img src="img/Glogo-white.png" alt=""  class="logo" srcset=""></div>
			<a href="#" class="toggle-button" onclick="myFunction()">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</a>
			<div class="navbars-links" id="links">
				<ul>
					<li><a href="#head">HOME</a></li>
					<li><a href="#steps">STEPS</a></li>
					<li><a href="#aboutus">ABOUT US</a></li>
					<li><a href="#contact">CONTACT</a></li>
				</ul>
			</div>
		</div>
		</nav>  -->
		<div class="top">
		
		<nav class="navbar navbar-expand-lg navbar-light">
			<img src="img/Glogo-white.png">
			<button class="navbar-toggler "id = "nav-toggle-button" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span><i class="fa-solid fa-bars fa-lg "></i></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ms-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Getting Started <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Our Team</a>
				</li>
			
				</ul>
			</div>
			</nav>
		</div>
		
	

	<header>
		<div class="nav-wrapper" id="head">
			<div class="hero-section" >
			<div class="hero-col1">
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
				<img src="img/grewardwhite.png" class="right-image">
			</div>
		</div>
		<footer class="footerSocial">
		<div class="social-wrapper">
			<li><a href="https://www.facebook.com/aldrin.ramores.77" class="facebook"><i class="fa-brands fa-facebook fa-xl"></i></a></li>
			<li><a href="https://www.instagram.com/ramoresaldrin/" class="instagram"><i class="fa-brands fa-instagram fa-xl"></i></a></li>
			<li><a href="https://github.com/aldrinnunal" class="github"><i class="fa-brands fa-github fa-xl"></i></a></li>
			<li><a href="https://www.linkedin.com/in/aldrin-ramores-556798202/" class="linkedin"><i class="fa-brands fa-linkedin-in fa-xl"></i></a></li>
		</div>
	</footer>

	
	</div>

</header>


		<!-- <section class="title-card" id="steps">
			<div class="title-card-wrapper">
				<div><img src="img/Procedures.gif" class="title-card-img" id = "img"></div>
				<div class="title-card-text">
					<h1>GETTING STARTED</h1>
					<h3>Follow This Easy Steps To Claim Your Points. Prizes May Vary Monthly</h3>
				</div>
			</div>
		</section>
 -->

<!-- 
		<section class = "card-content">
			<div class="card-content-box">
				<div class="card-1 card-box">
					<img src="img/signup.png" alt="" srcset="">
					<h3>REGISTER</h3>
					<p>Create an account before segregating your non profitable and profitable waste</p>
				</div>
				<div class="card-2 card-box">
				<img src="img/login.png" alt="" srcset="">
					<h3>LOG IN</h3>
					<p>Log your account to your respective barangay for identification</p>
				</div>
				<div class="card-3 card-box" >
					<img src="img/throw.png" alt="" srcset="">
					<h3>DROP</h3>
					<p>Once the system recognized your identity, you can now drop all your trash in the bins.</p>
				</div>
			</div>
		</section>
	
		<section class="about-us" id="aboutus">
			<div class="about-us-wrapper">
				<h1 > ABOUT US</h1>
				<p>G-Reward Is made by a group of students in Polytechnic University Of The Philippines - San Pedro Campus. We believe that we can motivate people to throw their garbage in a proper way and earning Cash or Prize in exchange. Our mission is to help the community in terms of cleanliness. It also helps the local government to earn funds for their future projects. We're excited and striving for a change in the environment of the community.</p>
			</div>
			<div class="aboutus-img"><img src="img/About us page.gif"></div>
		</section>
	
		<section class="contact-us" id="contact">
			<div class="contact-us-wrapper">
			<img src="img/Contact us-pana.png" alt="">
			
			<form action="">
			<div class="form-group">
			<h1>CONTACT US</h1>
			<h3>Have any questions? Send a message</h3>
				<div class="form-group">
					
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Full Name">
				</div>
				<div class="form-group">
					
					<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
				</div>
				<div class="form-group">
				
					<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Subject">
				</div>
				<div class="form-group">
					
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3 fixed"placeholder="Message" ></textarea>
					</div><br>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				
			</div>
		</section>

		<section class="footer">
		<div class="footer-wrapper">
			<img src="img/Glogo-white.png" alt="">

	
			<ul class="footer-nav">
				<li><a href="#head">Home</a></li>
				<li><a href="#steps">Steps</a></li>
				<li><a href="#aboutus">About Us</a></li>
				<li><a href="#contact">Contact Us</a></li>
			</ul>
		
			
			
			<ul class="footer-icons">
				 <li><a href=""><i class="fa-brands fa-github-square fa-lg"></i></a></li>
				 <li><a href=""><i class="fa-brands fa-facebook-square fa-lg"></i></a></li>
				 <li><a href=""><i class="fa-brands fa-instagram fa-lg"></i></a></li>
				 <li><a href=""><i class="fa-brands fa-twitter-square fa-lg"></i></a></li>
			</ul>

		
		</div>
		</section> -->

	

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
						   <label for="formGroupExampleInput"><i class="fa-solid fa-user"></i>   Username</label>
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