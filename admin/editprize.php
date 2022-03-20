<?php
include('connections/connection.php');
include('includes/afterlogin.php');

 if (!isset($_GET['ID'])){
 
     $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
     header("Location: carousel.php");
 
 } else {
 
     $id = $_GET['ID'];
 
     $sql = "SELECT * FROM prizes WHERE id = $id";
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
     $activity = "Updated Prize";
     $id = $_POST['id'];
     $prizen = $_POST['pname'];
     $description = $_POST['pdesc'];
     $peso = $_POST['ppeso'];
     $price = $_POST['ppoints'];
     $image_name = $_POST['image'];
     $current_image = $_POST['current_image'];
     if(isset($_FILES['image']['name'])){
 
        $image_name = $_FILES['image']['name'];

            if($image_name != ""){

                //Rename Image
                $extension = end(explode('.', $image_name));
                $image_name = "Prize-". rand(000, 999). "." .$extension;
    
                $sourcepath = $_FILES['image']['tmp_name'];
                $destinationpath = "images/prize/".$image_name;
    
                $upload = move_uploaded_file($sourcepath, $destinationpath);
    
                if($upload == FALSE) {
                    $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                    header("Location: carousel.php");
    
                    die();
                }

                if($current_image != "") {
                    $remove_path = "images/prize/".$current_image;
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
 
     $sql = "UPDATE prizes SET prizename = '$prizen', pesos = '$peso' , pdescription = '$description', points = '$price', prize_img = '$image_name' WHERE id = '$id'";
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
                    <div><span class="las la-bars"></span>Edit Prize</div>
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
                <div class="editwrappers">
                    <div class="editcontent" style="height:29.5rem;">
                        <div class="editprizecontent" style="height:26.5rem;">
                            <form action="" method="POST" enctype="multipart/form-data">                            
                                            <h3>Name: <input type="text" name="pname" value="<?php echo $row['prizename']; ?>" autocomplete="off" required> </h3>                   
                                            <h3>Description: <input type="text" name="pdesc" value="<?php echo $row['pdescription']; ?>" autocomplete="off" required></h3>
                                            <h3>Peso: <input type="text" name="ppeso" value="<?php echo $row['pesos']; ?>" autocomplete="off" required></h3> 
                                            <h3>Price: <input type="text" name="ppoints" value="<?php echo $row['points']; ?>" autocomplete="off" required></h3>                
                                            <h3>Current Image: 
                                            <img src="images/prize/<?php echo $row['prize_img'];?>" style = "width:7rem;height:7rem;border-style:solid;border-radius:5px;padding:0.5rem;border-width:2px;" onerror="this.style.display='none';"></h3>
                                            <h3 class="pimage">Prize Image: </h3>
                                            <p><input type="file" name="image"></p>
                                            <input type="hidden" name="current_image" value="<?php echo $row['prize_img'];?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                            <div class="buttonupdate">
                                            <input type="submit" name="submit" value="Update Prize" class="btn-secondary">      
                            </form>
                        </div>
                    </div>
                </div>
                <div class="editactions" style="height:29.5rem;">
                <div class="editactionbutton">
                    <h2 class="buttonaction">Actions</h2>
                            <div>
                                <button class=""><a href="carousel.php">Return</a> </button>
                            </div>
                    </div>
                </div>
            </div>         
        </main>
    </div>
</body>

</html>