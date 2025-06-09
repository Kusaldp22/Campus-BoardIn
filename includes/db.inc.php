<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "map";


$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Connection faild: " . mysqli_connect_error());
} else {
    // echo "It's working!";
}