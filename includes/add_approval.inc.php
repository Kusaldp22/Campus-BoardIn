<?php
session_start();
require "./db.inc.php";
require "./functions.inc.php";

if (isset($_SESSION["role"]) && $_SESSION["role"] == "warden" && isset($_POST["approval"])) {

    $landlord = $_POST["landlord"];
    $aid = $_POST["aid"];
    $status = $_POST["status"];
    
    $data = [$landlord, $aid, $status];
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../verify.php?err=Please refresh your page and try again. Or contact us.");
            exit();
        }
    }
    if (add_landlord_permission($conn, $data)) {
        header("Location: ../verify.php?ok=Status Changed Successfully to $status");
        exit();
    }
    else {
        header("Location: ../verify.php?err=Database insert error. Please contact us for support");
        exit();
    }  
    
}
else {
    header("Location: ../index.php");
    exit();
}