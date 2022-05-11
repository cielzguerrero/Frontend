<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News & Prizes</title>

    <!-- MY CSS -->
    <link rel="stylesheet" href="../AdminCss/dashboard.css">
    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <!-- FLOWBITE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
  
      <!-- OWL CAROUSEL CSS-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
  <!-- JQUERY -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body  class = "bg-slate-800" onload="startTime()">

    <section class = "main-wrapper rounded-xl">


            <nav class = "  bg-slate-200 fixed" id = "nav">
                <div class="p-5">
                    <div class="flex flex-col justify-center items-center content-center">
                        <!-- SIDEBAR LOGO -->
                        <img src="../img/Glogoblue.png" class ="h-12">
                        <!-- TABS -->
                        <div class="tabs mt-24 flex flex-col  justify-center items-center content-center">
                        <a href="../AdminTailWind/dashboard.php"><i class="fa-solid  fa-house  text-2xl mt-10 text-slate-600 hover:text-blue-600 "></i></a>
                        <a href="../AdminTailWind/waste.php"><i class="fa-solid fa-wine-bottle text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/NewsPrizes.php"><i class="fa-solid bg-slate-800 rounded  text-2xl mt-10 text-white fa-money-bill px-3 py-2"></i></a>
                        <a href="../AdminTailWind/members.php"><i class="fa-solid fa-user text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/logs.php"><i class="fa-solid fa-paperclip text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/analytics.php"><i class="fa-solid fa-chart-simple text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
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
                <h1 class = "text-xl font-bold flex-1 text-slate-600">News & Prizes</h1>
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
                    <div class="content-wrapper overflow-hidden xl:w-3/4 lg:w-3/4 md:w-3/4 sm:w-full xs:w-full mt-16 mx-auto">
                        <!-- NEWS -->
                           <div class="news overflow-hidden  mx-4 ">
                           <div class=" bg-slate-800/90 rounded-t">   
                                <h1 class =" py-2 text-2xl font-semibold text-white text-center ">News</h1>
                               
                            </div>
                               <div class="owl-carousel owl-theme">
                                   <!-- ITEM 1 -->
                            <div class="item w-full"><img src="../admin/images/news/News-405.jpg" ><h4 class = " w-full text-center pl-4 bg-slate-800/90 text-white text-xl py-4 font-semibold  rounded-b">Waste Management</h4>
                                <div class=" flex justify-center gap-2 mt-5 drop-shadow-xl">
                                <a href="../AdminTailWind/viewnews.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">View</button></a>
                                    <a href="../AdminTailWind/updatenews.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Upd/Add</button></a>
                                    <a href=""><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Delete</button></a>
                             
                                </div>
                            </div>
                           
                                       <!-- ITEM 2 -->
                            <div class="item w-full"><img src="../admin/images/news/News-619.png" ><h4 class = " w-full text-center pl-4 bg-slate-800/90 text-white text-xl py-4 font-semibold  rounded-b">Waste Management</h4>
                                <div class=" flex justify-center gap-2 mt-5 drop-shadow-xl">
                                <a href="../AdminTailWind/viewnews.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">View</button></a>
                                    <a href="../AdminTailWind/updatenews.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Upd/Add</button></a>
                                    <a href=""><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Delete</button></a>
                             
                                </div>
                            </div>
                                     
                                       <!-- ITEM 3 -->
                            <div class="item w-full"><img src="../admin/images/news/News-187.png" ><h4 class = " w-full text-center pl-4 bg-slate-800/90 text-white text-xl py-4 font-semibold rounded-b">Waste Management</h4>
                                <div class=" flex justify-center gap-2 mt-5 drop-shadow-xl">
                                <a href="../AdminTailWind/viewnews.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">View</button></a>
                                    <a href="../AdminTailWind/updatenews.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Upd/Add</button></a>
                                    <a href=""><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Delete</button></a>
                                </div>
                            </div>
                            
                        </div>
                        <!-- PRIZES -->
                        <div class="prizes overflow-hidden mx-4 mt-24">
                            <div class=" bg-slate-800/90 rounded-t">   
                                <h1 class =" py-2  font-semibold text-2xl text-white text-center  ">Prizes</h1>
                               
                            </div>
                            
                               <div class="owl-carousel owl-theme">
                                   <!-- ITEM 1 -->
                            <div class="item w-full"><img src="../admin/images/prize/Prize-256.jpg" >
                            <h4 class = " w-full text-center pl-4 bg-slate-800/90 text-white text-xl py-4 font-semibold rounded-b">100 Pesos</h4>
                                <div class=" flex justify-center gap-2 mt-5 drop-shadow-xl">
                                <a href="../AdminTailWind/updateprize.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Upd/Add</button></a>
                                    <a href=""><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Delete</button></a>
                             
                                </div>
                            </div>
                           
                                       <!-- ITEM 2 -->
                            <div class="item w-full"><img src="../admin/images/prize/Prize-698.png" ><h4 class = " w-full text-center pl-4 bg-slate-800/90 text-white text-xl py-4 font-semibold rounded-b">200 Pesos</h4>
                                <div class=" flex justify-center gap-2 mt-5 drop-shadow-xl">
                                <a href="../AdminTailWind/updateprize.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Upd/Add</button></a>
                                    <a href=""><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Delete</button></a>
                             
                                </div>
                            </div>
                                     
                                       <!-- ITEM 3 -->
                            <div class="item w-full"><img src="../admin/images/prize/Prize-226.jpg" ><h4 class = " w-full text-center pl-4 bg-slate-800/90 text-white text-xl py-4 font-semibold rounded-b">500 Pesos</h4>
                                <div class=" flex justify-center gap-2 mt-5 drop-shadow-xl">
                            
                                    <a href="../AdminTailWind/updateprize.php"><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Upd/Add</button></a>
                                    <a href=""><button type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-8 py-2.5 text-center mr-2 mb-2">Delete</button></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                                
                
    
                </div>
   
     
       
       
        </main>
    </section>




     <!-- OWL JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MY SCRIPT -->
    <script src="../AdminJs/NewsPrizes.js"></script>
    <!-- flowbiet JS -->
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>


</body> 
</html> 