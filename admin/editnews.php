<?php
include('connections/connection.php');
include('includes/afterlogin.php');

 if (!isset($_GET['ID'])){
 
     $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
     header("Location: carousel.php");
 
 } else {
 
     $id = $_GET['ID'];
 
     $sql = "SELECT * FROM news WHERE news_id = $id";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
 
     if($result == TRUE) {
         $count = mysqli_num_rows($result);
         
         if ($count > 0) {
         } else {
             $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
             header("Location: carousel.php");
         }
     }
 
 }
 if (isset($_POST['submit'])) {
     $time = date("Y-m-d H:i:s");
     $username = $_SESSION['username'];
     $activity = "Updated News";
     $id = $_POST['id'];
     $newstitle = $_POST['newsname'];
     $description = $_POST['newsdesc'];
     $newscont = $_POST['newscontent'];
     $current_image = $_POST['current_image'];
     $image_name = $_POST['image'];
     $lastedited = date("Y-m-d H:i:s");
     if(isset($_FILES['image']['name'])){
 
         $image_name = $_FILES['image']['name'];
 
             if($image_name != ""){
 
                 //Rename Image
                 $extension = end(explode('.', $image_name));
                 $image_name = "News-". rand(000, 999). "." .$extension;
     
                 $sourcepath = $_FILES['image']['tmp_name'];
                 $destinationpath = "images/news/".$image_name;
     
                 $upload = move_uploaded_file($sourcepath, $destinationpath);
     
                 if($upload == FALSE) {
                     $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                     header("Location: carousel.php");
     
                     die();
                 }
 
                 if($current_image != "") {
                     $remove_path = "images/news/".$current_image;
                     $remove = unlink($remove_path);
     
                     if($remove == FALSE){
                         $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                         header("Location: carousel.php");
                         die();
                     }
                 }
             } else {
                 $image_name = $current_image;
             }
         } else {
             $image_name = $current_image;
         }
 
     $sql = "UPDATE news SET news_title = '$newstitle', news_description = '$description', news_content = '$newscont', news_img = '$image_name' WHERE news_id = '$id'";
     $result = mysqli_query($conn, $sql);
 
     if($result) {
         $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
         $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
         $result = mysqli_query($conn, $log);
         header("Location: carousel.php");
     } else {
         $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
         header("Location: carousel.php");
     }
 }

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale = 1">
    <title>Waste Management</title>
    <link href="css/newstyle.css" rel="stylesheet" type="text/css" /></link>
    <link href="css/prize.css" rel="stylesheet" type="text/css" /></link>
    <link href="css/news.css" rel="stylesheet" type="text/css" /></link>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    
</link>
<script src="js/dist/chart.js"></script>
<script src="js/slideshow.js"></script>
</head>
<body>
<?php include('timeinclude.php');?>
    <input type="checkbox"  id="navigation-toggle">
    <div class="sidebar">
        
        <div class="sidebar-brand">
        <h3><span class="las la-leaf"></span> <span>Waste Management</span> </h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="newindex.php"><span class="las la-signal"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="garbagetype.php"><span class="las la-signal"></span>
                    <span>Garbage Type</span></a>
                </li>
                <li>
                    <a href="carousel.php" class="active"><span class="las la-signal"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php"><span class="las la-signal"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="actionlog.php"><span class="las la-signal"></span>
                    <span>Logs</span></a>
                </li>
                <li>
                    <a href="analytics.php"><span class="las la-signal"></span>
                    <span>Analytics</span></a>
                </li>
                <li>
                    <a href="index.php"><span class="las la-signal"></span>
                    <span>Sign-Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h1>
                <label for="navigation-toggle">
                    <div><span class="las la-bars"></span>Edit News</div>
                </label>
            </h1>
            <div class="user-wrapper">
                <h4>
                <div class="las la-clock"><span  iD="runningTime"></span></div></h4>
            </div>
            <div class="user-wrapper">
                <div>
                <h4><div class="las la-user-tie"></div>
                <?php echo $afullname;?></h4>
                <small><?php echo $astatus;?></small>
                </div>
            </div>
      
        </header>
        <main>
            <div class="editprizegrid">
                <div class="editwrapperz">
                        <div class="editprizecontent">
                            <form class="formedit" action="" method="POST" enctype="multipart/form-data">                            
                                        <div class="addcontent">
                                            <div class="addcontentdesign" style="padding:.5rem;">              
                                                <h3>Name: <input type="text" name="newsname" value="<?php echo $row['news_title']; ?>" autocomplete="off" required> </h3>                           
                                                <h3>Description: <input type="text" name="newsdesc" value="<?php echo $row['news_description']; ?>" autocomplete="off" required></h3>                                              
                                                <h3 class="newsimage">News Image: <input type="file" name="image" style="font-size: 1.5rem;"></h3>
                                                <h3>News Content :</h3>
                                                <textarea name="newscontent" id="newscontent" class="form-control" rows="16" ><?php echo $row['news_content'];?></textarea>
                                                <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
                                                <script type="text/javascript" >                        
                                                    CKEDITOR.replace( 'newscontent' );
                                                </script>
                                                <input type="hidden" name="current_image" value="<?php echo $row['news_img'];?>">
                                                <input type="hidden" name="id" value="<?php echo $row['news_id'];?>">
                                            </div>  
                                        </div>
                                        <div class="addactions">
                                            <h3>Current Image: 
                                            <img src="images/news/<?php echo $row['news_img'];?>" style = "width:7rem;height:7rem;border-style:solid;border-radius:5px;padding:0.5rem;border-width:2px;" onerror="this.style.display='none';"></h3>
                                            <div class="addcontentdesignnews" style="padding:.5rem;">
                                                <h2 class="buttonaction">Actions</h2>
                                                <button class=""><a href="carousel.php">Return</a> </button>
                                                <input type="submit" name="submit" value="Done Edit" class="btn-secondary">
                                            </div>
                                        </div>                   
                            </form>
                        </div>
                </div>
                
            </div>         
        </main>
    </div>
</body>

</html>