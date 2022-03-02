<?php
include ('connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (isset($_POST['submit'])){
    $time = date("Y-m-d H:i:s");
    $username = $_SESSION['username'];
    $activity = "Added New Facility";
    $facility_name = $_POST['fname'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $contact = $_POST['fcontact'];
    
    
    $sql = "INSERT INTO facility (facilityname, location, email, contact) VALUES ('$facility_name', '$location', '$email', '$contact')";
    $result = mysqli_query($conn, $sql);
    if($result == TRUE) {
        $_SESSION['add'] = "<div class='message success'>Facility Added Successfully!</div>";
        $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
        $result = mysqli_query($conn, $log);
        header("Location: mrfs.php");
    } else {
        $_SESSION['add'] = "<div class='message warning'>Failed To Add Facility. Try Again Later.</div>";
        header("Location: mrfs.php");
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
        <span><h1>Add Facility</h1></span>
            <div class="addfacility">
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-40">
                    <tr>
                        <td>Facility Name:</td>
                        <td><input type="text" name="fname" placeholder="Facility Name" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td>
                            <input type="text" name="location" autocomplete="off" required>
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
                            <input type="text" name="fcontact" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Facility" class="btn-secondary">
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