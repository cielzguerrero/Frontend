<?php

error_reporting(0);

include ('connections/connection.php');

if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
$sql = "SELECT * FROM members";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);

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
        <div class="profile">
        <span><h1>Profile</h1></span>
            <div class="container">
                <br>
                <div class="addbutton">
                <?php
                if(isset($_SESSION['add'])){

                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['remove'])){

                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }
                if(isset($_SESSION['delete'])){

                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update'])){

                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['view'])){

                    echo $_SESSION['view'];
                    unset($_SESSION['view']);
                }
            ?>
                <a href="addprofile.php" class="btn btn-primary">Add</a>
                </div>
                <table class="tbl-full">
                <tr>
                    <th>Profile</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Actions</th>                  
                </tr>
                <?php do { ?>
                <tr>
                    <td><img src="images/profile/<?php echo $rows['img_name'];?>" style = "width:1rem;height:1rem;" onerror="this.style.display='none' border-style='solid' border-width='5px' ;"></td>
                    <td><?php echo $rows['profilename'];?></td>
                    <td><?php echo $rows['age'];?></td>
                    <td><?php echo $rows['email'];?></td>
                    <td><?php echo $rows['contact'];?></td>
                    <td>
                        <a href="profile.php?ID=<?php echo $rows['id'];?>" class="btn btn-secondary">View Profile</a>
                        <a href="updateprofile.php?ID=<?php echo $rows['id'];?>" class="btn btn-secondary">Update</a>
                        <a href="deleteprofile.php?ID=<?php echo $rows['id'];?>&Image_Name=<?php echo $rows['image_name'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } while ($rows = mysqli_fetch_assoc($result))?>
            </table>
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