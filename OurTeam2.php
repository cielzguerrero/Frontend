<?php
include ('../connections/connection.php');
if (empty($_SESSION['username'])) {

    header("Location: logout.php");
}
if (!isset($_SESSION['id'])){

    $_SESSION['view'] = "<div class='message warning'>User Not Found.</div>";
    header("Location: ../../Frontend/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <!-- TAILWIND -->
    <link rel="stylesheet" href="./dist/output.css ">
    <!-- FLOWBITE -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
    <!-- MY CSS -->
    <link rel="stylesheet" href="css/OurTeam.css">
    <!-- LINE AWESOME -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body class = "">
    <nav class="bg-white border-gray-200 px-2 shadow-xl dark:shadow-xl sm:px-4 py-4  dark:bg-slate-800">
    <div class="container flex flex-wrap justify-between items-center mx-auto">

        <!-- LOGO -->
        <a href="#!" class="flex items-center">
            <img src="img/glogoblue.png" class="mr-3 h-8 sm:h-9 " alt="Flowbite Logo" />
            <span class="self-center ml-1 text-xl font-semibold whitespace-nowrap text-gray-700 dark:text-white">G-Reward</span>
        </a>


        <!-- MOBILE TOGGLE -->
        <div class="flex items-center md:order-3">
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>

        
                <!-- LINKS -->
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-2" id="mobile-menu-2">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
            <li>
                <a href="MainTailWind.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Back</a>
            </li>
            <li>
                <a href="GettingStarted2.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Getting Started</a>
            </li>
            <li>
                <a href="AboutUs2.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-whiate dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About Us</a>
            </li>
        
            <li>
                <a href="ContactUs2.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
            </li>
         
            </ul>
        </div>

      
    </nav>

    <!-- CONTENT -->
    <div class="content pb-10">
        <div class="content-wrapper">
            

        <div class="box py-12 flex flex-col justify-center items-center">
            <div class="top-circle"></div>
            <img src="img/aldrin.jpg" class="h-20 rounded-full">
            <h2 class = "pt-4 text-lg">Aldrin Ramores</h2>
            <h3 class="text-sm">UI/UX</h3>

            <div class="flex justify-between items-center px-10 py-2">
                <a href="https://www.facebook.com/aldrin.ramores.77"><i class="lab la-facebook-f la-lg"></i></a>
                <a href="https://www.instagram.com/ramoresaldrin/"><i class="lab la-instagram la-lg"></i></a>
                <a href="https://github.com/aldrinnunal"><i class="lab la-github la-lg"></i></a>
            </div>
        </div>

        

        <div class="box py-12 flex flex-col justify-center items-center">
            <div class="top-circle"></div>
            <img src="img/ciel.png" class="h-20 rounded-full">
            <h2 class = "pt-4 text-lg">Cielito Guerrero</h2>
            <h3 class="text-sm">Php Developer</h3>

            <div class="flex justify-between items-center px-10 py-2">
                <a href="https://www.facebook.com/cielits"><i class="lab la-facebook-f la-lg"></i></a>
                <a href=""><i class="lab la-instagram la-lg"></i></a>
                <a href="https://github.com/cielzguerrero"><i class="lab la-github la-lg"></i></a>
            </div>
        </div>

        <div class="box py-12 flex flex-col justify-center items-center">
            <div class="top-circle"></div>
            <img src="img/laz.jpg" class="h-20 rounded-full">
            <h2 class = "pt-4 text-lg">Lazarus Ortega</h2>
            <h3 class="text-sm">Documentation</h3>

            <div class="flex justify-between items-center px-10 py-2">
                <a href="https://www.facebook.com/lazarus.ortega"><i class="lab la-facebook-f la-lg"></i></a>
                <a href=""><i class="lab la-instagram la-lg"></i></a>
                <a href=""><i class="lab la-github la-lg"></i></a>
            </div>
        </div>
        
        <div class="box py-12 flex flex-col justify-center items-center">
            <div class="top-circle"></div>
            <img src="img/faller.png" class="h-20 rounded-full">
            <h2 class = "pt-4 text-lg">Marc Jhon Faller</h2>
            <h3 class="text-sm">QA</h3>

            <div class="flex justify-between items-center px-10 py-2">
                <a href="https://www.facebook.com/Marcjohnfaller"><i class="lab la-facebook-f la-lg"></i></a>
                <a href=""><i class="lab la-instagram la-lg"></i></a>
                <a href=""><i class="lab la-github la-lg"></i></a>
            </div>
        </div>
       
        
    </div>
    

</body>
</html>