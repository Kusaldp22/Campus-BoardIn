<?php
require "./db.inc.php";
require "./functions.inc.php";

if (isset($_POST["ll_register"]))
{
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $nic = $_POST["nic"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address_l1 = $_POST["address_l1"];
    $address_l2 = $_POST["address_l2"];
    $password_1= $_POST["password_1"];
    $password_2 = $_POST["password_2"];

    $data = [$first_name, $last_name, $gender, $nic, $email, $phone ,$address_l1, $address_l2, $password_1 ,$password_2];

    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../landlord_register.php?err=Fill all required details");
            exit();
        }
    }
    if ($password_1 != $password_2) {
        header("Location: ../landlord_register.php?err=Password did not matched!");
        exit();
    }
    
    if (land_loard_register($conn, $data)) {
        header("Location: ../landlord_register.php?ok=Landlord Registered Successfully");
        exit();
    }
    else {
        header("Location: ../landlord_register.php?err=Database insert error. Please contact us for support");
        exit();
      }  
}
?>