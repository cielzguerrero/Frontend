<?php
include('../connections/connection.php');
if (!isset($_SESSION['id'])) {

  $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
  header("Location: ../../Frontend/index.php");
} else {

  $id = $_SESSION['id'];

  $sql = "SELECT * FROM members WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_assoc($result);
  $currentprofileuser = $rows['username'];
  $userid = $rows['id'];

  
  if ($result == TRUE) {
    $count = mysqli_num_rows($result);

    if ($count > 0) {
    } else {
      $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
      header("Location: ../../Frontend/index.php");
    }
  }
}
include('../includes/timeinclude.php');
include('../includes/mainedit.php');
include('../includes/decreasepoint.php');
include('../includes/deposit.php');
$name = $rows['profilename'];
$username = $_SESSION['username'];
$arduinodata = $_GET["gdata"];
$bump=0;

$sql = "INSERT INTO tempdeposit (tdeposit) VALUES ('$arduinodata')";
$mresult = mysqli_query($conn,$sql);

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- LINE AWESOME -->
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <!-- JQUERY -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- OWL CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- TAILWIND -->
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
  <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
  <!-- MY CSS -->
  <link rel="stylesheet" href="../dist/output.css ">
  <link rel="stylesheet" href="../css/maintailwind.css">
  <!-- LIGHTBOX -->
  <link rel="stylesheet" href="../node_modules/lightbox2/dist/css/lightbox.css">
</head>




<body class = "bg-slate-200 dark:bg-slate-800" id="top">
 <!-- NAV -->
<nav class="bg-white border-gray-200 px-2 shadow-xl dark:shadow sm:px-4 py-4  dark:bg-slate-800">
  <div class="container flex flex-wrap justify-between items-center mx-auto">
  <a href="MainTailWind.php" class="flex items-center">
      <img src="../img/glogoblue.png" class="mr-3 h-8 sm:h-9 " alt="Flowbite Logo" />
      <span class="self-center ml-1 text-xl font-semibold whitespace-nowrap text-gray-700 dark:text-white">G-Reward</span>
  </a>
  
  <div class="flex items-center md:order-2">

    <!-- DARK MODE -->
    
    <button id="theme-toggle" type="button" class="text-gray-500  mr-5 rounded-lg text-sm py-2  px-2.5 bg-slate-200">
 
    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
    </button>



      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
        <span class="sr-only">Open user menu</span>
        <!-- image -->
        <img class="w-8 h-8 rounded-full ring-4  dark:ring-gray-600" src="../admin/images/profile/<?php echo $rows['img_name']; ?>" alt="user photo">
      </button>

      <!-- Dropdown menu -->
      <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
        <div class="py-3 px-4">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo $rows['profilename']; ?></span>
          <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400"><?php echo $rows['email']; ?></span>
        </div>
        <ul class="py-1" aria-labelledby="dropdown">
          <li>
            <a href="#profileanchor" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
          </li>
          <li>
            <a href="#logsanchor" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logs</a>
          </li>
          <li>
            <a href="#!" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      
    </button>
  </div>
  <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
    <li>
        <a href="#top" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">G-Points</a>
      </li>
      <li>
        <a href="#leaderanchor" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Leaderboard</a>
      </li>
      <li>
        <a href="#profileanchor" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
      </li>
      <li>
        <a href="#newsanchor" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">News</a>
      </li>
      <li>
        <a href="#logsanchor" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logs</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<!-- NIGHT TOGGLER -->
<section class = "darkToggler">
  
</section>
<!-- UPWARD TOGGLER -->
<section class = "upwardToggler" id="upward">
  <a href="#top" class="text-white   rounded-lg text-sm  bg-slate-200">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 11l3-3m0 0l3 3m-3-3v8m0-13a9 9 0 110 18 9 9 0 010-18z"></path></svg>
</a>
</section>


<!-- CARD -->
<section class = "pointcard mt-40 grid place-items-center ">
<div class="max-w-xs rounded-lg border  shadow-xl ">
  
    <h2 class="p-3 text-2xl">G-POINTS</h2>
    <h5 class="pl-3 pb-1 mt-10">Available Points</h5>
    <div class="bottomcard flex items-center">
      <h1 class="p-3 text-4xl font-black" id="refreshpoint"><?php echo $rows['points']; ?></h1>
      <button class="block  text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  ml-12 mr-3 px-10 py-3 text-center  dark:hover:bg-slate-800 dark:focus:ring-slate-800" type="button" data-modal-toggle="authentication-modal">
      Claim
    </button>
    </div>
</div>
</section>

<!-- MAIN WRAPPER -->
<section class ="whitewrapper bg-white rounded-xl dark:bg-slate-50 h-auto py-24">

  <!-- LEADERBOARD -->
  <div class="leaderboard mt-20" id="leaderanchor">
      
    <div class="leaderboard-wrapper  mx-auto bg-slate-200 shadow-xl  py-6 px-6 ring-1 ring-slate-500 rounded-md dark:bg-slate-800">
    <h3 class = "text-black dark:text-white pb-6">Leaderboard</h3>
        <!-- TOP3 -->
        <div class="top-lead flex justify-center content-center items-center mx-auto gap-5">
            <svg class = "svg1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,288L48,293.3C96,299,192,309,288,304C384,299,480,277,576,256C672,235,768,213,864,208C960,203,1056,213,1152,229.3C1248,245,1344,267,1392,277.3L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
            <svg class = "svg2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,32L48,26.7C96,21,192,11,288,21.3C384,32,480,64,576,101.3C672,139,768,181,864,192C960,203,1056,181,1152,149.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
       

            <div class="top-2 flex flex-col items-center">
                <!-- top 2 checker -->
                <?php
                $thisyear = date('Y');
                $thismonth = date('m');
                $sql = "SELECT * , SUM(dpoints) AS tpoints FROM deposits WHERE MONTH(datetime) = '$thismonth' AND YEAR(datetime) = '$thisyear' GROUP BY profileuser ORDER BY tpoints DESC LIMIT 1,2";
                $rsult = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($rsult);
                $totalpoints = $row['tpoints'];
                ?>
                <img src="../admin/images/profile/<?php echo $row['img_name']; ?>"  class = "rounded-full  h-28" alt="">
                <h2 class = "mt-2 text-gray-600 dark:text-white"><?php echo $row['profileuser']; ?></h2>
                <h1 class = "font-bold text-2xl text-gray-700 dark:text-white"><?php echo $totalpoints; ?></h1>
              
            </div>

            <div class="top-1 flex flex-col items-center pb-20">
                <!-- top 1 checker  -->
                <?php
                $thisyear = date('Y');
                $thismonth = date('m');
                $sql = "SELECT * , SUM(dpoints) AS tpoints FROM deposits WHERE MONTH(datetime) = '$thismonth' AND YEAR(datetime) = '$thisyear' GROUP BY profileuser ORDER BY tpoints DESC LIMIT 0,1";
                $rsult = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($rsult);
                $totalpoints = $row['tpoints'];
                ?>
            <img src="../admin/images/profile/<?php echo $row['img_name']; ?>" class = "rounded-full h-28" alt="">
            <h2 class = "mt-2  text-gray-600 dark:text-white"><?php echo $row['profileuser']; ?></h2>
            <h1 class = "font-bold text-2xl text-gray-700 dark:text-white"><?php echo $totalpoints; ?> </h1>
            </div>

            <div class="top-3 flex flex-col items-center">
                <!-- top 3 checker -->
                <?php
                $thisyear = date('Y');
                $thismonth = date('m');
                $sql = "SELECT * , SUM(dpoints) AS tpoints FROM deposits WHERE MONTH(datetime) = '$thismonth' AND YEAR(datetime) = '$thisyear' GROUP BY profileuser ORDER BY tpoints DESC LIMIT 2,3";
                $rsult = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($rsult);
                $totalpoints = $row['tpoints'];
                ?>
            <img src="../admin/images/profile/<?php echo $row['img_name']; ?>" class = "rounded-full h-28" alt="">
            <h2 class = "mt-2  text-gray-600 dark:text-white"><?php echo $row['profileuser']; ?></h2>
            <h1 class = "font-bold text-gray-700 text-2xl dark:text-white"><?php echo $totalpoints; ?></h1>
            </div>
            
        </div>
        <!-- TOP5 -->
        <div class="top-five">
        <?php
            $thisyear = date('Y');
            $thismonth = date('m');
            $sql = "SELECT * , SUM(dpoints) AS tpoints FROM deposits WHERE MONTH(datetime) = '$thismonth' AND YEAR(datetime) = '$thisyear' GROUP BY profileuser ORDER BY tpoints DESC LIMIT 3,5";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);
            $rank = 4;
            $number = 0;
            do { ?>
              <tr class="trBorder">""
                <td aria-placeholder="none"><?php echo $rank; ?>th</td>
                <td class="rank-image" aria-placeholder="none"><img src="../admin/images/profile/<?php echo $rows['img_name']; ?>" style="background:white;"></td>
                <td><?php echo $rows['profileuser']; ?></td>
                <td><?php echo $rows['tpoints']; ?></td>
              </tr>
            <?php $rank++;
            } while (($rows = mysqli_fetch_assoc($result)) and ($number <= 4)) ?>
          </table>

        </div>
    </div>
  </div>



     <!-- PROFILE -->
     <div class="profile pt-20" id="profileanchor">

         <div class="profile-wrapper  shadow-2xl bg-slate-200 dark:bg-slate-800 ring-2  ring-slate-400 rounded p-4 md:flex sm:flex-column items-center">
         <h4 class = "text-gray-800 dark:text-white">Profile</h4>
                <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 250" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(2, 0, 36, 0.74)" offset="0%"></stop><stop stop-color="rgba(9, 9, 121, 0.75)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,50L30,54.2C60,58,120,67,180,91.7C240,117,300,158,360,145.8C420,133,480,67,540,70.8C600,75,660,150,720,175C780,200,840,175,900,141.7C960,108,1020,67,1080,41.7C1140,17,1200,8,1260,37.5C1320,67,1380,133,1440,162.5C1500,192,1560,183,1620,150C1680,117,1740,58,1800,41.7C1860,25,1920,50,1980,70.8C2040,92,2100,108,2160,95.8C2220,83,2280,42,2340,25C2400,8,2460,17,2520,45.8C2580,75,2640,125,2700,154.2C2760,183,2820,192,2880,183.3C2940,175,3000,150,3060,129.2C3120,108,3180,92,3240,100C3300,108,3360,142,3420,137.5C3480,133,3540,92,3600,70.8C3660,50,3720,50,3780,58.3C3840,67,3900,83,3960,100C4020,117,4080,133,4140,141.7C4200,150,4260,150,4290,150L4320,150L4320,250L4290,250C4260,250,4200,250,4140,250C4080,250,4020,250,3960,250C3900,250,3840,250,3780,250C3720,250,3660,250,3600,250C3540,250,3480,250,3420,250C3360,250,3300,250,3240,250C3180,250,3120,250,3060,250C3000,250,2940,250,2880,250C2820,250,2760,250,2700,250C2640,250,2580,250,2520,250C2460,250,2400,250,2340,250C2280,250,2220,250,2160,250C2100,250,2040,250,1980,250C1920,250,1860,250,1800,250C1740,250,1680,250,1620,250C1560,250,1500,250,1440,250C1380,250,1320,250,1260,250C1200,250,1140,250,1080,250C1020,250,960,250,900,250C840,250,780,250,720,250C660,250,600,250,540,250C480,250,420,250,360,250C300,250,240,250,180,250C120,250,60,250,30,250L0,250Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(0, 212, 255, 0.77)" offset="0%"></stop><stop stop-color="rgba(0, 212, 255, 0.75)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,125L30,108.3C60,92,120,58,180,54.2C240,50,300,75,360,79.2C420,83,480,67,540,54.2C600,42,660,33,720,41.7C780,50,840,75,900,87.5C960,100,1020,100,1080,95.8C1140,92,1200,83,1260,100C1320,117,1380,158,1440,162.5C1500,167,1560,133,1620,137.5C1680,142,1740,183,1800,187.5C1860,192,1920,158,1980,133.3C2040,108,2100,92,2160,75C2220,58,2280,42,2340,33.3C2400,25,2460,25,2520,54.2C2580,83,2640,142,2700,141.7C2760,142,2820,83,2880,50C2940,17,3000,8,3060,4.2C3120,0,3180,0,3240,33.3C3300,67,3360,133,3420,166.7C3480,200,3540,200,3600,195.8C3660,192,3720,183,3780,170.8C3840,158,3900,142,3960,150C4020,158,4080,192,4140,204.2C4200,217,4260,208,4290,204.2L4320,200L4320,250L4290,250C4260,250,4200,250,4140,250C4080,250,4020,250,3960,250C3900,250,3840,250,3780,250C3720,250,3660,250,3600,250C3540,250,3480,250,3420,250C3360,250,3300,250,3240,250C3180,250,3120,250,3060,250C3000,250,2940,250,2880,250C2820,250,2760,250,2700,250C2640,250,2580,250,2520,250C2460,250,2400,250,2340,250C2280,250,2220,250,2160,250C2100,250,2040,250,1980,250C1920,250,1860,250,1800,250C1740,250,1680,250,1620,250C1560,250,1500,250,1440,250C1380,250,1320,250,1260,250C1200,250,1140,250,1080,250C1020,250,960,250,900,250C840,250,780,250,720,250C660,250,600,250,540,250C480,250,420,250,360,250C300,250,240,250,180,250C120,250,60,250,30,250L0,250Z"></path></svg>
                

                <div class="left grid items-center justify-center rounded  py-5">
                <!-- <h2 class ="text-center text-black dark:text-white">Profile</h2> -->
                <?php
                    $sql = "SELECT * FROM members WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_assoc($result);
                    ?>
                <img src="../AdminTailWind/images/profile/<?php echo $rows['img_name']; ?>" class="rounded" id="profImage">
                    <i class="las la-edit rounded-b text-center  text-white font-bold text-4xl" id="cameraPhoto"></i>
                    <input class="block" aria-describedby="user_avatar_help" id="uploadPhoto" type="file">
                    
                </div>
                <div class="right px-6 ">
                    <form action="" method="POST">
                    <!-- USERNAME -->
                    <div class="top flex justify-between items-center mt-4">
                    <input type="text" class = "w-full h-6 rounded py-4 mt-3 ring-2 ring-slate-50 border-none text-gray-700 dark:text-white text-start shadow-inner" value="<?php echo $rows['username']; ?>">
                    <!-- FULL NAME -->
                    <input type="text" class = "w-full h-6 rounded py-4 mt-3 ml-5 ring-2 ring-slate-400 border-none text-gray-700 dark:text-white text-start" value=" <?php echo $rows['fullname']; ?>">
                    </div>
                    <!-- PROFILE NAME -->
                    <input type="text" class = "w-full h-6 rounded py-4 mt-3 ring-2 ring-slate-400 border-none text-gray-700 dark:text-white text-start" value="<?php echo $rows['profilename']; ?>">
                     <!-- CONTACT NUMBER -->
                    <input type="text" class = "w-full h-6 rounded py-4 mt-3 ring-2 ring-slate-400 border-none text-gray-700 dark:text-white text-start" value="<?php echo $rows['contact']; ?>">
                     <!-- EMAIL -->
                    <input type="email" class = "w-full h-6 rounded py-4 mt-3 ring-2 ring-slate-400 border-none text-gray-700 dark:text-white text-start" value="<?php echo $rows['email']; ?>" required>
                    <!-- PASSWORD -->
                    <input type="password" class = "w-full h-6 rounded py-4 mt-3 ring-2 ring-slate-400 border-none text-gray-700 dark:text-white text-start" value="<?php echo $rows['password']; ?>">
                    <!-- BARANGAY -->
                    <select id="countries" class=" rounded ring-2 ring-slate-400  w-full  text-blackk   dark:text-white mt-3" value="<?php echo $rows['address']; ?>">
                    <option selected value="<?php echo $rows['address']; ?>" class ="text-black dark:text-white bg-slate-200 dark:bg-slate-800 hover:bg-slate-900 focus:bg-slate-900"><?php echo $rows['address']; ?><h2 class="text-black dark:text-white"></h2></option>
                    <option value="Barangay Nueva" class ="bg-slate-200 dark:bg-slate-800  text-black dark:text-white">Barangay Nueva</option>
                    <option value="Barangay Nueva" class ="bg-slate-200 dark:bg-slate-800  text-black dark:text-white">Barangay San Antonio</option>
                    <option value="Barangay San Antonio" class ="bg-slate-200 dark:bg-slate-800 text-black dark:text-white">Barangay San Vicente</option>
                    <option value="Barangay San Vicente" class ="bg-slate-200 dark:bg-slate-800 text-black dark:text-white">Barangay San Roque</option>
                    <option value="Barangay San Vicente" class ="bg-slate-200 dark:bg-slate-800 text-black dark:text-white">Barangay Landayan</option>
                    </select>
                    <!-- SUBMIT PROFILE -->
                    <button class = "mt-3 w-full text-start bg-slate-700 rounded py-1 text-lg text-white mb-4 font-bold">Submit</button>
                    </form>
                    
                </div>

            </div>
         </div>
     </div>
    
     <!-- NEWS -->
     <div class="news pt-20" id="newsanchor">
         <div class="news-wrapper dark:bg-slate-800 ring-2 shadow-2xl ring-slate-200 rounded">   
         <!-- <div id="controls-carousel" class="relative" data-carousel="slide">
            Carousel wrapper    -->
            <div class="overflow-hidden  dark:bg-slate-800  h-auto relative rounded-lg sm:h-64 xl:h-96 2xl:h-96">
                    <!-- OWL CAROUSEL -->
                        <div class="owl-carousel owl-theme ">

                    <?php
                    $sql = "SELECT * FROM news";
                    $result = mysqli_query($conn, $sql);
                    $rows = mysqli_fetch_assoc($result);
                    $ranker = 1;
                    do { ?>
                    <div class="item"><img src="../AdminTailWind/images/news/<?php echo $rows['news_img']; ?>">
                        <a href="../mainPage/ViewNews.php?ID=<?php echo $rows['news_id']; ?>"><h4 class = "text-center font-bold text-4xl text-white"><?php echo $rows['news_title']; ?></h4></a>
                    </div>
                    <?php $ranker++;
                    } while ($rows = mysqli_fetch_assoc($result)) ?>
                    </div>


                  
                    <!-- Item sample -->
                    <!-- <div class="hidden duration-700 ease-in-out  carousel-container" data-carousel-item>
                        <img src="../mainPage/main-images/3img.jpg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                        <a href="#!" class = ""><h2 class="text-center text-4xl">NEWS TITLE</h2><p class= "text-center">Read more...</p></a>
                    </div> -->

                </div>
           
          
                
            </div>
         </div>
     </div>

     <!-- LOGS SECTION -->
     <div class="logs pt-20" id="logsanchor">
         <div class="logs-wrapper shadow-2xl  ring-2 ring-slate-200 rounded">
         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200 text-center">
            <tr>
                <th scope="col" class="px-6 py-3 text-md">
                    User
                </th>
                <th scope="col" class="px-6 py-3 text-md">
                    Activity
                </th>
                <th scope="col" class="px-6 py-3 text-md">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-md">
                    Elapsed Time
                </th>

            </tr>
        </thead>
        <tbody class="text-center">
        <?php
          $sql = "SELECT * FROM logs WHERE user='$currentprofileuser' ORDER BY id DESC Limit 0,5";
          $result = mysqli_query($conn, $sql);
          $rows = mysqli_fetch_assoc($result);
          $rank = 1;
          $number = 0;
          do { ?>
            <tr >
              <td  scope="row" class = "pt-3 pb-2 dark:text-white dark:bg-slate-800"><?php echo $rows['user']; ?></td>
              <td class = "dark:text-white dark:bg-slate-800"><?php echo $rows['activity']; ?></td>
              <td class = "dark:text-white dark:bg-slate-800"><?php echo $rows['datetime']; ?></td>
              <td class = "dark:text-white dark:bg-slate-800"><?php echo time_elapsed_string($rows['daysago']); ?></td>
            </tr>
          <?php $rank++;
          } while (($rows = mysqli_fetch_assoc($result)) and ($number <= 5)) ?>
        </tbody>
    </table>
</div>
         </div>
     </div>
</section>


<!-- CLAIM MODAL -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full claim-modal">
    <div class="relative w-full h-full max-w-lg p-4 md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
            </button>
            <div class="px-6 py-6  ">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Claim Rewards</h3>

                <div class="flex flex-wrap justify-center items-center mt-4  gap-2 containers">
                    <img src="../admin/images/prize/Prize-256.jpg" class="h-24 shadow-xl ring-2 ring-slate-800 mx-2">
                    <a href="#!"><h2 class ="px-3  py-2 rounded-md bg-slate-700 dark:bg-slate-50 text-white dark:text-gray-700 text-xl block">1000 PTS</h2></a>
                </div>
                <div class="flex flex-wrap justify-center items-center mt-4  gap-2 containers">
                    <img src="../admin/images/prize/Prize-63.png" class="h-24 shadow-xl ring-2 ring-slate-800 mx-2">
                    <a href="#!"><h2 class ="px-3  py-2 rounded-md bg-slate-700 dark:bg-slate-50 text-white dark:text-gray-700 text-xl block">2000 PTS</h2></a>
                </div>

                <div class="flex flex-wrap justify-center items-center mt-4  gap-3 containers">
                    <img src="../admin/images/prize/Prize-226.jpg" class="h-24 shadow-xl ring-2 ring-slate-800 mx-2">
                    <a href="#!"><h2 class ="px-3  py-2 rounded-md bg-slate-700 dark:bg-slate-50 text-white dark:text-gray-700 text-xl block">5000 PTS</h2></a>
                </div>
               
                    
            </div>
        </div>
    </div>
</div> 
<!-- MAINWRAPPER -->




<!-- FOOTER -->
 <footer class="p-5 bg-white sm:p-6 dark:bg-slate-800 mt-36 w-lg-50 ">
    <div class="md:flex md:justify-between footers mx-auto max-w-7xl">
        <div class="mb-6 md:mb-0">
            <a href="#top" class="flex items-center">
                <img src="../img/glogoblue.png" class="mr-3 h-8" alt="FlowBite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-700 dark:text-white">G-Reward</span>
            </a>
        </div>





        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Quick Links</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-1">
                        <a href="#top" class="hover:underline">G-Points</a>
                    </li>
                    <li class="mb-1">
                        <a href="#leaderanchor" class="hover:underline">Leaderboard</a>
                    </li>
                    <li class="mb-1">
                        <a href="#profileanchor" class="hover:underline">Profile</a>
                    </li>
                    <li class="mb-1">
                        <a href="#newsanchor" class="hover:underline">News</a>
                    </li>
                    <li class="mb-1">
                        <a href="#logsanchor" class="hover:underline">Logs</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Information</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-1">
                        <a href="AboutUs2.php" class="hover:underline ">About Us</a>
                    </li>
                    <li class="mb-1">
                        <a href="GettingStarted2.php" class="hover:underline">Getting Started</a>
                    </li>
                    <li class="mb-1">
                        <a href="ContactUs2.php" class="hover:underline ">Contact Us</a>
                    </li>
                    <li class="mb-1">
                        <a href="OurTeam2.php" class="hover:underline">Our Team</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Email </h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="#!" class="">grewardmanagement <br>@gmail.com</a>
                    </li>
              
                </ul>
            </div>


            
            
        </div>

      
     </div>



    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8 mx-auto max-w-7xl" />
    <div class="sm:flex sm:items-center sm:justify-between mx-auto max-w-7xl">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="#!" class="hover:underline">G-Reward</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
            </a>
           
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
            </a>
 
        </div>
    </div>
</footer> 


<!-- OWL JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- MYSCRIPT -->
<script src="../js/maintailwind.js"></script>
<!-- SCRIPTS TAILWIND -->
<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script>
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
    
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});
</script>
<script> 
      $(document).ready(function(){
      setInterval(function(){
            $("#refreshpoint").load(window.location.href + " #refreshpoint" );
      }, 1000);
      });
</script>
</body>
</html>