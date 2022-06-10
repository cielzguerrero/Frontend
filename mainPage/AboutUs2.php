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
    <title>About Us</title>
    <!-- TAILWIND -->
    <link rel="stylesheet" href="../dist/output.css ">
    <!-- FLOWBITE -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
    <!-- MY CSS -->
    <link rel="stylesheet" href="../css/AboutUs.css">
</head>
<body class = "">
<nav class="bg-white border-gray-200 px-2 shadow-xl dark:shadow-xl sm:px-4 py-4  dark:bg-slate-800">
    <div class="container flex flex-wrap justify-between items-center mx-auto">

        <!-- LOGO -->
        <a href="#!" class="flex items-center">
            <img src="../img/glogoblue.png" class="mr-3 h-8 sm:h-9 " alt="Flowbite Logo" />
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
                <a href="OurTeam2.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-whiate dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Our Team</a>
            </li>
        
            <li>
                <a href="ContactUs2.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
            </li>
         
            </ul>
        </div>


      
    </nav>

    <!-- CONTENT -->
    <div class="content pt-20">
        <div class="content-wrapper  flex sm:flex-wrap sm-flex-wrap justify-between gap-3  items-center">
        <div class="text">
        <h1 class = "text-4xl font-extrabold text-center">ABOUT US</h1>
        <p class = "">G-Reward Is made by a group of students in Polytechnic University Of The Philippines - San Pedro Campus. We believe that we can motivate people to throw their garbage in a proper way and earning Cash or Prize in exchange. Our mission is to help the community in terms of cleanliness. It also helps the local government to earn funds for their future projects. We're excited and striving for a change in the environment of the community.</p>
        </div>

        <img src="../img/About us page.gif">
    
        </div>

    
    </div>
    

</body>
</html>