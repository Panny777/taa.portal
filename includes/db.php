<?php
$server   = "localhost";  // Change this to correspond with your database port
$username   = "root";      // Change if use webhost online
$password   = "";
$DB     = "entervo-portal";      // database name

$connection = mysqli_connect($server, $username, $password, $DB);

if(!$connection) {
        die("Database conection failed!");
}
?>

