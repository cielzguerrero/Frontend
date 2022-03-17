<?php
include('connections/connection.php');

if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
 include('chartjava.php');
 if (!isset($_GET['ID'])){
 
     $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
     header("Location: members.php");
 
 } else {
 
     $id = $_GET['ID'];
 
     $sql = "SELECT * FROM members WHERE id = $id";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
     $status = $row['status'];

     $tsql = "SELECT * FROM members WHERE status ='Admin'";
     $result = mysqli_query($conn, $tsql);
     $count = mysqli_num_rows($result);

     if($result == TRUE) {
         $count = mysqli_num_rows($result);
         
         if ($count > 0) {
         } else {
             $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
             header("Location: members.php");
         }
     }
 
 }
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
                $destinationpath = "images/profile/".$image_name;
    
                $upload = move_uploaded_file($sourcepath, $destinationpath);
    
                if($upload == FALSE) {
                    $_SESSION['upload'] = "<div class='message warning'>Failed To Upload Image. Try Again Later.</div>";
                    header("Location: members.php");
    
                    die();
                }

                if($current_image != "") {
                    $remove_path = "images/profile/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove == FALSE){
                        $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                        header("Location: members.php");
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }
    
    
        $sql = "UPDATE members SET profilename = '$profile_name', fullname = '$full_name', status = '$pstatus', username = '$user_name', password = '$pass_word', email = '$email', address = '$address', contact = '$contact', img_name = '$image_name' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
    
        if($result) {
            $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
            $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
            $result = mysqli_query($conn, $log);
            $tsql = "UPDATE deposits SET profileuser = '$profile_name', user = '$user_name', img_name = '$image_name' WHERE d_id = '$id'";
            $result = mysqli_query($conn, $tsql);
            header("Location: members.php");
        } else {
            $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
            header("Location: members.php");
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
                    <a href="carousel.php"><span class="las la-signal"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php" class="active"><span class="las la-signal"></span>
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
                    <div><span class="las la-bars"></span>Add New Profile</div>
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
                                            <div class="addcontentdesign" style="padding:.5rem;">              
                                                <h3>Profile Name: <input type="text" name="pname" value="<?php echo $row['profilename']; ?>" autocomplete="off" required> </h3>
                                                <h3>Full Name: <input type="text" name="fname" value="<?php echo $row['fullname']; ?>" autocomplete="off" required> </h3>
                                                <h3>Email: <input type="text" name="email" value="<?php echo $row['email']; ?>" autocomplete="off" required></h3>
                                                <h3>Status: 
                                                    <select id="status" name="sname" value="<?php echo $row['status']; ?>" >
                                                    <option value="<?php echo $row['status']; ?>" selected><?php echo $row['status']; ?></option>
                                                    <?php if ($status == "Admin")
                                                    {?>
                                                        <?php if ($count <= 1) {?>
                                                        <option value="Admin">Admin</option>
                                                        <?php } else { ?>
                                                        <option value="Member">Member</option>
                                                        <?php };?>
                                                    <?php } else { ?>
                                                        <option value="Member">Member</option>
                                                    <?php };?>
                                                    <option value="Admin">Admin</option>
                                                    </select>
                                                </h3>
                                                <h3>Contact: <input type="text" name="pcontact" value="<?php echo $row['contact'];?>" autocomplete="off" required></h3>
                                                <h3>Address: 
                                                    <select class="custom-select w-100 p-2" id="inputGroupSelect01" name="paddress" value="<?php echo $row['address'];?>">
                                                        <option value="<?php echo $row['address'];?>"><?php echo $row['address'];?></option>
                                                        <option value="Barangay Nueva">Barangay Nueva</option>
                                                        <option value="Barangay San Antonio">Barangay San Antonio</option>
                                                        <option value="Barangay San Vicente">Barangay San Vicente</option>
                                                        <option value="Barangay San Roque">Barangay San Roque</option>
                                                        <option value="Barangay Landayan">Barangay Landayan</option>                                           
                                                    </select>
                                                </h3>                                         
                                                <br>
                                                <input type="hidden" name="current_image" value="<?php echo $row['img_name'];?>">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                            </div>  
                                        </div>
                                        <div class="addactions">
                                            <h3>Current Image: 
                                            <img src="images/profile/<?php echo $row['img_name'];?>" style = "width:7rem;height:7rem;border-style:solid;border-radius:5px;padding:0.5rem;border-width:2px;" onerror="this.style.display='none';"></h3>
                                            <div class="addcontentdesign" style="background: white; padding:.5rem;height:26.5rem;">
                                            <h3>Username: <input type="text" name="uname" value="<?php echo $row['username'];?>" autocomplete="off" required></h3>
                                            <h3>Password: <input type="password" name="pass" value="<?php echo $row['password'];?>" autocomplete="off" required></h3> 
                                            <h3 class="memberimage">Profile Image: <input type="file" name="image" style="font-size:1rem;"></h3>
                                            <br>
                                            <h2 class="buttonaction">Actions</h2>
                                            <button class=""><a href="members.php">Return</a> </button>
                                            <input type="submit" name="submit" value="Update Member" class="btn-secondary">
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