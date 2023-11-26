<?php
$servername = "localhost";
$dbname = "plants_db";
$username = "root";
$password = "P@" . "$" . "$" . "w0rd";


$con = mysqli_connect($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Failed to connect!" . $con->connect_error);
} else {
    //echo "connection established succesfully ";
};
