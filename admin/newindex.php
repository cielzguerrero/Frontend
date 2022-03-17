<?php
include('connections/connection.php');

if (empty($_SESSION['username'])) {

    header("Location: logout.php");
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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- FONT AWSEOME ICONS -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></link>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    

<script src="js/dist/chart.js"></script>
<script src="js/slideshow.js"></script>
</head>
<body>
<?php include('timeinclude.php');
include('chartjava.php');?>
    <input type="checkbox"  id="navigation-toggle">
    <div class="sidebar">
        
        <div class="sidebar-brand">
        <h3> <span>Waste&nbsp;<span class="las la-leaf"></span> Management</span> </h3>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="newindex.php" class="active"><span class="la la-dashboard"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="garbagetype.php"><span class="la la-trash"></span>
                    <span>Garbage Type</span></a>
                </li>
                <li>
                    <a href="carousel.php"><span class="la la-money"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php"><span class="la la-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="actionlog.php"><span class="la la-book"></span>
                    <span>Logs</span></a>
                </li>
                <li>
                    <a href="analytics.php"><span class="la la-bar-chart"></span>
                    <span>Analytics</span></a>
                </li>
                <li>
                    <a href="logout.php" onclick="return confirm('Are you sure')"><span class="la la-close"></span>
                    <span>Sign-Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h1>
                <label for="navigation-toggle">
                    <div><span class="las la-bars"></span>Dashboard</div>
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
                <div class="cards">    
                    <div class="card-singles">
                        <div class="prize-wrapper">
                            <div class="box">
                                <?php $sql = "SELECT * FROM prizes";
                                $result = mysqli_query($conn, $sql);
                                $rows = mysqli_fetch_assoc($result);
                                $fly = 1;?>
                                <h4 class="boxtitle" >Prizes</h4>
                                <div class="indexslideshow-box">
                                    <div class="indexbox-wrapper">
                                        <?php do { ?>
                                        <div class="indexprizebox">
                                            <?php echo $rows['prizename'];?>
                                            <img src="images/prize/<?php echo $rows['prize_img'];?>" style = "width:100%; height:7.5rem;">
                                            <i class="pindexdescription"><?php echo $rows['pdescription'];?></i>
                                        </div>
                                        <?php $fly++; }  while ($rows = mysqli_fetch_assoc($result))?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-single">
                        <div class="totalmemberdesign">
                            <?php
                            $sql = "SELECT * FROM members";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            ?>
                            <h1><i class="fa-solid fa-people-group"></i><?php echo $count?></h1>
                            <span> <p>Total Members</p> </span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            
                            <?php
                            $sql = "SELECT * FROM logs";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            ?>
                            <h1></i><?php echo $count?></h1>
                            <span> <p>Total Logs</p> </span>
                        </div>
                    </div>
                </div>
                <div class="recent-grid">
                    <div class="leaderboards">
                        <div class="card">
                            <div class="cheader" style="text-align:center;">
                                <h2>Leaderboards</h2>
                            </div>
                            <div class="card-body">
                                <table class="table-full">
                                    <thead>
                                        <tr>
                                            <td>Rank</td>
                                            <td>Name</td>
                                            <td>Points</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $sql = "SELECT * FROM members ORDER BY points DESC LIMIT 0,10";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);
                                        $rank = 1;
                                        $number = 0;
                                        do { ?>
                                            <tr>
                                                <td><?php echo $rank;?></td>
                                                <td><?php echo $rows['profilename'];?></td>
                                                <td><?php echo $rows['totalpoints'];?></td>
                                            </tr>
                                        <?php $rank++;} while (($rows = mysqli_fetch_assoc($result)) and ($number <= 10))?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="logs">
                        <div class="card">
                            <div class="card-header" style="background: #54BAB9;">
                                <h2>Logs</h2>
                                <button><a href="actionlog.php">See All</a><span class="las la-button"></span></button>
                            </div>
                            <div class="card-body">
                                <table class="table-half">
                                    <tr>
                                        <td>Activity</td>
                                        <td>Time</td>
                                    </tr>
                                    <?php  
                                    $sql = "SELECT * FROM logs ORDER by id  DESC LIMIT 0,10";
                                    $result = mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_assoc($result);
                                    $number = 0;
                                    do { ?>
                                    <div class="logging">
                                    <tr>
                                            <td><?php echo $rows['activity'];?></td>
                                            <td style="margin-right:0.5rem;"><?php echo $rows['datetime'];?></td>
                                    </tr> 
                                    </div>
                                    <?php $number++; } while (($rows = mysqli_fetch_assoc($result)) and ($number <= 10))?> 
                                        
                                    </table>                                 
                            </div>    
                        </div>
                    </div>
                </div>
                    <div class="power-grid">
                        <div class="news-box">
                        <h2 class="boxnewstitle">News</h2>     
                                <div class="slideshow-newsbox">
                                        <div class="newsbox-wrapper">
                                            <?php
                                            $sql = "SELECT * FROM news";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_fetch_assoc($result);
                                            $ranker = 1; 
                                            do { ?>
                                                <div class="indexnewsbox">
                                                    <div class="news-divide">
                                                        <div>
                                                            <img src="images/news/<?php echo $rows['news_img'];?>" style = "border: 2px solid #767676;width:100%; height:12rem;">
                                                        </div>
                                                        <div>
                                                            <div class="newsdescription">
                                                                <h4><?php echo $rows['news_title'];?></h4>
                                                                <i>Posted by <?php echo $rows['postedby'];?> on <?php echo $rows['datetime'];?> | Last Updated <?php echo time_elapsed_string($rows['lastupdate']); ?>.</i> 
                                                                <br> 
                                                                <i><?php echo $rows['news_description'];?></i>
                                                                <div class="newsbutton"><button><a href="newspage.php?ID=<?php echo $rows['news_id'];?>" class="editprize">View</a></button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $ranker++; }  while ($rows = mysqli_fetch_assoc($result))?>
                                        </div>
                                </div>
                        </div>        
                </div>
                
    </main>
    </div>
</body>

</html>