<?php
include ('connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_GET['ID'])){

    $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: profileuser.php");

} else {

    $id = $_GET['ID'];

    $sql = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
            header("Location: profileuser.php");
        }
    }

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waste Management</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    </link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </link>
</head>

<body>
    <?php $id = $row ['id'] ?>
    <header id="siteHeader"> </header>
    <article id="siteArticle">
        <div class="profile">
            <span>
                <h1>Profile</h1>
            </span>
            <div class="profile-container">
                <ul>
                    <li class="side-profile">
                        <div class=profile-picture>
                            <img src="images/profile/<?php echo $row['img_name'];?>">
                            <br><br><br><br><br>
                            <h4>Accumulated Points: <?php echo $row['points']?></h4>
                        </div>
                    </li>
                    <li class="middle-profile">
                        <div class="profile-information">
                            <div class="row">
                                <div class = "col-md-8">
                                    <h4>Full Name</h4>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $row['profilename']; ?></h5>
                                </div>
                                <div class = "col-md-8">
                                    <h4>Age</h4>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $row['age']; ?></h5>
                                </div>
                                <div class = "col-md-8">
                                    <h4>Email</h4>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $row['email']; ?></h5>
                                </div>
                                <div class = "col-md-8">
                                    <h4>Contact</h4>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h5><?php echo $row['contact']; ?></h5>
                                </div>
                            </div>

                        </div>
                    </li>
                    <li class="right-profile">
                        <div class="profile-actions">
                            <h2>Testing Only:</h2>
                            <a href="addpoints.php?ID=<?php echo $id = $_GET['ID'];;?>" class="btn btn-secondary">add point</a>
                            <a href="decreasepoint.php?ID=<?php echo $id = $_GET['ID'];;?>" class="btn btn-secondary">decrease point</a>
                            <a href="resetpoint.php?ID=<?php echo $id = $_GET['ID'];;?>" class="btn btn-secondary">reset point</a>
                        </div>
                    </li>
                </ul>
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