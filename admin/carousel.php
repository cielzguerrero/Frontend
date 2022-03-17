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
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css%22/%3E"></link>
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
        <h3> <span>Waste&nbsp;<span class="las la-leaf"></span> Management</span> </h3>
        </div>
        <div class="sidebar-menu">
            <ul>
            <li>
                    <a href="newindex.php"><span class="la la-dashboard"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="garbagetype.php"  ><span class="la la-trash"></span>
                    <span>Garbage Type</span></a>
                </li>
                <li>
                    <a href="carousel.php" class="active"><span class="la la-money"></span>
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
                    <div><span class="las la-bars"></span>Carousel</div>
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
            <div class="power-grid">
                <div class="prize-wrapper">
                    <div class="box">
                        <h4 class="boxtitle">Prizes</h4>
                        <div class="slideshow-box">
                        <i class="fas fa-chevron-left prev"></i>
                        <div class="box-wrapper">
                            <?php
                            $sql = "SELECT * FROM prizes";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                            $count = mysqli_num_rows($result);
                            $ranker = 1; 
                            do { ?>
                            <div class="prizebox">
                                <!-- <?php echo $ranker;?> -->
                                <img src="images/prize/<?php echo $rows['prize_img'];?>">
                                <div class="pdescription" style="text-align:center;">
                                    <h4 style="text-align:center;"><?php echo $rows['prizename'];?></h4> 
                                    <i><?php echo $rows['pdescription'];?></i>
                                    <div class="pbutton"><button><a href="editprize.php?ID=<?php echo $rows['id'];?>" class="editprize">Edit</a></button><button><a  onclick="return confirm('Are you sure')" href="deleteprize.php?ID=<?php echo $rows['id'];?>&Image_Name=<?php echo $rows['prize_img'];?>" <?php if ($count <= 1) { echo 'style="pointer-events: none;color:red;"'; } ?>>Delete</a></button></div>
                                </div>
                            </div>
                            <?php $ranker++; }  while ($rows = mysqli_fetch_assoc($result))?>
                        </div>
                        <i class="fas fa-chevron-right next"></i>
                        </div>
                    </div>
                    <div class="prizeaction">
                        <h2 class="buttonaction">Actions</h2>
                        <button class=""><a href="addprize.php">Add</a> </button>
                    </div>
                </div>
            </div>
            
            <div class="news-grid">
                    <div class="news-box">     
                        <div class="slideshow-newsbox">
                        <h4 class="boxnewstitle">News</h4>
                            <div class="newsbox-wrapper">
                            <?php
                            $sql = "SELECT * FROM news";
                            $result = mysqli_query($conn, $sql);
                            $rows = mysqli_fetch_assoc($result);
                            $count = mysqli_num_rows($result);
                            $ranker = 0;
                            
                            do { ?>
                                <div class="newsbox">
                                    <div class="news-divide">
                                        <div>
                                            <img src="images/news/<?php echo $rows['news_img'];?>" style = "border: 2px solid #767676;width:95%; height:12rem;">
                                        </div>
                                        <div>
                                            <div class="newsdescription">
                                                <h4><?php echo $rows['news_title'];?></h4>
                                                <i>Posted by <?php echo $rows['postedby'];?> on <?php echo $rows['datetime'];?> | Last Updated <?php echo time_elapsed_string($rows['lastupdate']); ?>.</i> 
                                                <br>
                                                <i><?php echo $rows['news_description'];?></i>
                                                <br>
                                                <div class="newsbutton"><button ><a href="newspage.php?ID=<?php echo $rows['news_id'];?>"class="editprize">View</a></button><button><a href="editnews.php?ID=<?php echo $rows['news_id'];?>" class="editprize">Edit</a></button><button><a onclick="return confirm('Are you sure')"  href="deletenews.php?ID=<?php echo $rows['news_id'];?>&Image_Name=<?php echo $rows['news_img'];?>"<?php if ($count <= 1) { echo 'style="pointer-events: none;color:red;"'; }?>>Delete</a></button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $ranker++; }  while ($rows = mysqli_fetch_assoc($result))?>
                            </div>
                        </div>
                        <div class="newsaction">
                        <h2 class="buttonaction">Actions</h2>
                        <button class=""><a href="addnews.php">Add</a> </button>
                    </div>
                    </div>

                </div>
            </div>
                    
    </main>
    </div>
</body>

</html>