<?php
require "./db.inc.php";
require "./functions.inc.php";
session_start();

if (isset($_POST["add_article"]) && $_SESSION["role"] == "master") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    
    if(!isset($_FILES['photo'])) {
        header("Location: ../new.php?err=Please add one photo");
        exit();
    }
    $fileName = $_FILES["photo"]['name'];
    $fileTmpName = $_FILES["photo"]['tmp_name'];

    $uniqueFileName = uniqid() . '_' . $fileName;
    $uploadFolder = "../img/";
    $targetFilePath = $uploadFolder . $uniqueFileName;
    move_uploaded_file($fileTmpName, $targetFilePath);
   


    $data = [$title, $description];
    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i] == "") {
            header("Location: ../add_article.php?err=Fill all required details");
            exit();
        }
    }
    if (add_article($conn, $title, $description, $uniqueFileName)) {
        header("Location: ../add_article.php?ok=Article Added Successfully");
        exit();
    }
    else {
        header("Location: ../add_article.php?err=Database insert error. Please contact us for support");
        exit();
    }  
    
}

else {
header("Location: ../index.php");
}


    ?>