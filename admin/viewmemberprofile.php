<?php
include ('connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_GET['ID'])){

    $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: members.php");

} else {

    $id = $_GET['ID'];

    $sql = "SELECT * FROM members WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);

    if($result == TRUE) {
        $count = mysqli_num_rows($result);
        
        if ($count > 0) {
        } else {
            $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
            header("Location: members.php");
        }
    }

}
 include('chartjava.php');
 function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime, new DateTimeZone('Asia/Manila'));
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
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
    <link href="css/news.css" rel="stylesheet" type="text/css" /></link>
    <link href="css/members.css" rel="stylesheet" type="text/css" /></link>
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
                    <div><span class="las la-bars"></span><?php echo $rows['profilename'];?>'s Profile</div>
                </label>
            </h1>
            <div class="user-wrapper">
                <h4>
                <div class="las la-clock"><span  iD="runningTime"></span></div></h4>
            </div>
            <div class="user-wrapper">
                <div>
                <h4><div class="las la-user-tie"></div>
                <?php echo $_SESSION['fullname'];?></h4>
                <small><?php echo $_SESSION['status'];?></small>
                </div>
            </div>
      
        </header>
        <main>
            <div class="profiletitle">
                    <h4 style="text-align: center;">Profile</h4>
                <div class="profile-grid">
                    <div class="profileleft">
                            <div style="text-align: center;">
                                <img src="images/profile/<?php echo $rows['img_name'];?>" style="border:2px solid #767676;width:100%;height:20rem;border-radius:5px;">
                            </div>
                        <div class="profilename" style="text-align: center;">
                                <h4>Profile Name: <a style="color:white"><?php echo $rows['profilename'];?></a></h4>
                                <h4>Fullname : <a style="color:white"><?php echo $rows['fullname'];?></a></h4>
                                <h4>Status : <a style="color:white"><?php echo $rows['status'];?></a></h4>
                        </div>
                    </div>
                    <div class="profilemiddle">
                        <div class="pmcontent">
                            <div class="pmtitle">
                                <h4>Email</h4>
                            </div>
                            <div class="pmdesc">
                                <a><?php echo $rows['email'];?></a>
                            </div>
                        </div>
                        <div class="pmcontent">
                            <div class="pmtitle">
                                <h4>Date Created</h4>
                            </div>
                            <div class="pmdesc">
                                <a><?php echo $rows['datecreated'];?></a>
                            </div>
                        </div>
                        <div class="pmcontent">
                            <div class="pmtitle">
                                <h4>Contact</h4>
                            </div>
                            <div class="pmdesc">
                                <a><?php echo $rows['contact'];?></a>
                            </div>
                        </div>
                        <div class="pmcontent">
                            <div class="pmtitle">
                                <h4>Address</h4>
                            </div>
                            <div class="pmdesc">
                                <a><?php echo $rows['address'];?></a>
                            </div>
                        </div>
                        <div class="pmcontent">
                            <div class="pmtitle">
                                <h4>Accumulated Points</h4>
                            </div>
                            <div class="pmdesc">
                                <a><?php echo $rows['points'];?></a>
                            </div>
                        </div>
                    </div>
                    <div class="profileright">
                        <div class="profileaction">
                            <h2>Testing Only:</h2>
                            <a href="addpoints.php?ID=<?php echo $id = $_GET['ID'];;?>" class="btn btn-secondary">add point</a>
                            <a href="decreasepoint.php?ID=<?php echo $id = $_GET['ID'];;?>" class="btn btn-secondary">decrease point</a>
                            <a href="resetpoint.php?ID=<?php echo $id = $_GET['ID'];;?>" class="btn btn-secondary">reset point</a>
                        </div>
                        <div style="text-align: right;margin-top:11.5rem;">
                            <a href="members.php?" class="btn btn-secondary">Return</a>
                        </div>
                            
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>