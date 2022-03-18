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
                    <span>Garbage</span></a>
                </li>
                <li>
                    <a href="carousel.php"><span class="la la-money"></span>
                    <span>News & Prizes</span></a>
                </li>
                <li>
                    <a href="members.php"  class="active"><span class="la la-user"></span>
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
                    <div><span class="las la-bars"></span>Profile</div>
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
        <div class="member-grid">
                    <div class="leaderboards">
                        <div class="card">
                            <div class="memberheader" style="text-align:center;">
                                <h4>Profile/Members</h4>
                                <p><?php echo $_SESSION['update'];?></p>
                            </div>
                            <div class="membercard-body">
                                <table class="table table-striped table-bordered" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>Full Name</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Actions | <a href="addmember.php" class="btn btn-primary" style="background:#54BAB9;border:#54BAB9;">Add</a></th>                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                        $sql = "SELECT * FROM members";
                                        $result = mysqli_query($conn, $sql);
                                        $rows = mysqli_fetch_assoc($result);                                        
                                        $rank = 1;
                                        $number = 0;
                                        do { ?>
                                            <tr>
                                                <td><img src="images/profile/<?php echo $rows['img_name'];?>" style = "width:2rem;height:2rem;border: 2px solid rgb(0, 161, 205);;" onerror="this.style.display='none' border-style='solid' border-width='5px' ;"></td>
                                                <td><?php echo $rows['profilename'];?></td>
                                                <td><?php echo $rows['status'];?></td>
                                                <td><?php echo $rows['datecreated'];?></td>
                                                <td><?php echo $rows['email'];?></td>
                                                <td><?php echo $rows['contact'];?></td>
                                                <td>
                                                    <a href="viewmemberprofile.php?ID=<?php echo $rows['id'];?>" class="btn btn-secondary">View Profile</a>
                                                    <a href="editmemberprofile.php?ID=<?php echo $rows['id'];?>" class="btn btn-secondary">Update</a>
                                                    <a onclick="return confirm('Are you sure')" href="deleteprofile.php?ID=<?php echo $rows['id'];?>&Image_Name=<?php echo $rows['img_name'];?>" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php $rank++;} while (($rows = mysqli_fetch_assoc($result)) and ($number <= 10))?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </main>
    </div>
</body>

</html>