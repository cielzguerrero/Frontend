<?php
include('connections/connection.php');
include('includes/afterlogin.php');

include('includes/timeinclude.php');
error_reporting(0);
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
    <link href="css/analytics.css" rel="stylesheet" type="text/css" /></link>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/dist/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> 
</link>
<script src="js/dist/chart.js"></script>
<script src="js/slideshow.js"></script>
<script src="js/management.js"></script>
</head>
<body>
<?php include('timeinclude.php');?>
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
                    <a href="carousel.php"><span class="la la-money"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php"  ><span class="la la-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="actionlog.php" ><span class="la la-book"></span>
                    <span>Logs</span></a>
                </li>
                <li>
                    <a href="analytics.php" class="active"><span class="la la-bar-chart"></span>
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
                    <div><span class="las la-bars"></span>Analytics</div>
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
            <div class="line-grid">
                <div class="analytics-wrapper">
                    <div class="box">
                        <h4 class="boxtitle" style="background:#54BAB9;">Analytics</h4>
                        <div class="analytics-contents" style="margin-top:1rem;">
                            <div id="chart-container">
                                <canvas id="mycanvas"></canvas>
                            </div>
                            <div class="analytics-barangays">
                                <div class="barangay-content">
                                <?php  
                                        $sql = "SELECT * FROM members WHERE address = 'Barangay Nueva'";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);
                                        $count = mysqli_num_rows($result);
                                        $tresult = mysqli_query($conn, "SELECT SUM(totalpoints) AS tpoints FROM members WHERE address = 'Barangay Nueva'");
                                        $trows = mysqli_fetch_assoc($tresult);
                                        $sum = $trows['tpoints'];
                                        ?>

                                <div class="barangay-padding">
                                <h4 style="text-align:center;">Bgry Nueva</h4>
                                </div>
                                
                                <br>
                                <p style="text-align: center;">Total Registered Users: <?php echo $count?></p>
                                <p style="text-align: center;">Total Accumulated Points:</p>
                                <p style="text-align: center;"><?php echo $sum;?></p>
                                </div>
                                <div class="barangay-content">
                                <?php  
                                        $sql = "SELECT * FROM members WHERE address = 'Barangay San Antonio'";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);
                                        $count = mysqli_num_rows($result);
                                        $tresult = mysqli_query($conn, "SELECT SUM(totalpoints) AS tpoints FROM members WHERE address = 'Barangay San Antonio'");
                                        $trows = mysqli_fetch_assoc($tresult);
                                        $sum = $trows['tpoints'];
                                        ?>
                               <div class="barangay-padding">
                                <h4 style="text-align:center;">Bgry San Antonio</h4>
                                </div>
                                <br>
                                <p style="text-align: center;">Total Registered Users: <?php echo $count?></p>
                                <p style="text-align: center;">Total Accumulated Points:</p>
                                <p style="text-align: center;"><?php echo $sum;?></p>
                                </div>
                                <div class="barangay-content">
                                <?php  
                                        $sql = "SELECT * FROM members WHERE address = 'Barangay San Vicente'";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);
                                        $count = mysqli_num_rows($result);
                                        $tresult = mysqli_query($conn, "SELECT SUM(totalpoints) AS tpoints FROM members WHERE address = 'Barangay San Vicente'");
                                        $trows = mysqli_fetch_assoc($tresult);
                                        $sum = $trows['tpoints'];
                                        ?>
                                <div class="barangay-padding">
                                <h4 style="text-align:center;">Bgry San Vicente</h4>
                                </div>
                                <br>
                                <p style="text-align: center;">Total Registered Users: <?php echo $count?></p>
                                <p style="text-align: center;">Total Accumulated Points:</p>
                                <p style="text-align: center;"><?php echo $sum;?></p>
                                </div>
                                <div class="barangay-content">
                                <?php  
                                        $sql = "SELECT * FROM members WHERE address = 'Barangay San Roque'";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);
                                        $count = mysqli_num_rows($result);
                                        $tresult = mysqli_query($conn, "SELECT SUM(totalpoints) AS tpoints FROM members WHERE address = 'Barangay San Roque'");
                                        $trows = mysqli_fetch_assoc($tresult);
                                        $sum = $trows['tpoints'];
                                        ?>
                               <div class="barangay-padding">
                                <h4 style="text-align:center;">Bgry San Roque</h4>
                                </div>
                                <br>
                                <p style="text-align: center;">Total Registered Users: <?php echo $count?></p>
                                <p style="text-align: center;">Total Accumulated Points:</p>
                                <p style="text-align: center;"><?php echo $sum;?></p>
                                </div>
                                <div class="barangay-content">
                                <?php  
                                        $sql = "SELECT * FROM members WHERE address = 'Barangay Landayan'";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);
                                        $count = mysqli_num_rows($result);
                                        $tresult = mysqli_query($conn, "SELECT SUM(totalpoints) AS tpoints FROM members WHERE address = 'Barangay Landayan'");
                                        $trows = mysqli_fetch_assoc($tresult);
                                        $sum = $trows['tpoints'];
                                        ?>
                               <div class="barangay-padding">
                                <h4 style="text-align:center;">Bgry Landayan</h4>
                                </div>
                                <br>
                                <p style="text-align: center;">Total Registered Users: <?php echo $count?></p>
                                <p style="text-align: center;">Total Accumulated Points:</p>
                                <p style="text-align: center;"><?php echo $sum;?></p>
                                </div>                               
                            </div>                          
                        </div>
                        
                    </div>
                </div>
            </div>                  
    </main>
    </div>
</body>

</html>