<?php
include('connections/connection.php');
include('includes/afterlogin.php');
include('includes/timeinclude.php');
include('includes/time.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- MY CSS -->
    <link rel="stylesheet" href="../AdminCss/dashboard.css">
    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <!-- FLOWBITE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
    <!-- CHARTS TAILWIND -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- OWL CAROUSEL CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
</head>
<?php
include('includes/time.php');
?>
<body  class = "bg-slate-800">

<!-- onload="startTime()" -->
    <section class = "main-wrapper rounded-xl">


            <nav class = "  bg-slate-200 fixed" id = "nav">
                <div class="p-5">
                    <div class="flex flex-col justify-center items-center content-center">
                        <!-- SIDEBAR LOGO -->
                        <img src="../img/Glogoblue.png" class ="h-12">
                        <!-- TABS -->
                        <div class="tabs mt-24 flex flex-col  justify-center items-center content-center">
                        <a href="#!"><i class="fa-solid px-3 py-2 bg-slate-800 rounded  fa-house  text-2xl mt-10 text-white  "></i></a>
                        <a href="../AdminTailWind/waste.php"><i class="fa-solid fa-wine-bottle text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/NewsPrizes.php"><i class="fa-solid fa-money-bill text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/members.php"><i class="fa-solid fa-user text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/logs.php"><i class="fa-solid fa-paperclip text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/analytics.php"><i class="fa-solid fa-chart-simple text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="logout.php"><i class="fa-solid fa-power-off text-2xl mt-48 text-slate-600  hover:text-red-800"></i></a>
                        </div>
            
                </div>
            </nav>


        <!-- CONTENTS WRAPPER -->
        <main class ="bg-slate-200 md:p-6 sm:p-3   overflow-y-auto" id = "contents">
            <!-- HEADER -->
            <div class="header pt-4 mb-4 pb-3 px-4 flex items-center justify-around drop-shadow-lg rounded-lg">
                <a href="#!" class ="mobileToggler mr-3  lg:hidden md:block " >
                                <span class = ""><h6>test</h1></span>
                                <span class = ""> </span>
                                <span class = ""> </span>
                        </a>
                <h1 class = "text-xl font-bold flex-1 text-slate-600">Dashboard</h1>
                <!-- TIME CLOCK -->
                <i class="fa-solid fa-clock mr-2 text-xl font-bold text-slate-600 lg:block md:hidden sm:hidden xs:hidden clock "></i>
                <h1 class = "text-xl font-bold text-slate-600 lg:block md:hidden sm:hidden xs:hidden clock flex-auto" id="runningTime">

                </h1>
                <!-- PROFILE NAME --> 
                    <div class="profile-display ">
                    <h1 class = "text-md font-bold text-slate-600 " ><?php echo $afullname;?></h1>
                    <h1 class = "text-sm text-center text-slate-600" ><?php echo $astatus;?></h1>
                    </div>
            </div>

        <!-- CONTENTS -->
        <div class="content-wrapper   mt-5 mx-2">
            <!-- TOP CONTENTS -->
            <div class="container grid xl:grid-cols-3 lg:grid-cols-3 
            md:grid-cols-2   sm:grid-cols-2  gap-4 ">
                
                <div class="box rounded-xl drop-shadow-md  p-14 px-28 bg-slate-100">
                            <?php
                            $sql = "SELECT * FROM members";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            ?>
                    <h1 class= "text-3xl font-bold text-center mb-5 text-slate-600"><?php echo $count?></h1>
                    <h1 class = "text-center font-semibold text-slate-600"> <i class="fa-solid fa-users pr-2"></i>Members</h1>
                </div>
                
                 
                <div class="box rounded-xl drop-shadow-md p-14 px-28 bg-slate-100">
                            <?php
                            $sql = "SELECT * FROM logs";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            ?>
                    <h1 class= "text-3xl font-bold text-center mb-5 text-slate-600"><?php echo $count?></h1>
                    <h1 class = "text-center font-semibold text-slate-600"> <i class="fa-solid fa-note-sticky pr-2"></i>Logs</h1>
                </div>

                <div class="box rounded-xl drop-shadow-md p-14 px-28 bg-slate-100">
                <?php
                            $sql = "SELECT SUM(garbage_Count) AS garbagecount FROM garbagetype";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            $rows = mysqli_fetch_assoc($result);
                            $totalgcount = $rows['garbagecount'];
                            ?>
                    <h1 class= "text-3xl font-bold text-center mb-5 text-slate-600"><?php echo $totalgcount?></h1>
                    <h1 class = "text-center font-semibold text-slate-600"> <i class="fa-solid fa-truck pr-2"></i>Total Collected</h1>
                </div>
            </div>


            <!-- MIDDLE CONTENTS -->
            <div class="bottom-contents  overflow-hidden mt-5 grid  xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs:grid-cols-1  justify-center items-center ">
                  
                <!-- DONUT TOTAL BARANGAY MEMBERS -->
                <div class="">
              
                <canvas class="p-1" id="chartDoughnut"></canvas>
                <div class="text-center  drop-shadow-xl text-slate-600 font-bold">Member per Brgy.</div>
                </div>

                <!-- POINTS PER BARANGAY -->
                <div class="">
                <canvas class="p-1" id="chartDoughnut2"></canvas>
                <div class="text-center  drop-shadow-xl text-slate-600 font-bold">Total Points per Brgy.</div>
                </div>
              
                <!-- PRIZES -->
                <div class="prizes my-5 overflow-hidden drop-shadow-xl rou">
                <h1 class = "font-semibold text-center text-lg text-slate-100 py-1 mt-2  bg-slate-800  ">Prizes</h1>
                    <div class="owl-one owl-carousel owl-theme overflow-hidden">
                    <?php
                                            $sql = "SELECT * FROM prizes";
                                            $result = mysqli_query($conn, $sql);
                                            $rows = mysqli_fetch_assoc($result);
                                            $ranker = 1; 
                                            do { ?>
                        <!-- PRIZE 1 -->
                        <div class="item "><img src="images/prize/<?php echo $rows['prize_img'];?>" ></div>
                        <?php $ranker++; }  while ($rows = mysqli_fetch_assoc($result))?> 
                    </div>
                </div>
              
                
                
            </div>
            
            <!--BOTTOM  CONTENTS -->
            <div class="middle-container mt-5  grid xl:grid-cols-2 lg:grid-cols-2 
            md:grid-cols-1   sm:grid-cols-1  mx-2 gap-4 ">
                <!-- LEADERBOARD -->
                <div class="leaderboard ">
                        <h1 class = "font-semibold text-lg text-center  py-1 rounded text-slate-100 bg-slate-800 ">Leaderboard</h1>
                        <div class="relative overflow-y-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
                                <!-- THEAD -->
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Rank
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Points
                                        </th>
                                   
                                      
                                    </tr>
                                </thead>
                                <!-- TBODY -->
                                <tbody>
                                <?php  
                                       $sql = "SELECT * FROM members ORDER BY totalpoints DESC LIMIT 0,5";
                                       $result = mysqli_query($conn, $sql);
                                       $rows = mysqli_fetch_assoc($result);
                                       $rank = 1;
                                       $number = 0;
                                        do { ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            <?php echo $rank;?>
                                        </th>
                                        <td class="px-6 py-4">
                                            <?php echo $rows['profilename'];?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?php echo $rows['totalpoints'];?>
                                        </td>     
                                    </tr>
                                    <?php $rank++;} while (($rows = mysqli_fetch_assoc($result)) and ($number <= 4))?>
                                </tbody>
                            </table>
                        </div>
                </div>
                   <!-- LOGS -->
                   <div class="logs mb-10 drop-shadow">
               
                        <h1 class = "font-semibold text-lg text-center py-1 px-5   rounded text-slate-100 bg-slate-800 ">Logs</h1>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-gray-500 dark:text-gray-400 text-center">
                                <!-- THEAD -->
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Activity
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Time
                                        </th>
                                     
                                   
                                      
                                    </tr>
                                </thead>
                                <!-- TBODY -->
                                <tbody>
                                <?php  
                                    $sql = "SELECT * FROM logs ORDER by id  DESC LIMIT 0,5";
                                    $result = mysqli_query($conn, $sql);
                                    $rows = mysqli_fetch_assoc($result);
                                    $number = 0;
                                    do { ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <?php echo $rows['activity'];?>
                                        </th>
                                        <td class="px-6 py-4">
                                        <?php echo $rows['datetime'];?>
                                        </td>
                                     
                                   
                                    </tr>
                                    <?php $number++; } while (($rows = mysqli_fetch_assoc($result)) and ($number <= 4))?>       
                                </tbody>
                            </table>
                        </div>
                </div>
               
            </div>
        </div>
     
       
       
        </main>
    </section>


         
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

          <!-- OWL JS -->
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- MY SCRIPT -->
    <script src="../AdminJs/admin.js"></script>
    <!-- flowbiet JS -->
    
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    setInterval(runningTime, 1000);
    });
    function runningTime() {
    $.ajax({
        url: '../AdminTailWind/includes/timescript.php',
        success: function(data) {
        $('#runningTime').html(data);
        },
    });
    }
    </script>
</body> 
</html> 