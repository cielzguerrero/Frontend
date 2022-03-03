<?php
include ('connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_SESSION['id'])){

    $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: index.php");

} else {

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);

    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
            header("Location: index.php");
        }
    }

}
 function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime, new DateTimeZone('Asia/Manila'));
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
$name = $rows['profilename'];
if (isset($_POST['submit'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    
    $activity = "Edited Profile";
    $profile_name = $_POST['pname'];
    $dc = date('Y-m-d');
    $full_name = $_POST['fname'];
    $pstatus = $_POST['sname'];
    $user_name = $_POST['uname'];
    $pass_word = $_POST['pass'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $current_image = $_POST['current_image'];
    $image_name = $_POST['image'];
    $address = $_POST['paddress'];
    $contact = $_POST['pcontact'];
    if(isset($_FILES['image']['name'])){
 
        $image_name = $_FILES['image']['name'];

            if($image_name != ""){

                //Rename Image
                $extension = end(explode('.', $image_name));
                $image_name = "Profile-". rand(000, 999). "." .$extension;
    
                $sourcepath = $_FILES['image']['tmp_name'];
                $destinationpath = "admin/images/profile/".$image_name;
    
                $upload = move_uploaded_file($sourcepath, $destinationpath);
    
                if($upload == FALSE) {
                    $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                    echo "<meta http-equiv='refresh' content='0'>";
                    die();
                }

                if($current_image != "") {
                    $remove_path = "admin/images/profile/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove == FALSE){
                        $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                        echo "<meta http-equiv='refresh' content='0'>";
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }
    
    
        $sql = "UPDATE members SET profilename = '$profile_name', fullname = '$full_name', email = '$email', address = '$address', img_name = '$image_name' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
    
        if($result) {
            $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
            $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
            $result = mysqli_query($conn, $log);
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale = 1">
        <title>Document</title>
        <link href="scss/main1.css" rel="stylesheet" type="text/css" /></link>
        <link href="scss/main1.scss" rel="stylesheet" type="text/css" /></link>
        <link href="scss/carousel.css" rel="stylesheet" type="text/css" /></link>
        
        <!-- BOOTSTRAP -->
        <!-- ICONS -->
        <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
        <!-- FONT AWESOME -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/></link>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></link>
        <link rel="stylesheet" href="scss/footer.css">
       
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
        <script src="js/Main.js"></script> 
    </head>
<body>
        

        <div class="navbar">
            <div class="navbar-wrapper">
                <div><img src="img/Glogo-white.png" class="logo"></div>
                <ul class="navlinks">
                    <li><a href="">G-Points</a></li>
                    <li><a href="#newspage">News</a></li>
                    <li><a href="#profilepage">Profile</a></li>
                    <li><a href="">Transactions</a></li>
                    <li><a href="logout.php">Sign Out</a></li>
                 
                </ul>
            </div>
        </div>


        <div class="points">
            <div class="points-wrapper">
                <div class="content-wrapper">
                    <div class="content-upper">
                        <p>Available Points</p>
                        <h2><?php echo $rows['points'];?></h2>
                        
                    </div>
                    <div class="content-lower">
                        <h4><?php echo $rows['profilename'];?></h4>
                        <p><i class="fa-solid fa-user-check"></i><?php echo $rows['contact'];?></p>
                        <input type="button" class="btn1" value="History">
                        <input type="button" class="btn2" value="Claim">
                    </div>
                </div>
             </div>
        </div>

                <div class="news-title">
                <div class="news-title-wrapper">
                    <h1>Featured News</h1>
                </div>
                </div>
       <!-- CAROUSEL -->

       <div class="power-grid" id="newspage">
        <div class="prize-wrapper">
            <div class="box">
                <div class="indexslideshow-box">
                    <div class="indexbox-wrapper">
                        <?php
                        $sql = "SELECT * FROM news";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_assoc($result);
                        $ranker = 1; 
                        do { ?>
                        <div class="indexprizebox">
                            <img src="admin/images/news/<?php echo $rows['news_img'];?>" style = "width:100%; height:auto;">
                            <div class="slide-description">
                            <H1><?php echo $rows['news_title'];?></H1>
                            <H2><?php echo $rows['news_description'];?></H2>
                            <p>Posted by <?php echo $rows['postedby'];?> on <?php echo $rows['datetime'];?> | Last Updated <?php echo time_elapsed_string($rows['lastupdate']); ?>.</p>
                            </div>  
                        </div>
                        <?php $ranker++; } while ($rows = mysqli_fetch_assoc($result))?>
                        </div>   
                        
                    </div>
                </div>
              
               
            </div>
        </div>

        <!-- PROFILE -->


        <div class="news-title">
            <div class="news-title-wrapper">
                <h1>Profile</h1>
            </div>
            </div>
            
        <section class = "profile" id="profilepage">
            <div class="container-xl px-4 mt-8">
                <form action="" method="POST" enctype="multipart/form-data">
                <?php
                $sql = "SELECT * FROM members WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_assoc($result);
                ?>
                <hr class="mt-0 mb-2">
                <div class="row">
                    <div class="col-xl-5">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img src="admin/images/profile/<?php echo $rows['img_name'];?>" class="img-account-profile rounded-circle mb-1" >
                                <input type="hidden" name="current_image" value="<?php echo $rows['img_name'];?>">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-1">--JPG or PNG no larger than 5 MB--</div>
                                <!-- Profile picture upload button-->
                                <button class="btn btn-primary" type="button"><input type="file" name="image"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                        <input class="form-control" id="inputUsername" type="text" placeholder="ex: JuanCruz48" name="pname" value="<?php echo $rows['profilename'];?>">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="mb-3">
                                        <input class="form-control" id="inputUsername" type="text" placeholder="Fullname" name="fname" value="<?php echo $rows['fullname']; ?>">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">                           
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" name="email" value="<?php echo $rows['email'];?>">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Default select example" name="paddress" value="<?php echo $rows['address'];?>">
                                                <option selected>Barangay</option>
                                                <option value="San Roque">San Roque</option>
                                                <option value="Nueva">Nueva</option>
                                                <option value="San Vicente">San Vicente</option>
                                              </select>
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="button" name="submit"><input type="submit" name="submit" value="Save changes"></button>
                                    <input type="hidden" name="id" value="<?php echo $rows['id'];?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>  
        </section>
            
     <div class="footer">
        <div class="footer-wrapper">
            <div class="footer-icons">
                <img src="img/grewardwhite.png" alt="" srcset="">
           
            </div>
                
            <div class="footer-quick-links ">
                <ul>
                    <li><p>Quick Links</p></li>
                    <li><a href="">G-Points</a></li>
                    <li><a href="">News</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="">Transactions</a></li>
                </ul>
            </div>   

            <div class="footer-quick-links  ">
                <ul>
                    <li><p>Information</p></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="">Getting Started</a></li>
                    <li><a href="">Our Team</a></li>
                    
                </ul>
            </div>   

            <div class="footer-quick-links">
                
                <ul class="footer-icons footer-media">
                    <li><p>Follow us!</p></li>
                    <div class="footer-socials">
                    <li><a href=""><i class="fa-brands fa-github-square fa-2xl"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook-square fa-2xl"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter-square fa-2xl"></i></a></li></div>
			    </ul>
                <div class="copy-right">
                <div class="copy-wrapper">
                <p> &copy; G-Reward All rights Reserved 2022 </p>
                </div>
               
    </div>
             
            </div>   
               

        </div>
               
                
    </div>
     
    
      
</body>
</html>