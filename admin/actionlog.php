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
    <link href="css/members.css" rel="stylesheet" type="text/css" /></link>
    <link href="css/logs.css" rel="stylesheet" type="text/css" /></link>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> 
</link>
<script src="js/dist/chart.js"></script>
<script src="js/slideshow.js"></script>
<script src="js/datatable.js"></script>
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
                    <a href="carousel.php"><span class="la la-money"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php"  ><span class="la la-user"></span>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="actionlog.php" class="active"><span class="la la-book"></span>
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
                    <div><span class="las la-bars"></span>Log</div>
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
        <div class="log-grid">
                    <div class="leaderboards">
                        <div class="card">
                            <div class="logheader" style="text-align:center;">
                                <h4>Logs</h4>
                            </div>
                            <div class="logcard-body">
                                <table class="table table-striped table-bordered" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Activity</th>
                                        <th>Activity Start Date</th>
                                        <th>Elapsed Time</th>
                                        <th>Actions | <a onclick="return confirm('Are you sure')" href="deletealllog.php" class="btn btn-danger">Delete All</a></th>          
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $sql = "SELECT * FROM logs ORDER by logs.id DESC";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);                                        
                                        $rank = 1;
                                        $number = 0;
                                        do { ?>
                                            <tr>
                                                <td><?php echo $rows['user'];?></td>
                                                <td><?php echo $rows['activity'];?></td>
                                                <td><?php echo $rows['datetime'];?></td>
                                                <td><?php echo time_elapsed_string($rows['daysago']);?></td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure')" href="deletelog.php?ID=<?php echo $rows['id'];?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php $rank++;} while (($rows = mysqli_fetch_assoc($result)) and ($number <= 10))?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="logheader" style="text-align:center;">
                                <h4>Temporary User Transaction</h4>
                            </div>
                            <div class="logcard-body">
                                <table class="table table-striped table-bordered" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Activity</th>
                                        <th>Date of Transaction</th>
                                        <th>Reference Number</th>
                                        <th>Actions | <a onclick="return confirm('Are you sure')" href="deletealltemplog.php" class="btn btn-danger">Delete All</a></th>          
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $tsql = "SELECT * FROM tempo ORDER BY datetransaction DESC";
                                        $tresult = mysqli_query($conn, $tsql);
                                        $drows = mysqli_fetch_assoc($tresult);                                        
                                        $rank = 1;
                                        $number = 0;
                                        do { ?>
                                            <tr>
                                            <td><?php echo $drows['profile_name'];?></td>
                                            <td> Claimed <?php echo $drows['t_reward'];?> Pesos</td>
                                            <td><?php echo $drows['datetransaction'];?></td>
                                            <td><?php echo $drows['securitykey'];?></td>
                                            <td>
                                                <a onclick="return confirm('Are you sure')" href="deletetemplog.php?ID=<?php echo $drows['id'];?>" class="btn btn-danger">Delete</a>
                                            </td>
                                            </tr>
                                        <?php $rank++;} while (($drows = mysqli_fetch_assoc($tresult)) and ($number <= 10))?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </main>
    </div>
</body>

</html>