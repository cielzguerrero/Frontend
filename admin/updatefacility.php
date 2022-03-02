<?php
include ('connections/connection.php');

if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_GET['ID'])){

    $_SESSION['update'] = "<div class='message warning'>Facility Not Found.</div>";
    header("Location: mrfs.php");

} else {

    $id = $_GET['ID'];

    $sql = "SELECT * FROM facility WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['update'] = "<div class='message warning'>Facility Not Found.</div>";
            header("Location: mrfs.php");
        }
    }

}

    if (isset($_POST['submit'])) {
        $time = date("Y-m-d H:i:s");
        $username = $_SESSION['username'];
        $activity = "Updated Facility";
        $facility_name = $_POST['fname'];
        $location = $_POST['flocation'];
        $email = $_POST['femail'];
        $contact = $_POST['fcontact'];

        $sql = "UPDATE facility SET facilityname = '$facility_name', location = '$location', email = '$email', contact = '$contact' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            $_SESSION['update'] = "<div class='message success'>Updated Successfully!</div>";
            $log = "INSERT INTO logs (user, activity, datetime) VALUES ('$username', '$activity', '$time')";
            $result = mysqli_query($conn, $log);
            header("Location: mrfs.php");
        } else {
            $_SESSION['update'] = "<div class='message warning'>Failed To Update. Try Again Later.</div>";
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
        <span><h1>Update Facility</h1></span>
            <div class="updatefacility">
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-40">
                    <tr>
                        <td>Facility Name:</td>
                        <td> <input type="text" name="fname" value="<?php echo $row['facilityname']; ?>" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td>
                            <input type="text" name="flocation" value="<?php echo $row['location']; ?>" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="text" name="femail" value="<?php echo $row['email']; ?>" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact:</td>
                        <td>
                            <input type="text" name="fcontact" value="<?php echo $row['contact']; ?>" autocomplete="off" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
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