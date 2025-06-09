<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}

$title = "Dashboard";
$web_title = "Dashboard";

include_once "site_parts/dash_header.php";
require "./includes/db.inc.php";
require "./includes/functions.inc.php";
require "site_parts/getters.php";
?>
<?php 
add_alerts();
if ($_SESSION["role"] == "landlord" || $_SESSION["role"] == "student") {
    get_jambo("https://assets-global.website-files.com/5f4bb8e34bc82700bda2f385/60592b7ebe1b7639868b5190_learning-web-design-sites.jpg", "Welcome, ". $_SESSION[$_SESSION["role"]]["first_name"] ." ". $_SESSION[$_SESSION["role"]]["last_name"] . "!", "This is the " .$_SESSION["role"]. " portal of the NSBM rental service");
}
?>

<!-- LANDLORD PART -->
<?php
if ($_SESSION["role"] == "landlord" || $_SESSION["role"] == "student" || $_SESSION["role"] == "warden" || $_SESSION["role"] == "master") {
    ?>
<h4 class="mb-4 mt-5">Active Locations</h4>
<p>Click on the locations to see the details</p>
<div id="map" class="g-map" style="height: 400px !important;"></div>
<?php
}
?>


<?php
if ($_SESSION["role"] == "landlord") {
?>
<h4 class="mb-4 mt-5">Active Advertisments</h4>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php 
        $res = get_landlord_ads($conn, $_SESSION["landlord"]["uid"]);
        $active_count = 0;
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row["landlord"] == $_SESSION["landlord"]["uid"] && $row["status"] == "Approved") {
                    ?>
        <!-- Card 1 -->
        <div class="col">
            <div class="card card-animation">
                <div class="card-body">

                    <div class="image-container">
                        <?php 
                            $img_res = get_images($conn, $_SESSION["landlord"]["uid"], $row["aid"]);
                            if ($img_res && $img_res->num_rows > 0) {
                                while ($img = $img_res->fetch_assoc()) {
                                   ?>

                        <img src="./img/<?=$img["img_name"] ?>" class="img-fluid mx-2" alt="...">

                        <?php
                                }
                            }
                            ?>
                    </div>

                    <h5 class="card-title"><?=$row["title"] ?>
                    </h5>
                    <p class="card-text mb-0" style="color: rgba(143, 0, 219);"><?=$row["address_l1"] ?>,
                        <?=$row["address_l2"] ?></p>
                    <p class="mb-0"><?=$row["description"] ?></p>
                    <p class="mb-0"><strong><?=$row["facilities"] ?></strong></p>
                    <p class="mt-0">
                        <span class="badge text-bg-primary mt-0">For <?=$row["gender"] ?>s</span>
                        <span class="badge text-bg-warning mt-0"><?=$row["price"] ?> LKR</span>
                    </p>
                    <div class="mt-4" style="width: 100%; display: flex; justify-content: end;">
                        <a class="btn btn-sm btn-success" style="width: 100%;" target="_blank"
                            href="tel:<?=$row["phone"] ?>">Call</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $active_count++;
        }
    }
}
        else {
        ?>
        <p>No records found.</p>
        <?php
        }
 
        if ($active_count == 0) {
            ?>
        <p>No records found.</p>
        <?php
           }
        ?>
    </div>
</div>
<br>
<?php 
}
?>


<?php 
// LANDLORD MODEL
if ($_SESSION["role"] == "landlord") {
        $res = get_landlord_ads($conn, $_SESSION["landlord"]["uid"]);
        $active_count = 0;
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row["landlord"] == $_SESSION["landlord"]["uid"] && $row["status"] == "Approved") {
                    
                    ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal-<?=$row["aid"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row["title"] ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Title:</strong> <?=$row["title"] ?></p>
                <p>
                    <strong>Description:</strong> <?=$row["description"] ?>
                </p>
                <p>
                    <strong>Facilities:</strong> <?=$row["facilities"] ?>
                </p>
                <p><strong>Address:</strong> <?=$row["address_l1"] ?>, <?=$row["address_l2"] ?></p>
                <p><strong>Price:</strong> <?=$row["price"] ?> LKR</p>
                <p><strong>Contact:</strong> <?=$row["phone"] ?></p>
                <div class="image-container">
                    <?php 
                            $img_res = get_images($conn, $row["landlord"], $row["aid"]);
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php 

                }}}}
?>



<?php 
// STUDENT MODEL
if ($_SESSION["role"] == "student") {
        $res = get_landlord_ads($conn, "");
        $active_count = 0;
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row["status"] == "Approved") {
                    
                    ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal-<?=$row["aid"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row["title"] ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Title:</strong> <?=$row["title"] ?></p>
                <p>
                    <strong>Description:</strong> <?=$row["description"] ?>
                </p>
                <p>
                    <strong>Facilities:</strong> <?=$row["facilities"] ?>
                </p>
                <p><strong>Address:</strong> <?=$row["address_l1"] ?>, <?=$row["address_l2"] ?></p>
                <p><strong>Price:</strong> <?=$row["price"] ?> LKR</p>
                <p><strong>Contact:</strong> <?=$row["phone"] ?></p>
                <div class="image-container">
                    <?php 
                            $img_res = get_images($conn, $row["landlord"], $row["aid"]);
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

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="./includes/add_request.inc.php" method="POST">
                    <input type="text" hidden value="<?=$row["landlord"] ?>" name="landlord">
                    <input type="text" hidden value="<?=$row["aid"] ?>" name="aid">
                    <input type="text" hidden value="<?=$_SESSION["student"]["sid"] ?>" name="sid">
                    <input type="text" hidden value="Pending" name="status">
                    <?php
                    $data = is_student_booked($conn, $_SESSION["student"]["sid"], $row["aid"]);
                    if ($data) {
                    ?>
                    <button disabled class="btn btn-success" name="book_now">You have already booked</button>
                    <?php
                    } else {
                        ?>
                    <button type="submit" class="btn btn-warning" name="book_now">Book Now</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 

                }}}}
?>


<?php 
// MASTER AND WARDEN MODEL
if ($_SESSION["role"] == "warden" || $_SESSION["role"] == "master") {
        $res = get_landlord_ads($conn, "");
        $active_count = 0;
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row["status"] == "Approved") {
                    
                    ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal-<?=$row["aid"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row["title"] ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Title:</strong> <?=$row["title"] ?></p>
                <p>
                    <strong>Description:</strong> <?=$row["description"] ?>
                </p>
                <p>
                    <strong>Facilities:</strong> <?=$row["facilities"] ?>
                </p>
                <p><strong>Address:</strong> <?=$row["address_l1"] ?>, <?=$row["address_l2"] ?></p>
                <p><strong>Price:</strong> <?=$row["price"] ?> LKR</p>
                <p><strong>Contact:</strong> <?=$row["phone"] ?></p>
                <div class="image-container">
                    <?php 
                            $img_res = get_images($conn, $row["landlord"], $row["aid"]);
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

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php 

                }}}}
?>












<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPTPrUe9ZyxS4NgdrqszzaMMt2tbAnPmY&callback=initMap" async
    defer>
</script>

<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
            lat: 6.8213,
            lng: 80.0416
        } // Center on NSBM
    });
    var nsbm_marker = new google.maps.Marker({
        position: {
            lat: 6.8213,
            lng: 80.0416
        },
        map: map,
        title: 'NSBM Green University',
        icon: './images/nsbm_crop.png' // Special icon for NSBM
    });

    <?php 
        if ($_SESSION["role"] == "landlord") {

            $res = get_landlord_ads($conn, $_SESSION["landlord"]["uid"]);
            $active_count = 0;
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    if ($row["landlord"] == $_SESSION["landlord"]["uid"] && $row["status"] == "Approved") {
                        
                        ?>

    var marker_<?=$row["aid"] ?> = new google.maps.Marker({
        position: {
            lat: <?=$row["lat"] ?>,
            lng: <?=$row["lon"] ?>
        },
        map: map,
        title: '<?=$row["title"] ?>'
    });
    marker_<?=$row["aid"] ?>.addListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal-<?=$row["aid"] ?>'));
        myModal.show();
    });

    <?php
                }}}
            }
        else if ($_SESSION["role"] == "student" || $_SESSION["role"] == "master" || $_SESSION["role"] == "warden") {
            $res = get_landlord_ads($conn, "");
            $active_count = 0;
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    if ($row["status"] == "Approved") { 
                    ?>

    var marker_<?=$row["aid"] ?> = new google.maps.Marker({
        position: {
            lat: <?=$row["lat"] ?>,
            lng: <?=$row["lon"] ?>
        },
        map: map,
        title: '<?=$row["title"] ?>'
    });

    marker_<?=$row["aid"] ?>.addListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal-<?=$row["aid"] ?>'));
        myModal.show();
    });

    <?php
                    }}}
                    
                        ?>
    <?php    
            }

            ?>

}
</script>





<?php
include_once "site_parts/content_footer.php";
include_once "site_parts/dash_footer.php";
?>