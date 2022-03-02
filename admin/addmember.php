<?php
include ('connections/connection.php');
if (isset($_POST['submit'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New Profile";
    $profile_name = $_POST['pname'];
    $full_name = $_POST['fname'];
    $pstatus = $_POST['sname'];
    $user_name = $_POST['uname'];
    $pass_word = $_POST['pass'];
    $dc = date('Y-m-d');
    $email = $_POST['email'];
    $contact = $_POST['pcontact'];
    $address = $_POST['paddress'];
    if(isset($_FILES['image']['name'])) {

        $image_name = $_FILES['image']['name'];

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

    } else {

        $image_name = "";

    }
    
    
    $sql = "INSERT INTO members (profilename, fullname, status, username, password, datecreated, email, address, contact, img_name) VALUES ('$profile_name','$full_name', '$pstatus', '$user_name', '$pass_word', '$dc', '$email', '$address', '$contact', '$image_name')";
    $result = mysqli_query($conn, $sql);
    if($result == TRUE) {
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        $_SESSION['add'] = "<div class='message success'>New User Added Successfully!</div>";
        
        header("Location: members.php");
    } else {
        $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
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
                    <a href="#"><span class="las la-signal"></span>
                    <span>Analytics(Post-Poned)</span></a>
                </li>
                <li>
                    <a href="logout.php" onclick="return confirm('Are you sure')"><span class="las la-signal"></span>
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
                        <h4 style="text-align: center;">Add</h4>
                            <form class="formedit" action="" method="POST" enctype="multipart/form-data">                            
                                        <div class="addcontent">
                                            <div class="addcontentdesign" style="padding:.5rem;">              
                                                <h3>Profile Name: <input type="text" name="pname" value="Name" autocomplete="off" required> </h3>
                                                <h3>Full Name: <input type="text" name="fname" value="Name" autocomplete="off" required> </h3>
                                                <h3>Email: <input type="text" name="email" value="Email" autocomplete="off" required></h3>
                                                <h3>Status: 
                                                    <select id="status" name="sname">
                                                        <option value="Member">Member</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </h3>
                                                <h3>Contact: <input type="text" name="pcontact" value="Contact" autocomplete="off" required></h3>
                                                <h3>Address: <input type="text" name="paddress" value="Address" autocomplete="off" required></h3>                                            
                                                <br>
                                            </div>  
                                        </div>
                                        <div class="addactions">
                                            <div class="addcontentdesign" style="background: white; padding:.5rem;">
                                            <h3>Username: <input type="text" name="uname" value="Username" autocomplete="off" required></h3>
                                            <h3>Password: <input type="password" name="pass" value="Password" autocomplete="off" required></h3> 
                                            <h3 class="memberimage">Profile Image: <input type="file" name="image" style="font-size:1rem;"></h3>
                                            <br>
                                            <h2 class="buttonaction">Actions</h2>
                                            <button class=""><a href="members.php">Return</a> </button>
                                            <input type="submit" name="submit" value="Add Member" class="btn-secondary">
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