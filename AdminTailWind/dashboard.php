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
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body  onload="startTime()">

    <section class = "main-wrapper ">


            <nav class = " rounded-md bg-slate-200 fixed" id = "nav">
                <div class="p-5">
                    <div class="flex flex-col justify-center items-center content-center">
                        <!-- SIDEBAR LOGO -->
                        <img src="../img/Glogoblue.png" class ="h-12">
                        <!-- TABS -->
                        <div class="tabs mt-24 flex flex-col  justify-center items-center content-center">
                        <a href=""><i class="fa-solid px-3 py-2 bg-blue-500 rounded  fa-house  text-2xl mt-10 text-white "></i></a>
                        <a href=""><i class="fa-solid fa-trash text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-money-bill text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-user text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-paperclip text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-chart-simple text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href=""><i class="fa-solid fa-right-from-bracket text-2xl mt-48 text-slate-600  hover:text-red-800"></i></a>
                        </div>
            
                </div>
            </nav>


        <!-- CONTENTS WRAPPER -->
        <main class ="bg-slate-200 p-2   overflow-y-auto" id = "contents">
            <!-- HEADER -->
            <div class="header pt-4 pb-3 px-4 flex items-center justify-around drop-shadow-lg rounded-lg">
                <a href="#!" class ="mobileToggler mr-2  lg:hidden md:block " >
                                <span class = ""><h6>yes</h1></span>
                                <span class = ""> </span>
                                <span class = ""> </span>
                        </a>
                <h1 class = "text-xl font-bold flex-1 text-slate-600">Dashboard</h1>
                <!-- TIME CLOCK -->
                <h1 class = "text-xl font-bold text-slate-600 lg:block md:hidden sm:hidden xs:hidden clock flex-auto" id = "clock"></h1>
                <!-- PROFILE NAME -->
                    <div class="profile-display ">
                    <h1 class = "text-md font-bold text-slate-600" >Cielito Guerrero</h1>
                    <h1 class = "text-sm text-center text-slate-600" >Admin</h1>
                    </div>
            </div>

        <!-- CONTENTS -->
             
               
       
       
       
        </main>
    </section>


      

        

    <!-- MY SCRIPT -->
    <script src="../AdminJs/admin.js"></script>
</body> 
</html> 