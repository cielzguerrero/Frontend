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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- METERIAL DESIGN -->
	<!-- MDB -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
	rel="stylesheet"
	/>
	<!-- MDB -->
	<script
	type="text/javascript"
	src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
	></script>
	<!-- BOOTSTRAP JS -->
	<script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- JS -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="login.js"></script>
	<script src="includes/modal.js"></script> 
	
</head>
<body>
	
<!-- NAV -->

<nav class="navbar navbar-expand-lg ">
<img src="img/grewardwhite.png" class = "img-fluid">
			<button class="navbar-toggler "id = "nav-toggle-button" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span><i class="fa-solid fa-bars fa-lg "></i></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ms-auto text-end">
				<li class="nav-item active">
					<a class="nav-link fs-6" href="mainPage/GettingStarted.php">Getting Started </a>
				</li>
				<li class="nav-item">
					<a class="nav-link fs-6" href="mainPage/AboutUs.php">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link fs-6" href="mainPage/ContactUs.php">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link fs-6" href="mainPage/OurTeam.php">Our Team</a>
				</li>
			
				</ul>
			</div>
</nav>

<!-- HERO -->
<div class="content container-fluid text-center  ">
				<?php echo $_SESSION['test'];
    			unset($_SESSION['test']);?>
    <h1 class = "text-white display-5">SEGREGATE WASTE, EARN POINTS,   & CLAIM PRIZES</h1>
	<p class = "fs-4 text-white "> A rewarding system built for the community.</p>
	<!-- Button trigger modal -->
	<div class="d-flex  justify-content-center pt-3">
	<button type="button" class="btn  px-5 py-3 fs-5" data-bs-toggle="modal" data-bs-target="#exampleCentralModal3">
	Sign In
	</button>

	</div>

</div>
	




<!-- SOCIAL LINKS -->
<section class="socials text-center align-bottom d-flex justify-content-center">

		<ul class = "inline-block d-flex justify-content-between mt-5 pt-5">
		<li><a href="https://www.facebook.com/cielits"><i class="fa-brands fa-facebook-f fa-lg me-5"></i></a></li>
		<li><a href="https://www.instagram.com/ramoresaldrin/"><i class="fa-brands fa-instagram fa-lg me-5" ></i></a></li>
		<li><a href="https://twitter.com/hahaxdddddd"><i class="fa-brands fa-twitter fa-lg me-5"></i></a></li>
		</ul>
</section>



<!-- MODAL SIGN IN/ SIGN UP -->
<div class="modal fade" id="exampleCentralModal3" tabindex="-1" aria-labelledby="exampleModalLabel" data-gtm-vis-first-on-screen-2340190_1302="23386" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-body p-4">
              <!-- Pills navs -->
              <ul class="nav nav-pills dark mb-3 ms-auto" id="ex1" role="tablist">
                <li class="nav-item text-center" role="presentation">
                  <a class="nav-link active" id="mdb-tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link  " id="mdb-tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
              </ul>
              <!-- Pills navs -->

              <!-- Pills content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="mdb-tab-login">


				<!-- SIGN IN FORM -->
                  <form action = "" method = "post">

                    <!-- USERNAME input -->
                    <div class="form-outline mb-4">
                      <input type="text" name="username" id="username" class="form-control" required>
                      <label class="form-label" for="loginName" style="margin-left: 0px;"> Username</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 114.4px;"></div><div class="form-notch-trailing"></div></div></div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="password" class="form-control" required>
                      <label class="form-label" for="loginPassword" style="margin-left: 0px;">Password</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64.8px;"></div><div class="form-notch-trailing"></div></div></div>

               

                    <!-- Submit button -->
                    <button type="submit" name = "submit" class="btn btn-dark btn-block mb-4 fs-5">Sign in</button>

                  
                  </form>

						<?php if (isset($_SESSION['login'])){
						echo $_SESSION['login'];
						unset($_SESSION['login']);
						}?>

                </div>
                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="mdb-tab-register">



				<!-- SIGN UP FORM -->
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="text-center mb-3">
                      
                    <!-- UserName input -->
                    <div class="form-outline mb-4">
                      <input type="text" id="registerName" name = "rusername" class="form-control">
                      <label class="form-label" for="registerName" style="margin-left: 0px;">Username</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

                    <!-- FullName input -->
                    <div class="form-outline mb-4">
                      <input type="text" id="registerUsername" name = "rfullname" class="form-control">
                      <label class="form-label" for="registerUsername" style="margin-left: 0px;">Full Name</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

					   <!-- Profile Name input -->
					   <div class="form-outline mb-4">
                      <input type="text" id="registerUsername" name = "rprofilename" class="form-control">
                      <label class="form-label" for="registerUsername" style="margin-left: 0px;">Profile Name</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" id="registerEmail" name = "remail" class="form-control" required>
                      <label class="form-label" for="registerEmail" style="margin-left: 0px;">Email</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>

					  <!-- Contact input -->
					  <div class="form-outline mb-4">
                      <input type="text" id="registerUsername" name = "rcontact" class="form-control">
                      <label class="form-label" for="registerUsername" style="margin-left: 0px;">Contact</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>


                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" id="registerPassword" name = "rpassword" class="form-control">
                      <label class="form-label" for="registerPassword" style="margin-left: 0px;">Password</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 8px;"></div><div class="form-notch-trailing"></div></div></div>



					<!-- BARANGAY SELECT -->
					<select class="form-select mb-4" name = "raddress" aria-label="Default select example">
						<option selected>Select Barangay</option>
						<option>Barangay Nueva</option>
						<option>Barangay San Roque</option>
						<option>Barangay Landayan</option>
						<option>Barangay San Vicente</option>
						<option>Barangay San Antonio</option>
					</select>

					<!-- STATUS -->
					<select class="form-select mb-4" name = "rstatus" aria-label="Default select example">
						<option>Member</option>
					</select>

					<!-- FILE UPLOAD -->
					<div class="mb-3">
					<label for="formFile text-start">Upload Profile Photo</label>

					<input class="form-control" name = "image" type="file" id="formFile">
					</div>


                    <!-- Submit button -->
                    <button type="submit" name ="registersubmit" class="btn btn-dark btn-block mb-1 fs-5">CONFIRM</button>
                  </form>


                </div>
              </div>
              <!-- Pills content -->
            </div>
          </div>
        </div>
      </div>












			

	
</body>
</html>