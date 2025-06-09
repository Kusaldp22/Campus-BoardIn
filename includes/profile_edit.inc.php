<?php
require "./db.inc.php";
require "./functions.inc.php";
session_start();

if (isset($_POST["edit_student"]) && isset($_SESSION["role"]))
{
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $sid = $_SESSION["student"]["sid"];
    $batch = $_POST["batch"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address_l1 = $_POST["address_l1"];
    $address_l2 = $_POST["address_l2"];
    

    $data = [$first_name, $last_name, $gender, $sid, $batch, $email, $phone ,$address_l1, $address_l2];

    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../profile.php?err=Fill all required details");
            exit();
        }
    }
    if (student_update($conn, $data)) {
        header("Location: ../profile.php?ok=Student Updated Successfully");
        exit();
    }
    else {
        header("Location: ../profile.php?err=Database insert error. Please contact us for support");
        exit();
    }
}
else if (isset($_POST["edit_landlord"]) && isset($_SESSION["role"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $nic = $_POST["nic"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address_l1 = $_POST["address_l1"];
    $address_l2 = $_POST["address_l2"];

    $data = [$first_name, $last_name, $gender, $nic, $email, $phone ,$address_l1, $address_l2];
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../profile.php?err=Fill all required details");
            exit();
        }
    }
    if (landlord_update($conn, $data)) {
        header("Location: ../profile.php?ok=Landlord Updated Successfully");
        exit();
    }
    else {
        header("Location: ../profile.php?err=Database insert error. Please contact us for support");
        exit();
    }
}