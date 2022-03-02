<?php
include ('connections/connection.php');
if (isset($_POST['submit'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New Profile";
    $full_name = $_POST['pname'];
    $dc = date('Y-m-d');
    $email = $_POST['email'];
    $contact = $_POST['pcontact'];
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
            header("Location: profileuser.php");

            die();
        }

    } else {

        $image_name = "";

    }
    
    
    $sql = "INSERT INTO members (profilename, datecreated, email, contact, img_name) VALUES ('$full_name', '$dc', '$email', '$contact', '$image_name')";
    $result = mysqli_query($conn, $sql);
    if($result == TRUE) {
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        $_SESSION['add'] = "<div class='message success'>New User Added Successfully!</div>";
        
        header("Location: profileuser.php");
    } else {
        $_SESSION['add'] = "<div class='message warning'>Failed To Add User. Try Again Later.</div>";
        header("Location: profileuser.php");
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Management</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link>
</head>
<body>
    <header id="siteHeader"></header>
    <article id="siteArticle">
        <div class="dashboard">
        <span><h1>Add Profile</h1></span>
            <div class="addfacility">
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-40">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="pname" placeholder="Full Name" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td>Age:</td>
                        <td>
                            <input type="text" name="age" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="text" name="email" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td>
                            <input type="text" name="pcontact" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Profile Image:</td>
                        <td>
                            <input type="file" name="image" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Profile" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
            </div>
        </div>
    </article>
    <nav id="sideNav">
        <div class="snav">
            <?php include('sidenav.php');?>
        </div>
    </nav>
    <div id="sitelogout">
        <div class="loginout">
            <a href="logout.php">Sign Out</a>
        </div>
    </div>
    <footer id="siteFooter"></footer>
</body>

</html>