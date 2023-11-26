<?php 
require_once('includes/dbh-inc.php');
session_start();








?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style/style.css">
    <title>Take your role</title>
</head>

<body class="flex flex-col min-h-screen">
    <nav>
        <div class="header bg-lime-700 flex justify-between">
            <div class="logo">
                <img class="h-16 mx-8" src="./images/opep-high-resolution-logo.png" alt="Logo">
            </div>
            <div class="register-link px-8  ">
                <ul class="flex ">
                    <li class="bg-white text-lime-700 px-16 cursor-pointer">Catalog </li>
                    <li class="  px-16 cursor-pointer"><a href=""><img class="h-8 " src="./images/icons8.png" alt=""></a></li>
                </ul>
            </div>
        </div>
    </nav>



    <section class="grid grid-cols-4">
        <?php
        $query = "SELECT * FROM plant";
        $exec = mysqli_query($con,$query);
        
        
        
        
        ?>
        <div class="flex min-h-screen items-center justify-center">
            <div class=" px-5">
                <div class="max-w-xs cursor-pointer rounded-lg bg-lime-700 p-2 shadow duration-150 hover:scale-105 hover:shadow-md">
                    <img class="w-full h-64 rounded-lg object-cover object-center" src="./images/1.jpg" alt="product" />
                    <div>
                        <div class="my-6 flex items-center justify-between px-4">
                            <p class="font-bold text-white">Product Name</p>
                            <p class="rounded-full bg-lime-400 px-2 py-0.5 text-xs font-semibold text-white">$120</p>
                        </div>
                        <div class="my-4 flex items-center justify-between px-4">
                            <p class="text-sm font-semibold text-white">First option</p>
                            <p class="rounded-full bg-lime-900 px-2 py-0.5 text-xs font-semibold text-white">23</p>
                        </div>
                        <div class="my-4 flex items-center justify-between px-4">
                            <p class="text-sm font-semibold text-white">Second option</p>
                            <p class="rounded-full bg-lime-900 px-2 py-0.5 text-xs font-semibold text-white">7</p>
                        </div>
                        <div class="my-4 flex items-center justify-between px-4">
                            <p class="text-sm font-semibold text-white">Third option</p>
                            <p class="rounded-full bg-lime-900 px-2 py-0.5 text-xs font-semibold text-white">1</p>
                        </div>
                        <div class="my-4 flex items-center justify-between px-4">
                            <p class="text-sm font-semibold text-white">Fourth option</p>
                            <p class="rounded-full bg-lime-900 px-2 py-0.5 text-xs font-semibold text-white">23</p>
                        </div>
                    </div>
                </div>
            </div>
            
                    
        </div>

        

    </section>

    <footer class="bg-lime-700 h-16 text-center p-4 w-full ">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
</body>

</html>