<?php
include ('../connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_SESSION['id'])){

    $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: ../../Frontend/index.php");

} else {

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    $currentprofileuser = $rows['username'];
    $userid = $rows['id'];
    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
            header("Location: ../../Frontend/index.php");
        }
    }

}
include ('../includes/timeinclude.php');
$name = $rows['profilename'];
$username = $_SESSION['username'];
include ('../includes/mainedit.php');
include('../includes/decreasepoint.php');
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
     <link rel="stylesheet" href="main.css">
   
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <title>G-Points</title>
  
  
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
                <a class="nav-link active" aria-current="page" href="#">G-Points</a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#news-title">News</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#rankings-title">Rankings</a>
              </li>

              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#profile-title">Profile</a>
              </li>
              
              <li class="nav-item ">
                <a class="nav-link active" aria-current="page" href="#logs-title">Logs</a>
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
        <!-- WELCOME USER -->
        <div class="welcome">
            <h1>Welcome!</h1>
            <h1><?php echo $rows['profilename'];?></h1>
            <p>Start earning points and claim rewards</p>
        </div>
        
       

          <!-- GPOINTS CARD -->
      <div class="gpoints">
          <div class="g-points-wrapper">
            <div class="gpoints-top">
                <h2>G-C0INS</h2>
            </div>
            <div class="gpoints-below">
              <div class="gpoints-text">
                <h4>Your Points</h4>
                <h1><?php echo $rows['points'];?></h1>
              </div>
              <!-- <div class="gpoints-button">
              <a href="">Claim</a>
              </div> -->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Launch demo modal
              </button>
            </div>
        </div>
      </div>


      <div class="main-wrapper">
          <!-- NEWS SECTION -->
           <div class="titles title0" id="news-title">
            <h2>News</h2>
           </div>
          <!-- CAROUSEL -->
          <div class="owl-carousel owl-theme">
          <?php
          $sql = "SELECT * FROM news";
          $result = mysqli_query($conn, $sql);
          $rows = mysqli_fetch_assoc($result);
          $ranker = 1; 
          do { ?>
            <div class="item"><img src="../admin/images/news/<?php echo $rows['news_img'];?>"><h4><?php echo $rows['news_title'];?></h4><p><?php echo $rows['news_description'];?><p> Posted by <?php echo $rows['postedby'];?> on <?php echo $rows['datetime'];?> | Last Updated <?php echo time_elapsed_string($rows['lastupdate']); ?>.</p>
            <a href="">continue reading...</a></p></div>
          <?php $ranker++; } while ($rows = mysqli_fetch_assoc($result))?>
          </div>

          <!-- RANKING SECTION -->
           <div class="titles title1" id="rankings-title">
            <h2>Rankings</h2>
           </div>

           <div class="rank">
             <div class="rank-wrapper">
              <div class="border-color-top"></div>
          <!-- TOP 3 -->
               <div class="rank-3">
                  <div class="top2">
                  <?php
                  $sql = "SELECT * FROM members ORDER BY points DESC LIMIT 1,2";
                  $rsult = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($rsult);
                                                 
                  ?>
                    <img src="../admin/images/profile/<?php echo $row['img_name'];?>" style="height:208px;width:208px;"><p><?php echo $row['profilename'];?></p><h5><?php echo $row['points'];?></h5>
                  </div>
                  <div class="top1">
                  <?php
                  $sql = "SELECT * FROM members ORDER BY points DESC LIMIT 0,1";
                  $rsult = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($rsult);                                      
                  ?>
                    <img src="../admin/images/profile/<?php echo $row['img_name'];?>" style="height:238px;width:238px;"><p><?php echo $row['profilename'];?></p><h5><?php echo $row['points'];?></h5>
                  </div>
                  <div class="top3">
                  <?php
                  $sql = "SELECT * FROM members ORDER BY points DESC LIMIT 2,3";
                  $rsult = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($rsult);                                               
                  ?>
                    <img src="../admin/images/profile/<?php echo $row['img_name'];?>" style="height:11rem;width:11rem;"><p><?php echo $row['profilename'];?></p><h5><?php echo $row['points'];?></h5>
                  </div>
               </div>
               
               <div class="rank-4-10">
                  <div class="ranks">
                      <table class="rank-table">
                      <?php  
                      $sql = "SELECT * FROM members ORDER BY points DESC LIMIT 3,5";
                      $result = mysqli_query($conn, $sql);
                      $rows = mysqli_fetch_assoc($result);
                      $rank = 4;
                      $number = 0;
                      do { ?>
                        <tr class = "trBorder">
                          <td><?php echo $rank;?>th</td>
                          <td class="rank-image"><img src="../admin/images/profile/<?php echo $rows['img_name'];?>" style="background:white;"></td>
                          <td><?php echo $rows['profilename'];?></td>
                          <td><?php echo $rows['points'];?></td>
                        </tr>
                        <?php $rank++;} while (($rows = mysqli_fetch_assoc($result)) and ($number <= 4))?>                 
                      </table>
                  </div>
                 
                 
               </div>
             </div>
           </div>




          <!-- PROFILE SECTION -->
           <div class="titles title2" id="profile-title">
            <h2>Profile</h2>
           </div>
           

           <!-- PROFILE IMAGE -->
        



           <div class="profile-section">
             <div class="profile">
               <form action="" method="POST" enctype="multipart/form-data">
               <div class="border-color-top"></div>
               <?php
                $sql = "SELECT * FROM members WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_assoc($result);
              ?>
              <div class="profile-image">
                <div class="image"><img src="../admin/images/profile/<?php echo $rows['img_name'];?>" class="ProfileImage" style="height:228px;width:228px;"></div><br>
               </div>
    
                <form>
                  <div class="row">
                    <div class="col">
                      <!-- USERNAME -->
                      <input type="text" class="form-control" placeholder="Username" name="uname" value="<?php echo $rows['username'];?>">
                    </div>
                    <div class="col">
                      <!-- FULLNAME -->
                      <input type="text" class="form-control" placeholder="Full name" name="fname" value="<?php echo $rows['fullname']; ?>">
                    </div>     
                  </div>
                    <!-- PROFILE -->
                    <input type="text" class="form-control" placeholder="Profile Name" name="pname" value="<?php echo $rows['profilename']; ?>">
                    <!-- CONTACT -->
                    <input type="text" class="form-control" placeholder="Contact" name="pcontact" value="<?php echo $rows['contact']; ?>"> 
                    <!-- EMAIL -->
                    <input type="email" class="form-control" placeholder="user@gmail.com" name="email" value="<?php echo $rows['email'];?>">
                    <!-- PASSWORD -->
                    <input type="password" class="form-control" placeholder="Password" name="pass" value="<?php echo $rows['password'];?>">

                  <!-- BARANGAY -->
        
                  <div class="input-group mb-3">
                  
                    <select class="custom-select" id="inputGroupSelect01" name="paddress" value="<?php echo $rows['address'];?>">
                    <option value="<?php echo $rows['address'];?>"><?php echo $rows['address'];?></option>
                      <option value="Barangay Nueva">Barangay Nueva</option>
                      <option value="Barangay San Antonio">Barangay San Antonio</option>
                      <option value="Barangay San Vicente">Barangay San Vicente</option>
                      <option value="Barangay San Roque">Barangay San Roque</option>
                      <option value="Barangay Landayan">Barangay Landayan</option>
                   
                    </select>
                  </div>
                  
                    <!-- SAVE CHANGES -->
                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-outline-primary" name="submit">Save Changes</button>
                    </div>
                 
                    <!-- HIDDEN FILE INPUT -->
                    <input type="file" class="custom-file-input UploadImage" id="inputGroupFile02" name="image">
                    <input type="hidden" name="current_image" value="<?php echo $rows['img_name'];?>">
                    <input type="hidden" name="id" value="<?php echo $rows['id'];?>">

                </form>
                <div class="border-color-top"></div>
               </form>
             </div>
           </div>




          <!-- LOGS SECTION -->
           <div class="titles title3" id="logs-title">
            <h2>Logs</h2>
        </div>
          <div class="table-wrapper">
            <table class="table table-bordered">
              <thead>
                <tr class ="toplefttable">
                  <th scope="col">User</th>
                  <th scope="col">Activity</th>
                  <th scope="col">Date</th>
                  <th scope="col">Elapsed Time</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $sql = "SELECT * FROM logs WHERE user='$currentprofileuser' ORDER BY id DESC Limit 0,5";
              $result = mysqli_query($conn, $sql);
              $rows = mysqli_fetch_assoc($result);                               
              $rank = 1;
              $number = 0;
              do { ?>
                <tr>
                  <th scope="row"><?php echo $rows['user'];?></th>
                  <td><?php echo $rows['activity'];?></td>
                  <td><?php echo $rows['datetime'];?></td>
                  <td><?php echo time_elapsed_string($rows['daysago']);?></td>
                </tr> 
                <?php $rank++;} while (($rows = mysqli_fetch_assoc($result)) and ($number <= 5))?>
              </tbody>
            </table>
            
          </div>
        <!-- MAIN WRAPPER END -->
        </div>
      </div>











      <div class="footer-wrapper">
            <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <img src="main-images/grewardwhite.png" alt="">
           
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Link</h6>
            <ul class="footer-links">
              <li><a href="#">G-Points</a></li>
              <li><a href="#news-title">News</a></li>
              <li><a href="#rankings-title">Rankings</a></li>
              <li><a href="#profile-title">Profile</a></li>
              <li><a href="#logs-title">Logs</a></li>
            
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Information</h6>
            <ul class="footer-links">
            
              <li><a href="#">About Us</a></li>
              <li><a href="#">Getting Started</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Our Team</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by 
          G-Reward
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-github"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>
          </footer> 
        </div>
 

        <!-- CLAIM MODAL -->
        <div class="claim">
          <div class="claim-wrapper">
           

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Claim Rewards</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>




                          <div class="modal-body">
                          <div class="container px-4">


                          <div class="container">
                          <?php                            
                          $sql = "SELECT * FROM prizes";
                          $result = mysqli_query($conn, $sql);
                          $rows = mysqli_fetch_assoc($result);
                          $number = 0;
                          do { ?>
                            <div class="row align-items-center">
                              <form action="" method="POST" enctype="multipart/form-data" style="display:inline-flex;">
                                <div class="col">
                                  <?php echo $rows['prize'];?>
                                </div>
                                <div class="col">
                                <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-primary btn-lg"  name="rsubmit" value="<?php echo $rows['price']; ?>">
                                <?php echo $rows['price']; ?>
                                </button>
                                </div>
                              </form>
                            </div>
                          <?php $number++; } while (($rows = mysqli_fetch_assoc($result)) and ($number <= 10))?> 
                          </div>





                        </div>
                      </div>
                    </div>  
                    <!-- END OF MODAL -->

          </div>
        </div>
    
      
     





  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
 <!-- OWL JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- MY JS -->
  <script src="main.js"></script>


  
      
  </body>
</html>