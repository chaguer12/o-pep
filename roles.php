<?php
require_once('includes/dbh-inc.php');
session_start();
$id = $_SESSION['id'];


if (isset($_POST['client'])) {
    $query = "UPDATE users SET role_id = 2 WHERE user_id = $id";
    $do = mysqli_query($con, $query);
    header("location: login.php");
}
if (isset($_POST['admin'])) {
    $query = "UPDATE users SET role_id = 1 WHERE user_id = $id";
    $do = mysqli_query($con, $query);
    header("location: login.php");
}


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
                    <li class="text-white px-16 cursor-pointer"><a href="login.php">Log In</a> </li>
                    <li class="bg-white text-lime-700 px-16 cursor-pointer"><a href="index.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="flex-grow">
        <div class="form-container flex flex-col items-center justify-center gap-3 ">
            <form action="" method="post" class="flex flex-col justify-center items-center">
                <div class="w-1/4 h-1/4 ">
                    <img class="" src="./images/opep-high-resolution-logo.png" alt="pic">
                </div>
                <div class="title">
                    <span class="">Take your role</span>
                </div>
                <div class="input-field py-2">
                    <button name="admin" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow-lg w-32">
                        Administrator
                    </button>
                </div>
                <div class="input-field py-2">
                    <button name="client" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow-lg w-32">
                        Client
                    </button>
                </div>
            </form>
        </div>
    </section>

    <footer class="bg-lime-700 h-16 text-center p-4 w-full ">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
</body>

</html>