<?php
require_once('includes/dbh-inc.php');

?>
<?php

if (isset($_POST["button"])) {
    $prenom = $_POST["first_name"];
    $nom = $_POST['family_name'];
    $email = $_POST["email"];
    $passwd1 = $_POST["passwd1"];
    $passwd2 = $_POST["passwd2"];

    if ($passwd1 == $passwd2) {

        // Preparing the statement
        $query = "INSERT INTO users (user_id, nom, prenom, email, psswd, role_id) VALUES (null, ?, ?, ?, ?, null)";
        $stmt = mysqli_prepare($con, $query);
        //binding parameters
        mysqli_stmt_bind_param($stmt, "ssss", $nom, $prenom, $email, $passwd2);
        //Executing the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "";
            //start session

            $sql = "SELECT LAST_INSERT_ID()";
            $req = mysqli_query($con, $sql);
            $row = mysqli_fetch_row($req);
            session_start();
            $_SESSION['id'] = $row['0'];

            //page redirection
            header("location: roles.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {

        $err =  'dont match';
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

<body>
    <form action="" method="post">
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
        <div class="form-container flex flex-col items-center justify-center gap-3 ">
            <div class="w-1/4 h-1/4 ">
                <img class="" src="./images/opep-high-resolution-logo.png" alt="pic">
            </div>
            <div class="title">
                <span class="">Create your account</span>
            </div>
            <div class="input-field py-2">

                <input name="first_name" required placeholder="Name" type="text" id="name" class="border-2 shadow-lg ">
            </div>
            <div class="input-field py-2">

                <input name="family_name" required placeholder="Family name" type="text" id="familyName" class="border-2 shadow-lg">
            </div>
            <div class="input-field py-2">
                <input name="email" placeholder="E-mail" type="email" id="email" class="border-2 shadow-lg">
            </div>
            <div class="input-field py-2">

                <input name="passwd1" required placeholder="password" type="password" id="password" class="border-2 shadow-lg">
            </div>
            <div class="input-field py-2">

                <input name="passwd2" placeholder="Confirm password" type="password" id="confirmPassword" class="border-2 shadow-lg">
                <p id="incorrect" class="text-red-400 text-sm text-center"><?php echo @$err; ?></p>
            </div>
            <div class="submit-button">
                <button name="button" required type="submit" class="bg-lime-700 px-4 text-white">Next</button>
            </div>

            <div class="text-center mb-4">
                <span class="">Already have an account? <a class="text-blue-400 border-bo" href="#">Log in</a></span>
            </div>

        </div>

    </form>
    <footer class="bg-lime-700 h-16 text-center p-4">
        <span class="text-center text-white">© 2023 O'PEP. All rights reserved.</span>
    </footer>
</body>

</html>