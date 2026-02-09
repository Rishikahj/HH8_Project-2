<?php
$host = "localhost";
$user = "root";
$password = "";   // KEEP EMPTY for XAMPP
$database = "ctf_platform";
$port = 3307;     // VERY IMPORTANT

$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>





