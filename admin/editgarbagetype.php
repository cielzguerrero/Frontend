<?php
include('connections/connection.php');

if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
 include('chartjava.php');
 if (!isset($_GET['ID'])){
 
     $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
     header("Location: carousel.php");
 
 } else {
 
     $id = $_GET['ID'];
 
     $sql = "SELECT * FROM garbagetype WHERE garbage_ID = $id";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
 
     if($result == TRUE) {
         $count = mysqli_num_rows($result);
         
         if ($count > 0) {
         } else {
             $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
             header("Location: garbagetype.php");
         }
     }
 
 }
 if (isset($_POST['submit'])) {
     $time = date("Y-m-d H:i:s");
     $username = $_SESSION['username'];
     $activity = "Updated Garbage Type";
     $id = $_POST['id'];
     $garbagename = $_POST['gname'];
     $points = $_POST['gpoints'];
     $current_image = $_POST['current_image'];
     $image_name = $_POST['image'];
     if(isset($_FILES['image']['name'])){
 
         $image_name = $_FILES['image']['name'];
 
             if($image_name != ""){
 
                 //Rename Image
                 $extension = end(explode('.', $image_name));
                 $image_name = "GarbageType-". rand(000, 999). "." .$extension;
     
                 $sourcepath = $_FILES['image']['tmp_name'];
                 $destinationpath = "images/garbage/".$image_name;
     
                 $upload = move_uploaded_file($sourcepath, $destinationpath);
     
                 if($upload == FALSE) {
                     $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                     header("Location: garbagetype.php");
     
                     die();
                 }
 
                 if($current_image != "") {
                     $remove_path = "images/garbage/".$current_image;
                     $remove = unlink($remove_path);
     
                     if($remove == FALSE){
                         $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                         header("Location: garbagetype.php");
                         die();
                     }
                 }
             } else {
                 $image_name = $current_image;
             }
         } else {
             $image_name = $current_image;
         }
 
     $sql = "UPDATE garbagetype SET garbage_Name = '$garbagename', garbage_Points = '$points', garbage_Img = '$image_name' WHERE garbage_ID = '$id'";
     $result = mysqli_query($conn, $sql);
 
     if($result) {
         $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
         $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
         $result = mysqli_query($conn, $log);
         header("Location: garbagetype.php");
     } else {
         $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
         header("Location: garbagetype.php");
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> 
</link>
<script src="js/dist/chart.js"></script>
<script src="js/slideshow.js"></script>
</head>
<body>
<?php include('timeinclude.php');
include('chartjava.php');?>
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
                    <a href="#"><span class="las la-signal"></span>
                    <span>Analytics(Post-Poned)</span></a>
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
                    <div><span class="las la-bars"></span>Edit Garbage Type</div>
                </label>
            </h1>
            <div class="user-wrapper">
                <h4>
                <div class="las la-clock"><span  iD="runningTime"></span></div></h4>
            </div>
            <div class="user-wrapper">
                <div>
                <h4><div class="las la-user-tie"></div>
                <?php echo $_SESSION['fullname']?></h4>
                <small><?php echo $_SESSION['status'];?></small>
                </div>
            </div>
      
        </header>
        <main>
            <div class="editprizegrid">
                <div class="editwrapperz">
                        <div class="editprizecontent">
                            <form class="formedit" action="" method="POST" enctype="multipart/form-data">                            
                                        <div class="addcontent">
                                            <div class="addcontentdesign">              
                                                <h3>Name: <input type="text" name="gname" value="<?php echo $row['garbage_Name']; ?>" autocomplete="off" required> </h3>                           
                                                <h3>Points: <input type="text" name="gpoints" value="<?php echo $row['garbage_Points']; ?>" autocomplete="off" required></h3>                                              
                                                <h3 class="newsimage">News Image: </h3>
                                                <input type="file" name="image">
                                                <br>
                                                <input type="hidden" name="current_image" value="<?php echo $row['garbage_Img'];?>">
                                                <input type="hidden" name="id" value="<?php echo $row['garbage_ID'];?>">
                                            </div>  
                                        </div>
                                        <div class="addactions">
                                            <h3>Current Image: 
                                            <img src="images/garbage/<?php echo $row['garbage_Img'];?>" style = "width:7rem;height:7rem;border-style:solid;border-radius:5px;padding:0.5rem;border-width:2px;" onerror="this.style.display='none';"></h3>
                                            <div class="addcontentdesignnews">
                                                <h2 class="buttonaction">Actions</h2>
                                                <button class=""><a href="garbagetype.php">Return</a> </button>
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