<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- MY CSS -->
 
    <link rel="stylesheet" href="../AdminCss/profile.css">
    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <!-- FLOWBITE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />


 
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
                        <a href="../AdminTailWind/dashboard.php"><i class="fa-solid  fa-house  text-2xl mt-10 text-slate-600 hover:to-blue-600  "></i></a>
                        <a href="../AdminTailWind/waste.php"><i class="fa-solid fa-wine-bottle text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="../AdminTailWind/NewsPrizes.php"><i class="fa-solid fa-money-bill text-2xl mt-10 text-slate-600  hover:text-blue-600"></i></a>
                        <a href="#!"><i class="fa-solid fa-user px-3 py-2 bg-slate-800 rounded  text-2xl mt-10 text-white  "></i></a>
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
                <h1 class = "text-xl font-bold flex-1 text-slate-600">Members</h1>
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
        <div class="content-wrapper   mt-10 mx-2">
            <div class="w-full flex justify-around bg-slate-800/90 px-4 py-2 items-center">
            <h1 class=" text-slate-100  font-bold text-xl  w-full ">Members</h1>
            <!-- SEARCH  -->
            <input type="text" class = "h-6 w-36 rounded ">
          
            
            </div>
           
                <!-- MEMBER TABLE -->
         
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-1">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <!-- THEAD -->
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Profile
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date Created
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 flex justify-center whitespace-nowrap">
                                   <img src="../img/aldrin.jpg">
                                </th>
                                <td class="px-6 py-4">
                                   AldrinXD
                                </td>
                                <td class="px-6 py-4">
                                2021-12-21
                                </td>
                                <td class="px-6 py-4">
                                james@gmail.com
                                </td>
                                <td class="px-6 py-4 flex justify-around gap-2 items-center">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Del</a>
                                </td>
                            </tr>
                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 flex justify-center whitespace-nowrap">
                                   <img src="../img/aldrin.jpg">
                                </th>
                                <td class="px-6 py-4">
                                   AldrinXD
                                </td>
                                <td class="px-6 py-4">
                                2021-12-21
                                </td>
                                <td class="px-6 py-4">
                                james@gmail.com
                                </td>
                                <td class="px-6 py-4 flex justify-around gap-2 items-center">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Del</a>
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 flex justify-center whitespace-nowrap">
                                   <img src="../img/aldrin.jpg">
                                </th>
                                <td class="px-6 py-4">
                                   AldrinXD
                                </td>
                                <td class="px-6 py-4">
                                2021-12-21
                                </td>
                                <td class="px-6 py-4">
                                james@gmail.com
                                </td>
                                <td class="px-6 py-4 flex justify-around gap-2 items-center">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Del</a>
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 flex justify-center whitespace-nowrap">
                                   <img src="../img/aldrin.jpg">
                                </th>
                                <td class="px-6 py-4">
                                   AldrinXD
                                </td>
                                <td class="px-6 py-4">
                                2021-12-21
                                </td>
                                <td class="px-6 py-4">
                                james@gmail.com
                                </td>
                                <td class="px-6 py-4 flex justify-around gap-2 items-center">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Del</a>
                                </td>
                            </tr>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 flex justify-center whitespace-nowrap">
                                   <img src="../img/aldrin.jpg">
                                </th>
                                <td class="px-6 py-4">
                                   AldrinXD
                                </td>
                                <td class="px-6 py-4">
                                2021-12-21
                                </td>
                                <td class="px-6 py-4">
                                james@gmail.com
                                </td>
                                <td class="px-6 py-4 flex justify-around gap-2 items-center">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Update</a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Del</a>
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>

        </div>
                                
         
       
       
        </main>
    </section>


         
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MY SCRIPT -->
    <script src="../AdminJs/admin.js"></script>
    <!-- flowbiet JS -->
    
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</body> 
</html> 