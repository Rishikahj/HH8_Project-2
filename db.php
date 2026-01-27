<?php
$host = "localhost";
$user = "root";
$password = "root";   // VERY IMPORTANT
$database = "ctf_platform";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>


