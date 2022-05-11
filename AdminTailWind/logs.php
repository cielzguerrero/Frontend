<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs</title>

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
                        <a href="../AdminTailWind/members.php"><i class="fa-solid fa-user text-2xl mt-10 text-slate-600  hover:text-blue-600" ></i></a>
                        <a href="#!"><i class="fa-solid fa-paperclip px-3 py-2 bg-slate-800 rounded   text-2xl mt-10 text-white"></i></a>
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
                <h1 class = "text-xl font-bold flex-1 text-slate-600">Logs and Transactions</h1>
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
           
           
    <!-- LOGS TABLE -->
	<!--Container-->
	<div class="container w-4/5 mx-auto px-2">
                <!--Title-->
                <h1 class="text-center font-sans font-bold break-normal text-blue-500 px-2 py-8 text-xl md:text-2xl">
                  Logs
                </h1>
                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-slate-300">
                    <table id="example" class="stripe hover text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr class = "text-slate-600">
                                <th data-priority="1">User</th>
                                <th data-priority="2">Activity</th>
                                <th data-priority="3">Date Started</th>
                                <th data-priority="4">Elapse Time</th>
                                <th data-priority="5">Actions|| <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del all</button></th>
                            </tr>
                        </thead>
                        <tbody class = "text-slate-600">
                            <tr>
                       
                                <td>Johannes</td>
                                <td>Bojji Kage : Gained 3 points</td>
                                <td>2022-04-29 04:56:28</td>
                                <td>2 weeks ago</td>
                           
                                <td class = "flex justify-center mt-5">
                                    <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del</button>
                         
                            </td>
                            </tr>

                       

                            <tr>
                               
                                <td>Johannes</td>
                                <td>Bojji Kage : Gained 3 points</td>
                                <td>2022-04-29 04:56:28</td>
                                <td>2 weeks ago</td>
                           
                                <td class = "flex justify-center mt-5">
                                    <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del</button>
                                 
                            </td>
                            </tr>

                            <tr>
                               
                                <td>Johannes</td>
                                <td>Bojji Kage : Gained 3 points</td>
                                <td>2022-04-29 04:56:28</td>
                                <td>2 weeks ago</td>
                           
                                <td class = "flex justify-center mt-5">
                                    <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del</button>
                         
                            </td>
                            </tr>

                            

                            
                        </tbody>

                    </table>


                </div>
                <!--/Card-->
                </div>
                <!--/container-->




                           
    <!-- USER TRANSACTION TABLE -->
	<!--Container-->
	<div class="container w-4/5 mx-auto px-2 mt-10">
                <!--Title-->
                <h1 class="text-center font-sans font-bold break-normal text-blue-500 px-2 py-8 text-xl md:text-2xl">
                  User Transaction
                </h1>
                <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded-lg shadow bg-slate-300">
                    <table id="example2" class="stripe hover text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr class = "text-slate-600">
                                <th data-priority="1">User</th>
                                <th data-priority="2">Activity</th>
                                <th data-priority="3">Date of Transaction</th>
                                <th data-priority="4">Reference Number</th>
                                <th data-priority="5">Actions|| <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del all</button></th>
                            </tr>
                        </thead>
                        <tbody class = "text-slate-600">
                            <tr>
                       
                                <td>Johannes</td>
                                <td>Claimed 200 Pesos</td>
                                <td>2022-04-29 04:56:28</td>
                                <td>70a32110fff0f26d301e58ebbca9cb9f</td>
                           
                                <td class = "flex justify-center mt-5">
                                    <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del</button>
                         
                            </td>
                            </tr>

                       

                            <tr>
                               
                                <td>Johannes</td>
                                <td>Claimed 200 Pesos</td>
                                <td>2022-04-29 04:56:28</td>
                                <td>70a32110fff0f26d301e58ebbca9cb9f</td>
                           
                                <td class = "flex justify-center mt-5">
                                    <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del</button>
                                 
                            </td>
                            </tr>

                            <tr>
                               
                                <td>Johannes</td>
                                <td>Claimed 200 Pesos</td>
                                <td>2022-04-29 04:56:28</td>
                                <td>70a32110fff0f26d301e58ebbca9cb9f</td>
                           
                                <td class = "flex justify-center mt-5">
                                    <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Del</button>
                         
                            </td>
                            </tr>

                            

                            
                        </tbody>

                    </table>


                </div>
                <!--/Card-->
                </div>
                <!--/container-->






        </div>
                                
         
       
       
        </main>
    </section>



<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- MY SCRIPT -->
<script src="../AdminJs/admin.js"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#example').DataTable({
                responsive: true,
                "lengthChange": false
            })
            .columns.adjust()
            .responsive.recalc();
    });
    $(document).ready(function() {

var table = $('#example2').DataTable({
        responsive: true,
        "lengthChange": false
    })
    .columns.adjust()
    .responsive.recalc();
});
</script>
</body> 
</html> 