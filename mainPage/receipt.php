<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="receipt.css">
   
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
</head>
<body>
        
<div class="nav-main">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="main-images/Glogo-white.png" alt="" srcset=""></a>

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
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../mainPage/mainFinal.php">Home</a>
              </li>
              
          


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                  <img src="../admin/images/profile/<?php echo $rows['img_name'];?>" alt="" style="height:50px;width:50px;">
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#logs-title">Logs</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="../logout.php">Sign Out</a></li>
                </ul>
              </li>
             
            </ul>
            
          </div>
        </div>
      </nav>



  
</div>
    <!-- MAIN CONTENT -->
    <div class="receipt">
          <div class="receipt-wrapper">
              <img src="../mainPage/main-images/rewardImage.png">
          

          </div>
           
        <div class="receipt-contents">  
            <h1>Your Reward is ready to Claim!</h1>
            <h2>"Don't forget to screenshot this"</h2>
            <br>
             <h3>USERNAME</h3>
             <h3>Full name</h3>
             <h3>Barangay San Antonio</h3>
             <p>Reward to Receive: 500 pesos </p>
             <h5>Date: 12/11/22</h5>
             <h5>Time: 5:00pm</h5>

        </div>
         
                  
      </div>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>