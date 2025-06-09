<?php
session_start();
require "./db.inc.php";
require "./functions.inc.php";

// Student booking
if (isset($_POST["book_now"]) && isset($_SESSION["student"])) {
    
    $landlord = $_POST["landlord"];
    $aid = $_POST["aid"];
    $sid = $_POST["sid"];
    $status = $_POST["status"];
    
    $data = [$landlord, $aid, $sid, $status];
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../dashboard.php?err=Please refresh your page and try again. Or contact us.");
            exit();
        }
    }
    if (add_request($conn, $data)) {
        header("Location: ../dashboard.php?ok=Booking Added Successfully");
        exit();
    }
    else {
        header("Location: ../dashboard.php?err=Database insert error. Please contact us for support");
        exit();
    }  
    
}
// Landlord reject
if (isset($_POST["book_reject"]) && isset($_SESSION["landlord"])) {
    $landlord = $_POST["landlord"];
    $aid = $_POST["aid"];
    $sid = $_POST["sid"];
    $status = $_POST["status"];
    
    $data = [$landlord, $aid, $sid, $status];
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../bookings.php?err=Please refresh your page and try again. Or contact us.");
            exit();
        }
    }
    if (edit_request($conn, $data)) {
        header("Location: ../bookings.php?ok=Booking Rejected Successfully");
        exit();
    }
    else {
        header("Location: ../bookings.php?err=Database insert error. Please contact us for support");
        exit();
    }  
}

if (isset($_POST["book_approve"]) && isset($_SESSION["landlord"])) {
    $landlord = $_POST["landlord"];
    $aid = $_POST["aid"];
    $sid = $_POST["sid"];
    $status = $_POST["status"];
    
    $data = [$landlord, $aid, $sid, $status];
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../bookings.php?err=Please refresh your page and try again. Or contact us.");
            exit();
        }
    }
    if (edit_request($conn, $data)) {
        header("Location: ../bookings.php?ok=Booking Approved Successfully");
        exit();
    }
    else {
        header("Location: ../bookings.php?err=Database insert error. Please contact us for support");
        exit();
    }  
}

else {
    header("Location: ../index.php");
    exit();
}