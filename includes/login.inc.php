<?php
$json_path = "../config/credentials.json";
require "./db.inc.php";
require "./functions.inc.php";

$username = $_POST["username"];
$password = $_POST["password"];

if (isset($_POST["user_login"])) {
    check_login($conn, $username, $password); 
}
else if (isset($_POST["ll_login"])) {
    check_land_loard_login($conn, $username, $password);
}