<?php
include('connections/connection.php');

if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
else
{
    header("Location: newindex.php");
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</link>
</head>

<body>
    <header id="siteHeader" >  
    </header>
    <article id="siteArticle">
        <div class="dashboard">
            <span>
                <h1>Dashboard</h1>
            </span>
            <div class="container">
                <ul>
                    <li>
                        <div class="ccontainer">MRFS/Junkshops
                            <h1>
                                <?php
                                $sql = "SELECT * FROM facility";
                                $result = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($result);
                                ?>
                                <h1><?php echo $count; ?></h1>
                            </h1>
                        </div>
                    </li>
                    <li>
                        <div class="ccontainer">Total Members
                         <h1>       
                                <?php
                                $sql = "SELECT * FROM members";
                                $result = mysqli_query($conn, $sql);
                                $count1 = mysqli_num_rows($result);
                                ?>
                                <h1><?php echo $count1; ?></h1>
                        </h1>
                        </div>
                    </li>
                    <li>
                        <div class="ccontainer">Leaderboards 
                        <h5>
                            <?php
                           
                            ?>
                            <table class="table-full">
                                <tr>
                                    <td>Rank</td>
                                    <td>Name</td>
                                    <td>Points</td>
                                </tr>
                                <?php  
                                    $sql = "SELECT * FROM members ORDER BY points DESC";
                                    $result = mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_assoc($result);
                                    $rank = 1;
                                    do { ?>
                                        <tr>
                                            <td><?php echo $rank;?></td>
                                            <td><?php echo $rows['profilename'];?></td>
                                            <td><?php echo $rows['points'];?></td>
                                        </tr>
                                    <?php $rank++;} while ($rows = mysqli_fetch_assoc($result))?>
                            </table>
                            
                        </h5>
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
            <a href="logout.php" onclick="return confirm('Are you sure')">Sign Out</a>
        </div>
    </div>
    <footer id="siteFooter"></footer>
</body>

</html>