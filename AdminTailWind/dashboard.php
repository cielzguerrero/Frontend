<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body  class = "bg-slate-800"onload="startTime()">

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
                        <a href=""><i class="fa-solid fa-money-bill text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-user text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-paperclip text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-chart-simple text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-power-off text-2xl mt-48 text-slate-600  hover:text-red-800"></i></a>
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
                <h1 class = "text-xl font-bold text-slate-600 lg:block md:hidden sm:hidden xs:hidden clock flex-auto" id = "clock">

                </h1>
                <!-- PROFILE NAME --> 
                    <div class="profile-display ">
                    <h1 class = "text-md font-bold text-slate-600 " >Cielito Guerrero</h1>
                    <h1 class = "text-sm text-center text-slate-600" >Admin</h1>
                    </div>
            </div>

        <!-- CONTENTS -->
        <div class="content-wrapper   mt-5 mx-2">
            <!-- TOP CONTENTS -->
            <div class="container grid xl:grid-cols-3 lg:grid-cols-3 
            md:grid-cols-2   sm:grid-cols-2  gap-4 ">
                
                <div class="box rounded-xl drop-shadow-md  p-14 px-28 bg-slate-100">
                    <h1 class= "text-3xl font-bold text-center mb-5 text-slate-600">150</h1>
                    <h1 class = "text-center font-semibold text-slate-600"> <i class="fa-solid fa-users pr-2"></i>Members</h1>
                </div>
                
                 
                <div class="box rounded-xl drop-shadow-md p-14 px-28 bg-slate-100">
                    <h1 class= "text-3xl font-bold text-center mb-5 text-slate-600">150</h1>
                    <h1 class = "text-center font-semibold text-slate-600"> <i class="fa-solid fa-note-sticky pr-2"></i>Logs</h1>
                </div>

                <div class="box rounded-xl drop-shadow-md p-14 px-28 bg-slate-100">
                    <h1 class= "text-3xl font-bold text-center mb-5 text-slate-600">150</h1>
                    <h1 class = "text-center font-semibold text-slate-600"> <i class="fa-solid fa-truck pr-2"></i> Collected</h1>
                </div>
            </div>


            <!-- MIDDLE CONTENTS -->
            <div class="bottom-contents mt-5 grid  xl:grid-cols-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 xs:grid-cols-1 overflow-hidden justify-center items-center ">
                  
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
                    <div class="owl-carousel ">
            
                        <!-- PRIZE 1 -->
                        <div class="item "><img src="../admin/images/prize/Prize-256.jpg" alt=""></div>
                        <!-- PRIZE 2 -->
                        <div class="item"><img src="../admin/images/prize/Prize-63.png"></div>
                        <!-- PRIZE 3 -->
                        <div class="item"><img src="../admin/images/prize/Prize-226.jpg"></div>
                    
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
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            1
                                        </th>
                                        <td class="px-6 py-4">
                                            aldrin
                                        </td>
                                        <td class="px-6 py-4">
                                        3050
                                        </td>
                                     
                                   
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            2
                                        </th>
                                        <td class="px-6 py-4">
                                        aldrin
                                        </td>
                                        <td class="px-6 py-4">
                                        3050
                                        </td>
                                  
                                     
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                             3
                                        </th>
                                        <td class="px-6 py-4">
                                        aldrin
                                        </td>
                                        <td class="px-6 py-4">
                                            3050
                                        </td>
                                    </tr>
                                    <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                             4
                                        </th>
                                        <td class="px-6 py-4">
                                        aldrin
                                        </td>
                                        <td class="px-6 py-4">
                                            3050
                                        </td>
                                    </tr>   <tr class="bg-white dark:bg-gray-800">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                             5
                                        </th>
                                        <td class="px-6 py-4">
                                        aldrin
                                        </td>
                                        <td class="px-6 py-4">
                                            3050
                                        </td>
                                    </tr>
             
                                </tbody>
                            </table>
                        </div>
                </div>
                   <!-- LOGS -->
                   <div class="logs mb-10 ">
               
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
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Bojji Kage : Gained 3 points
                                        </th>
                                        <td class="px-6 py-4">
                                        2022-04-29 04:56:28
                                        </td>
                                    
                                     
                                   
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Bojji Kage : Gained 3 points
                                        </th>
                                        <td class="px-6 py-4">
                                        2022-04-29 04:56:28
                                        </td>   
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Bojji Kage : Gained 3 points
                                        </th>
                                        <td class="px-6 py-4">
                                        2022-04-29 04:56:28
                                        </td>   
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Bojji Kage : Gained 3 points
                                        </th>
                                        <td class="px-6 py-4">
                                        2022-04-29 04:56:28
                                        </td>   
                                    </tr>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Bojji Kage : Gained 3 points
                                        </th>
                                        <td class="px-6 py-4">
                                        2022-04-29 04:56:28
                                        </td>   
                                    </tr>
                                 
                                </tbody>
                            </table>
                        </div>
                </div>
               
            </div>
        </div>
     
       
       
        </main>
    </section>


      

          <!-- OWL JS -->
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- MY SCRIPT -->
    <script src="../AdminJs/admin.js"></script>
    <!-- flowbiet JS -->
    
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</body> 
</html> 