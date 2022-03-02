<?php
include ('connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_GET['ID'])){

    $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: profile.php");

} else {

    $id = $_GET['ID'];

    $sql = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
            header("Location: profileuser.php");
        }
    }

}
if (isset($_POST['submit'])) {
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Updated Profile";
    $id = $_POST['id'];
    $full_name = $_POST['pname'];
    $age = $_POST['page'];
    $email = $_POST['pemail'];
    $contact = $_POST['pcontact'];
    $current_image = $_POST['current_image'];
    $image_name = $_POST['image'];
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
                    header("Location: profileuser.php");
    
                    die();
                }

                if($current_image != "") {
                    $remove_path = "images/profile/".$current_image;
                    $remove = unlink($remove_path);
    
                    if($remove == FALSE){
                        $_SESSION['remove'] = "<div class='message warning'>Failed To Remove Current Image. Try Again Later.</div>";
                        header("Location: profileuser.php");
                        die();
                    }
                }
            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }

    $sql = "UPDATE members SET profilename = '$full_name', age = '$age', email = '$email', contact = '$contact', img_name = '$image_name' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        $_SESSION['update'] = "<div class='message success'>Details Updated Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: profileuser.php");
    } else {
        $_SESSION['update'] = "<div class='message warning'>Failed To Update Details. Try Again Later.</div>";
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
        <span><h1>Update Facility</h1></span>
            <div class="updateprofile">
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-40">
                    <tr>
                        <td>Facility Name:</td>
                        <td> <input type="text" name="pname" value="<?php echo $row['profilename']; ?>" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td>
                            <input type="text" name="page" value="<?php echo $row['age']; ?>" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="text" name="pemail" value="<?php echo $row['email']; ?>" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td>
                            <input type="text" name="pcontact" value="<?php echo $row['contact']; ?>" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <img src="images/profile/<?php echo $row['img_name'];?>" style = "width:100px;height:100px;" onerror="this.style.display='none';">
                        </td>
                    </tr>
                    <tr>
                        <td>New Image: </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                    </tr>
                        <td colspan="2">
                            <input type="hidden" name="current_image" value="<?php echo $row['img_name'];?>">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="submit" name="submit" value="Update Facility" class="btn-secondary">
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