<?php
include ('../includes/contactform.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <!-- OWL CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="../mainPage/subtabs.css">
   
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <title>G-Points</title>
  
  
  </head>
  <body>
      
<div class="nav-main">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="main-images/Glogo-white.png" ></a>

          <!-- HAMBURGER -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon navbar-light"></span> -->
           
            <span class="clickHamburger">
                <div class="bar bar1 active"></div>
                <div class="bar bar2 active"></div>
                <div class="bar bar3 active"></div>
            </span>
          </button>

          <!-- LINKS -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2  align-items-center">
                
            <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="GettingStarted.php">Getting Started</a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="AboutUs.php">About Us</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="ContactUs.php">Contact</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="OurTeam.php">Our Team</a>
              </li>
        
            </ul>
            
          </div>
        </div>
      </nav>
</div>

<!-- CONTENTS -->

<section class="contact-us" id="contact">
			<div class="contact-us-wrapper">
			<img src="../img/Contact us-pana.png" alt="">
			
			<form action="" method="POST">
			<div class="form-group">
			<h1>CONTACT US</h1>
			<h3>Have any questions? Send us a message</h3>
				<div class="form-group">
					
					<input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="Full Name">
				</div>
				<div class="form-group">
					
					<input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Email">
				</div>
				<div class="form-group">
				
					<input type="text" class="form-control" id="exampleInputPassword1" name="subject" placeholder="Subject">
				</div>
				<div class="form-group">
					
						<textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3 fixed"placeholder="Message" ></textarea>
					</div><br>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>
				
			</div>
		</section> 










  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
  <!-- MY JS -->
  <script src="main.js"></script>


  
      
  </body>
</html>