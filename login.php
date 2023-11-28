<?php
require_once('includes/dbh-inc.php');
if (isset($_POST['button'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['passwd1']);

    $query = "SELECT * FROM users WHERE email = '$email' AND psswd = '$pass'";
    $do = mysqli_query($con, $query);

    if (!$do) {
        die("Query failed: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($do);

    if (!$row) {
        echo "<script>alert('Email or password incorrect!')</script>";
    } else {
        session_start();
        $_SESSION['id'] = $row['user_id'];

        if ($row['role'] == 2) {
            header("location: client.php");
        } elseif ($row['role'] == 1) {
            header("location: admin.php");
        } else {
            header("location: roles.php");
        }
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./style/style.css">
    <title>Sign up</title>
</head>

<body class="relative h-screen">
    <form action="" method="post">
        <div class="header bg-lime-700 flex justify-between">
            <div class="logo">
                <img class="h-16 mx-8" src="./images/opep-high-resolution-logo.png" alt="Logo">
            </div>
            <div class="register-link px-8  ">
                <ul class="flex ">
                    <li class="bg-white text-lime-700 px-16 cursor-pointer "><a href="login.php">Log In</a> </li>
                    <li class="text-white px-16 cursor-pointer"><a href="index.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
        <div class="form-container flex flex-col items-center justify-center gap-3 ">
            <div class="w-1/4 h-1/4 ">
                <img class="" src="./images/opep-high-resolution-logo.png" alt="pic">
            </div>
            <div class="title">
                <span class="">Login</span>
            </div>

            <div class="input-field py-2">
                <input name="email" placeholder="E-mail" type="email" id="email" class="border-2 shadow-lg">
            </div>
            <div class="input-field py-2">

                <input name="passwd1" placeholder="password" type="password" id="password" class="border-2 shadow-lg">
            </div>

            <div class="submit-button">
                <button name="button" type="submit" class="bg-lime-700 px-4 text-white">Next</button>
            </div>



        </div>

    </form>
    <footer class="bg-lime-700 absolute bottom-0 w-screen	  h-16 text-center p-4">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
</body>

</html>