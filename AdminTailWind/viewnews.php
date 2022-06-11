<?php
include('connections/connection.php');
include('includes/afterlogin.php');
include('actions.php');

?>
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
                        <a href="../AdminTailWind/dashboard.php"><i class="fa-solid  fa-house  text-2xl mt-10 text-slate-600 hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/waste.php"><i class="fa-solid   fa-wine-bottle text-2xl mt-10  text-slate-600   hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/NewsPrizes.php"><i class="fa-solid  px-3 py-2 bg-slate-800 text-white rounded fa-money-bill text-2xl mt-10   "></i></a>
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
                <h1 class = "text-xl font-bold flex-1 text-slate-600">News</h1>
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
        <div class="content-wrapper overflow-auto mt-5 mx-5">
            <!-- NEWS IMAGE -->
            <div class="newsImage mx-auto flex justify-center">
            <img src="../admin/images/news/News-619.png">
            </div>

            <!-- TITLE -->
            <h1 class = "text-center mt-5 font-bold text-4xl text-slate-800">News Title</h1>
            <h1  class = "text-center mt-2 font-bold text-xl text-slate-600">News SubTitle</h1>

            <!-- CONTENT -->
            <div class="flex flex-wrap mt-3 text-slate-800 md:mx-10 sm:mx-auto justify-center items-center text-center text-justify">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique earum ipsam a accusantium. Dolor, iste! Iure fugit, accusantium quae molestias, adipisci, minus labore ratione voluptatem praesentium impedit sed eveniet assumenda. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum minus labore atque, perferendis praesentium qui non nesciunt? Esse, itaque quia voluptatum tempora, eos assumenda, inventore dolorum praesentium illo rerum possimus!</p>
               
            </div>
           
        </div>


      

    <!-- OWL JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MY SCRIPT -->
    <script src="../AdminJs/admin.js"></script>
    <!-- flowbiet JS -->
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</body> 
</html> 