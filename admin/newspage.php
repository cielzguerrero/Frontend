<?php
include('connections/connection.php');
include('includes/timeinclude.php');
include('includes/afterlogin.php');
error_reporting(0);


 if (!isset($_GET['ID'])){
 
     $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
     header("Location: carousel.php");
 
 } else {
 
     $id = $_GET['ID'];
 
     $sql = "SELECT * FROM news WHERE news_id = $id";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
 
     if($result == TRUE) {
         $count = mysqli_num_rows($result);
         
         if ($count > 0) {
         } else {
             $_SESSION['update'] = "<div class='message warning'>User Not Found.</div>";
             header("Location: carousel.php");
         }
     }
 
 }
 
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale = 1">
    <title>Waste Management</title>
    <link href="css/newstyle.css" rel="stylesheet" type="text/css" /></link>
    <link href="css/news.css" rel="stylesheet" type="text/css" /></link>
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
<?php include('timeinclude.php');?>
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
                    <span>Garbage </span></a>
                </li>
                <li>
                    <a href="carousel.php" class="active"><span class="las la-signal"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php"><span class="las la-signal"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="actionlog.php"><span class="las la-signal"></span>
                    <span>Logs</span></a>
                </li>
                <li>
                    <a href="analytics.php"><span class="las la-signal"></span>
                    <span>Analytics</span></a>
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
                    <div><span class="las la-bars"></span>News Page</div>
                </label>
            </h1>
            <div class="user-wrapper">
                <h4>
                <div class="las la-clock"><span  iD="runningTime"></span></div></h4>
            </div>
            <div class="user-wrapper">
                <div>
                <h4><div class="las la-user-tie"></div>
                <?php echo $afullname;?></h4>
                <small><?php echo $astatus;?></small>
                </div>
            </div>
      
        </header>
        <main>
                <div class="newspage">
                
                    <div class="newspage-wrapper">
                    <h4 class="boxnewstitle">News</h4>
                        <div class="newspage-box">
                            <div class="newspagetitlewrapper">
                                <h2 class="newstitle" style="margin:0.25rem"><?php echo $row['news_title'];?></h2>
                                <i class="newspagedescription"><?php echo $row['news_description'];?></i>
                            </div>
                            <div class="imagenewspage">
                                <img src="images/news/<?php echo $row['news_img'];?>" style = "border: 2px solid #767676;width:100%; height:12rem;">
                            </div>
                            <div class="newspagecontentwrapper">
                                <div style="margin-top: .5rem;">
                                <?php echo $row['news_content'];?>
                                </div>
                            </div>
                            
                            <input type="hidden" name="current_image" value="<?php echo $row['news_img'];?>">
                            <input type="hidden" name="id" value="<?php echo $row['news_id'];?>">
                            </div>
                        </div>
                        <a href="newindex.php">Return</a>
                </div>
        </main>
    </div>
</body>

</html>