<?php
include('connections/connection.php');
include('includes/afterlogin.php');
include('actions.php');

$targetnews = $_GET['ID'];

if (!isset($_GET['ID']))
{
    header("Location: members.php");
}
else
{
    $sql = "SELECT * FROM members WHERE id = $targetnews";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    $pmd = $rows['password'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>

    <!-- MY CSS -->
 
    <link rel="stylesheet" href="../AdminCss/profile.css">
    <!-- TAILWIND CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/9fb78288eb.js" crossorigin="anonymous"></script>
    <!-- FLOWBITE CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

    <!-- DATATABLE -->
    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
 
</head>
<body  class = "bg-slate-800">

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
                <h1 class = "text-xl font-bold flex-1 text-slate-600">Update Members</h1>
                <!-- TIME CLOCK -->
                <i class="fa-solid fa-clock mr-2 text-xl font-bold text-slate-600 lg:block md:hidden sm:hidden xs:hidden clock "></i>
                <h1 class = "text-xl font-bold text-slate-600 lg:block md:hidden sm:hidden xs:hidden clock flex-auto" id = "runningTime">

                </h1>
                <!-- PROFILE NAME --> 
                    <div class="profile-display ">
                    <h1 class = "text-md font-bold text-slate-600 " ><?php echo $afullname;?></h1>
                    <h1 class = "text-sm text-center text-slate-600" ><?php echo $astatus;?></h1>
                    </div>
            </div>

        <!-- CONTENTS -->
        <div class="content-wrapper   mt-10 mx-2">
     
                
            <div class="grid md:grid-cols-1 sm:grid-cols-1 mx-auto mt-20  py-5 px-6 rounded-lg items-center md:w-2/3 sm:w-full gap-10 ">
                <!-- UPDATE PROFILE-->
                <div class="update bg-slate-300 p-8 rounded-lg">
                <div class="currentImage  ">
                    <h1 class="text-center text-slate-200 bg-slate-800 py-1">Current Image</h1>
                    <img src="images/profile/<?php echo $rows['img_name'];?>" >  

                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-2 mt-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $rows['username'];?>" name="uname" required>
                    </div>
                   
                    <div class="mb-2">
                        <label for="text" class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300 ">Profile Name </label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-1" value = "<?php echo $rows['profilename'];?>" name="pname" required>
                    </div>
                    <div class="mb-2">
                        <label for="text" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Full Name</label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-1"  value = "<?php echo $rows['fullname'];?>" name="fname" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-1"  value = "<?php echo $rows['email'];?>" name="email" required>
                    </div>
                    <div class="mb-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo $passwords;?>" name="pass" required>
                    </div>
                    <div class="mb-2">
                        <label for="contact" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Contact</label>
                        <input type="text" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-1"  value = "<?php echo $rows['contact'];?>" name="pcontact" required>
                    </div>
               

                    <div class="mb-2">
                    <label for="address" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Address</label>
                    <div class="mb-3 w-full" id = "address">
                        <select class="form-select appearance-none block w-full p-1 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300 rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="paddress">
                            <option selected>Barangay San Antonio</option>
                            <option value="Barangay Nueva">Barangay Nueva</option>
                            <option value="Barangay San Vicente">Barangay San Vicente</option>
                            <option value="Barangay San Roque">Barangay San Roque</option>
                            <option value="Barangay Landayan">Barangay Landayan</option>
                        </select>
                    </div>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image">
                    </div>
                    
                    <input type="hidden" name="current_image" value="<?php echo $rows['img_name'];?>">
                    <input type="hidden" name="id" value="<?php echo $rows['id'];?>">
                    <button type="submit" class="text-white text-md  bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="editmember">Update Profile</button>
                </form>
                </div>

            <!-- ADD NEW PROFILE-->
                <div class="add bg-slate-300 p-8 rounded-lg">
            
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-2 mt-3">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="uname" required>
                    </div>
                   
                    <div class="mb-2">
                        <label for="text" class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300 ">Profile Name </label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full" value = "" name="pname" required>
                    </div>
                    <div class="mb-2">
                        <label for="text" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Full Name</label>
                        <input type="text" id="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"  value = "" name="fname" required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Email</label>
                        <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"  value = "" name="email" required>
                    </div>
                    <div class="mb-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                            <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="pass" required>
                    </div>
                    <div class="mb-2">
                        <label for="contact" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Contact</label>
                        <input type="text" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full"  value = "" name="pcontact" required>
                    </div>
               

                    <div class="mb-2">
                    <label for="address" class="block mb-1 text-md  font-medium text-gray-900 dark:text-gray-300">Address</label>
                    <div class="mb-3 w-full" id = "address">
                        <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300 rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example" name="paddress">
                            <option selected>Barangay San Antonio</option>
                            <option value="Barangay Nueva">Barangay Nueva</option>
                            <option value="Barangay San Vicente">Barangay San Vicente</option>
                            <option value="Barangay San Roque">Barangay San Roque</option>
                            <option value="Barangay Landayan">Barangay Landayan</option>
                        </select>
                    </div>
                    </div>

                    <div class="mb-4">
                        <label class="block mb-1 text-md font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" name="image">
                    </div>
                    
                    
                    <button type="submit" class="text-white text-md  bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="addmember">Add New Profile</button>
                </form>
                </div>
              
                

              
            </div>

        </div>
                                
         
       
       
        </main>
    </section>



<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- MY SCRIPT -->
<script src="../AdminJs/admin.js"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
    <!-- TIME DISPLAY -->
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