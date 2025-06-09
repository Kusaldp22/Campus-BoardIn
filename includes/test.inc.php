<?php

$json_path = "../config/credentials.json";
require "../db.php";
require "./functions.inc.php";

 
$info = get_UID();
echo "data: " . $info;


include_once "../site_parts/getters.php";
echo required_star();