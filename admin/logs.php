<?php

error_reporting(0);

include ('connections/connection.php');


$sql = "SELECT * FROM logs ORDER by id  DESC";
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
        <div class="mrfs">
        <span><h1>User Activity Log</h1></span>
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
            ?>
                </div>
                <table class="tbl-full">
                <tr>
                    <th>User</th>
                    <th>Activity</th>
                    <th>Time</th>
                    <th>Actions</th>                  
                </tr>
                <?php do { ?>
                <tr>
                    <td><?php echo $rows['user'];?></td>
                    <td><?php echo $rows['activity'];?></td>
                    <td><?php echo $rows['datetime'];?></td>
                    <td>
                        <a href="deletelog.php?ID=<?php echo $rows['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } while ($rows = mysqli_fetch_assoc($result))?>
            </table>
            <table class="tbl-full">
                TEMPO
                <?php
                $tsql = "SELECT * FROM tempo";
                $tresult = mysqli_query($conn, $tsql);
                $drows = mysqli_fetch_assoc($tresult);
                ?>
                <tr>
                    <th>User</th>
                    <th>Prize</th>
                    <th>Time</th>
                    <th>Actions</th>                  
                </tr>
                <?php do { ?>
                <tr>
                    <td><?php echo $drows['profile_name'];?></td>
                    <td> Claimed <?php echo $drows['t_reward'];?></td>
                    <td><?php echo $drows['datetransaction'];?></td>
                    <td>
                        <a onclick="return confirm('Are you sure')" href="deletetemplog.php?ID=<?php echo $rows['id'];?>" class="btn btn-danger">Delete</a>
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