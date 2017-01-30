<?php
$servername = "localhost";
$username = "amin";
$password = "aft";
$dbname = "dmkm";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Database Status : Connected";
?>
