<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}

$title = "Bookings";
$web_title = "Bookings";

if (!($_SESSION["role"] == "student" || $_SESSION["role"] == "landlord")) {
    header("Location: dashboard.php");
    exit();
}

include_once "site_parts/dash_header.php";
require "./includes/db.inc.php";
require "./includes/functions.inc.php";
require "site_parts/getters.php";
add_alerts();
?>

<?php
if ($_SESSION["role"] == "student") {
?>
<section>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php 
        $res = get_student_requests($conn, $_SESSION["student"]["sid"]);
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $dta = get_advertisement($conn, $row["ad_id"]);
                $dta = $dta->fetch_assoc();
                if ($dta) {
                    
               
                ?>
        <div class="accordion-item" style="border: 2px solid lightgray;">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapse-<?=$row["req_id"] ?>" aria-expanded="false"
                    style="display: flex; justify-content: space-between; width: 100%; align-items:center; position: relative;"
                    aria-controls="panelsStayOpen-collapse-<?=$row["req_id"] ?>">
                    <div style="display: flex; justify-content: space-between; align-items:center;">
                        <?php 
                        if ($row["status"] == "Pending") {
                            ?>
                        <span class="badge text-bg-warning fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        } 
                        else if ($row["status"] == "Approved") {
                            ?>
                        <span class="badge text-bg-success fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        } 
                        else if ($row["status"] == "Rejected") {
                        ?>
                        <span class="badge text-bg-danger fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        }
                        else {
                        ?>
                        <span class="badge text-bg-info fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        }
                        ?>
                        <?=$dta["title"] ?>
                    </div>
                    <p class="m-0" style="position: absolute; right: 60px;">
                        <?=$row["date"] ?>
                    </p>
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-<?=$row["req_id"] ?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="verify-content-body">
                        <div class="verify-content-info">
                            <p><strong>Title:</strong> <?=$dta["title"] ?></p>
                            <p>
                                <strong>Description:</strong> <?=$dta["description"] ?>
                            </p>
                            <p>
                                <strong>Facilities:</strong> <?=$dta["facilities"] ?>
                            </p>
                            <p><strong>Address:</strong> <?=$dta["address_l1"] ?>, <?=$dta["address_l2"] ?></p>
                            <p><strong>Price:</strong> <?=$dta["price"] ?></p>
                            <p><strong>Contact:</strong> <?=$dta["phone"] ?></p>
                            <p><strong>Status:</strong> <?=$row["status"] ?></p>
                        </div>
                    </div>
                    <!-- <div class="g-map" id="map-<?=$row["req_id"] ?>"></div> -->
                    <div class="image-container">
                        <?php 
                            $img_res = get_images($conn, $dta["landlord"], $dta["aid"]);
                            if ($img_res && $img_res->num_rows > 0) {
                                while ($img = $img_res->fetch_assoc()) {
                                   ?>

                        <img src="./img/<?=$img["img_name"] ?>" class="img-fluid mx-2" alt="...">

                        <?php
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
        } }
        else {?>
        <p>No records found.</p>
        <?php
        }
        ?>
    </div>
</section>
<?php
} else if ($_SESSION["role"] == "landlord") {
?>

<section>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php 
        $res = get_landlord_requests($conn, $_SESSION["landlord"]["uid"]);
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $dta = get_advertisement($conn, $row["ad_id"]);
                $dta = $dta->fetch_assoc();
                if ($dta) {
                    
               
                ?>
        <div class="accordion-item" style="border: 2px solid lightgray;">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapse-<?=$row["req_id"] ?>" aria-expanded="false"
                    style="display: flex; justify-content: space-between; width: 100%; align-items:center; position: relative;"
                    aria-controls="panelsStayOpen-collapse-<?=$row["req_id"] ?>">
                    <div style="display: flex; justify-content: space-between; align-items:center;">
                        <?php 
                        if ($row["status"] == "Pending") {
                            ?>
                        <span class="badge text-bg-warning fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        } 
                        else if ($row["status"] == "Approved") {
                            ?>
                        <span class="badge text-bg-success fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        } 
                        else if ($row["status"] == "Rejected") {
                        ?>
                        <span class="badge text-bg-danger fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        }
                        else {
                        ?>
                        <span class="badge text-bg-info fix-badge me-3"><?=$row["status"] ?></span>
                        <?php
                        }
                        ?>
                        <?=$dta["title"] ?>
                    </div>
                    <p class="m-0" style="position: absolute; right: 60px;">
                        <?=$row["date"] ?>
                    </p>
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-<?=$row["req_id"] ?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="verify-content-body">
                        <div class="verify-content-info">
                            <div class="alert alert-primary" role="alert">
                                <?php
                                $id = check_student_id($conn, $row["sid"]);
                                $id = $id->fetch_assoc();
                                ?>
                                <h5>Student Request</h5>
                                <p class="m-0"><strong>Student Name:</strong> <?=$id["first_name"] ?>
                                    <?=$id["last_name"] ?></p>
                                <p class="mb-4"><strong>Contact:</strong> <?=$dta["phone"] ?></p>
                                <?php
                                if ($row["status"] == "Pending") {
                                ?>
                                <div class="booking-btn-align d-flex">
                                    <form action="./includes/add_request.inc.php" method="POST">
                                        <input type="text" hidden value="<?=$dta["landlord"] ?>" name="landlord">
                                        <input type="text" hidden value="<?=$dta["aid"] ?>" name="aid">
                                        <input type="text" hidden value="<?=$row["sid"] ?>" name="sid">
                                        <input type="text" hidden value="Approved" name="status">
                                        <button type="submit" class="btn btn-success"
                                            name="book_approve">Approve</button>
                                    </form>
                                    <form action="./includes/add_request.inc.php" method="POST">
                                        <input type="text" hidden value="<?=$dta["landlord"] ?>" name="landlord">
                                        <input type="text" hidden value="<?=$dta["aid"] ?>" name="aid">
                                        <input type="text" hidden value="<?=$row["sid"] ?>" name="sid">
                                        <input type="text" hidden value="Rejected" name="status">
                                        <button type="submit" class="btn btn-danger mx-2"
                                            name="book_reject">Reject</button>
                                    </form>
                                </div>
                                <?php 
                                }
                                ?>

                            </div>
                            <p><strong>Title:</strong> <?=$dta["title"] ?></p>
                            <p>
                                <strong>Description:</strong> <?=$dta["description"] ?>
                            </p>
                            <p>
                                <strong>Facilities:</strong> <?=$dta["facilities"] ?>
                            </p>
                            <p><strong>Address:</strong> <?=$dta["address_l1"] ?>, <?=$dta["address_l2"] ?></p>
                            <p><strong>Price:</strong> <?=$dta["price"] ?></p>
                            <p><strong>Contact:</strong> <?=$dta["phone"] ?></p>
                            <p><strong>Status:</strong> <?=$row["status"] ?></p>
                        </div>
                    </div>
                    <!-- <div class="g-map" id="map-<?=$row["req_id"] ?>"></div> -->
                    <div class="image-container">
                        <?php 
                            $img_res = get_images($conn, $dta["landlord"], $dta["aid"]);
                            if ($img_res && $img_res->num_rows > 0) {
                                while ($img = $img_res->fetch_assoc()) {
                                   ?>

                        <img src="./img/<?=$img["img_name"] ?>" class="img-fluid mx-2" alt="...">

                        <?php
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
        } }
        else {?>
        <p>No records found.</p>
        <?php
        }
        ?>
    </div>
</section>




<?php
}
?>
<?php 
include_once "site_parts/content_footer.php";
include_once "site_parts/dash_footer.php";
?>