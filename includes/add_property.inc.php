<?php
require "./db.inc.php";
require "./functions.inc.php";
session_start();

if (isset($_POST["add_property"]) && $_SESSION["role"] == "landlord") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $facilities = $_POST["facilities"];
    $price = $_POST["price"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address_l1 = $_POST["address_l1"];
    $address_l2 = $_POST["address_l2"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];
    $status = $_POST["status"];
    $landlord = $_SESSION["landlord"]["uid"];
    
    if(!isset($_FILES['photos'])) {
        header("Location: ../new.php?err=Please add at least one photo");
        exit();
    }
    
    $uploadedFiles = $_FILES['photos'];
    $uploadFolder = "../img/";
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    $image_list = [];
    foreach($uploadedFiles['tmp_name'] as $key => $tmpName){
        $fileName = $uploadedFiles['name'][$key];
        $fileSize = $uploadedFiles['size'][$key];
        $fileType = $uploadedFiles['type'][$key];
        $fileTmpName = $uploadedFiles['tmp_name'][$key];

        // Check file size
        if($fileSize > $maxFileSize){
            header("Location: ../new.php?err=Maximum file size is 5MB");
            exit();
        }
        
        // Check file type
        $validTypes = ['image/jpeg', 'image/png'];
        if(!in_array($fileType, $validTypes)){
            header("Location: ../new.php?err=Only valid jpg, png, jpeg file types");
            exit();
        }
        $uniqueFileName = uniqid() . '_' . $fileName;
        $image_list[] = $uniqueFileName;
        $targetFilePath = $uploadFolder . $uniqueFileName;

        move_uploaded_file($fileTmpName, $targetFilePath);
    
    }

    
    $data_ = [$title, $description, $facilities, $price, $gender, $phone, $address_l1, $address_l2, $status];
    $data = [$title, $description, $facilities, $price, $gender, $phone, $address_l1, $address_l2, $lat, $lon, $status];
    for ($i = 0; $i < count($data_); $i++) {
        if ($data_[$i] == "") {
            header("Location: ../new.php?err=Fill all required details");
            exit();
        }
    }
    if ($lat == "" || $lon == "") {
        header("Location: ../new.php?err=Please select your location via map");
        exit();
    }
    if (add_advertise($conn, $data, $landlord, $image_list)) {
        header("Location: ../new.php?ok=Advertise Added Successfully");
        exit();
    }
    else {
        header("Location: ../new.php?err=Database insert error. Please contact us for support");
        exit();
      }  

}
else {
    header("Location: ../index.php");
}