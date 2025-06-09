<?php
// STUDENT FUNCTIONS
function check_student_id($conn, $username) {
    $sql = "SELECT * FROM students WHERE sid = '$username';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}
function student_register($conn, $data) {
    $checking = check_student_id($conn, $data[3]);
    if ($checking) {
        header("Location: ../student_register.php?err=Student ID already exsists");
        exit();
    }
    // $data = [$first_name, $last_name, $gender, $sid, $batch, $email, $phone ,$address_l1, $address_l2, $password_1 ,$password_2];
    $sql = "INSERT INTO students (first_name, last_name, gender, sid, batch, email, phone ,address_l1, address_l2 , password) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function check_student_creds($conn, $username, $password) {
    $sql = "SELECT * FROM students WHERE sid = '$username' AND password = '$password';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function student_update($conn, $data) {

// $data = [$first_name, $last_name, $gender, $sid, $batch, $email, $phone ,$address_l1, $address_l2];
    $sql = "UPDATE students SET first_name = '$data[0]', last_name = '$data[1]', gender = '$data[2]', batch = '$data[4]', email = '$data[5]', phone = '$data[6]', address_l1 = '$data[7]', address_l2 = '$data[8]' WHERE sid = '$data[3]'";
    $sql2 = "SELECT * FROM students WHERE sid = '$data[3]';";
    
    if ($conn->query($sql) === TRUE) {
        $result = $conn->query($sql2)->fetch_assoc();
        $_SESSION["student"] = $result;
        return true;
    } else {
        return false;
    }
}


// LANDLORD FUNCTIONS
function landlord_update($conn, $data) {

// $data = [$first_name, $last_name, $gender, $nic, $email, $phone ,$address_l1, $address_l2];
    $sql = "UPDATE land_loards SET first_name = '$data[0]', last_name = '$data[1]', gender = '$data[2]', email = '$data[4]', phone = '$data[5]', address_l1 = '$data[6]', address_l2 = '$data[7]' WHERE nic = '$data[3]'";
    $sql2 = "SELECT * FROM land_loards WHERE nic = '$data[3]';";
    
    if ($conn->query($sql) === TRUE) {
        $result = $conn->query($sql2)->fetch_assoc();
        $_SESSION["landlord"] = $result;
        return true;
    } else {
        return false;
    }
}
function check_land_loard_usernames($conn, $nic, $email) {
    $sql1 = "SELECT * FROM land_loards WHERE nic = '$nic';";
    $sql2 = "SELECT * FROM land_loards WHERE email = '$email';";
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    if ($result1 && $result1->num_rows > 0) {
        return "nic";
    } 
    else if ($result2 && $result2->num_rows > 0) {
        return "email";
    } 
    else {
        return false;
    }
}

function land_loard_register($conn, $data) {
    // $data = [$first_name, $last_name, $gender, $nic, $email, $phone ,$address_l1, $address_l2, $password_1 ,$password_2];
    $checking = check_land_loard_usernames($conn, $data[3], $data[4]);
    if ($checking) {
        header("Location: ../landlord_register.php?err=This $checking already exsists. Try with different one");
        exit();
    }
    // $data = [$first_name, $last_name, $gender, $nic, $email, $phone ,$address_l1, $address_l2, $password_1 ,$password_2];
    $sql = "INSERT INTO land_loards (first_name, last_name, gender, nic, email, phone ,address_l1, address_l2 , password) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function check_land_loard_creds($conn, $username, $password) {
    $sql1 = "SELECT * FROM land_loards WHERE nic = '$username' AND password = '$password';";
    $sql2 = "SELECT * FROM land_loards WHERE email = '$username' AND password = '$password';";
    
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    
    if ($result1 && $result1->num_rows > 0) {
        return $result1;
    }
    else if ($result2 && $result2->num_rows > 0) {
        return $result2;
    }
    else {
        return false;
    }
}

function check_land_loard_login($conn, $username, $password) {
    $results = check_land_loard_creds($conn, $username, $password);
    if ($results) {
        // Student login successful
        $user_data = $results->fetch_assoc();
        session_start();
        $_SESSION["role"] = "landlord";
        $_SESSION["landlord"] = $user_data;
        header("Location: ../dashboard.php");
        exit();
        
    } else {
        header("Location: ../landlord_login.php?err=Check your username and password");
        exit();
    }
}

// ADVERTISE
function add_advertise($conn, $data, $landlord, $image_list) {
    // $data = [$title, $description, $facilities, $price, $gender, $phone, $address_l1, $address_l2, $lat, $lon, $status];

    $sql = "INSERT INTO advertisements (title, description, facilities, price, gender, phone, address_l1, address_l2, lat, lon, status, landlord) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$landlord')";
    $is_done = false;
    $last = 0;
    if ($conn->query($sql) === TRUE) {
        $is_done = true;
        $last = $conn->insert_id;
    } else {
        $is_done = false;
    }
    
    foreach ($image_list as $image) {
    $sql2 = "INSERT INTO img (ad_id, img_name, landlord) VALUES ('$last', '$image', '$landlord')";
    if ($conn->query($sql2) === TRUE) {
        $is_done = true;
    } else {
        $is_done = false;
    }}    
    
    if ($is_done) {
        return true;
    }
    else{
        return false;
    }
}

function get_images($conn, $landlord, $ad_id) {
    $sql = "SELECT * FROM img WHERE ad_id = '$ad_id' AND landlord = '$landlord';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}


// OTHERS
function check_login($conn, $username, $password) {
    if ($username == "master" && $password == "master123") {
        session_start();
        $_SESSION["role"] = "master";
        header("Location: ../dashboard.php");
        exit();
        
    } else if ($username == "warden" && $password == "warden123") {
        session_start();
        $_SESSION["role"] = "warden";
        header("Location: ../dashboard.php");
        exit();
        
    } else {
        $results = check_student_creds($conn, $username, $password);
        if ($results) {
            // Student login successful
            $user_data = $results->fetch_assoc();
            session_start();
            $_SESSION["role"] = "student";
            $_SESSION["student"] = $user_data;
            header("Location: ../dashboard.php");
            exit();
            
        } else {
            header("Location: ../login.php?err=Check your username and password");
            exit();
        }
    }
}
function checking_landlords() {
    if ($_SESSION["role"] == "landlord") {
    }
    else {
        header("Location: ../dashboard.php");
        exit();
    }
}

function get_landlord_ads($conn ,$user) {
    if ($user != "") {
        $sql = "SELECT * FROM advertisements WHERE landlord = '$user';";
        // $result = mysqli_query($conn, $sql);
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    else {
        $sql = "SELECT * FROM advertisements;";
        // $result = mysqli_query($conn, $sql);
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }

    }
}

function add_request($conn, $data) {
    // $data = [$landlord, $aid, $sid, $status];
    $sql = "INSERT INTO requests (landlord, ad_id, sid, status) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function edit_request($conn, $data) {
    // $data = [$landlord, $aid, $sid, $status];
    $sql = "UPDATE requests SET status='$data[3]' WHERE ad_id = '$data[1]' AND landlord = '$data[0]' AND sid = '$data[2]' AND status = 'Pending';";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function is_student_booked($conn, $sid, $aid) {
    $sql = "SELECT * FROM requests WHERE sid = '$sid' AND ad_id = '$aid'";
    $result = $conn->query($sql);
    $flag = false;
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["status"] == "Pending" || $row["status"] == "Approved") {
                $flag = true;
                break;
            }
            // return false;
    }}
    return $flag;
}

function get_student_requests($conn, $sid) {
    $sql = "SELECT * FROM requests WHERE sid = '$sid';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        // if the user already booked
        return $result;
    } else {
        // if the user not booked yet
        return false;
    }
}
function get_advertisement($conn, $ad_id) {
    $sql = "SELECT * FROM advertisements WHERE aid = '$ad_id';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        // if the user already booked
        return $result;
    } else {
        // if the user not booked yet
        return false;
    }
}
function get_landlord_requests($conn, $landlord) {
    $sql = "SELECT * FROM requests WHERE landlord = '$landlord';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        // if the user already booked
        return $result;
    } else {
        // if the user not booked yet
        return false;
    }
}
function check_landlord_id($conn, $uid) {
    $sql = "SELECT * FROM land_loards WHERE uid = '$uid';";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function add_landlord_permission($conn, $data) {
//  $data = [$landlord, $aid, $status];
    $sql = "UPDATE advertisements SET status='$data[2]' WHERE landlord = '$data[0]' AND aid = '$data[1]';";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function add_article($conn, $title, $description, $photo) {
    $sql = "INSERT INTO articles (title, description, photo) VALUES ('$title', '$description', '$photo');";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function get_posts($conn) {
    $sql = "SELECT * FROM articles ORDER BY date DESC;";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}