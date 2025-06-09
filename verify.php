<?php
session_start();

if (!(isset($_SESSION["role"]) && ($_SESSION["role"] == "landlord" || $_SESSION["role"] == "warden"))) {
    header("Location: dashboard.php");
    exit();
}

$title = "Advertisment requests";
$web_title = "Advertisment requests";
include_once "site_parts/dash_header.php";
require "./includes/db.inc.php";
require "./includes/functions.inc.php";
require "site_parts/getters.php";
add_alerts();
?>

<?php 
if ($_SESSION["role"] == "landlord") {
?>
<section>
    <h5 class="mb-4">Your Advertisments</h5>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php 
        $res = get_landlord_ads($conn, $_SESSION["landlord"]["uid"]);
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if ($row["landlord"] == $_SESSION["landlord"]["uid"]) {
                ?>
        <div class="accordion-item" style="border: 2px solid lightgray;">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapse-<?=$row["aid"] ?>" aria-expanded="false"
                    style="display: flex; justify-content: space-between; width: 100%; align-items:center; position: relative;"
                    aria-controls="panelsStayOpen-collapse-<?=$row["aid"] ?>">
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
                        <?=$row["title"] ?>
                    </div>
                    <p class="m-0" style="position: absolute; right: 60px;">
                        <?=$row["date"] ?>
                    </p>
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-<?=$row["aid"] ?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="verify-content-body">
                        <div class="verify-content-info">
                            <p><strong>Title:</strong> <?=$row["title"] ?></p>
                            <p>
                                <strong>Description:</strong> <?=$row["description"] ?>
                            </p>
                            <p>
                                <strong>Facilities:</strong> <?=$row["facilities"] ?>
                            </p>
                            <p><strong>Address:</strong> <?=$row["address_l1"] ?>, <?=$row["address_l2"] ?></p>
                            <p><strong>Price:</strong> <?=$row["price"] ?></p>
                            <p><strong>Contact:</strong> <?=$row["phone"] ?></p>
                            <p><strong>Status:</strong> <?=$row["status"] ?></p>
                        </div>
                    </div>
                    <div class="g-map" id="map-<?=$row["aid"] ?>"></div>
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
                </div>
            </div>
        </div>

        <?php
            }}
        }
        else {?>
        <p>No records found.</p>
        <?php
        }
        ?>
    </div>
</section>

<?php } ?>
<?php 
if ($_SESSION["role"] == "warden") {
?>
<section>
    <h5 class="mb-4">Requested Advertisments</h5>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <?php 
        $res = get_landlord_ads($conn, "");
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                ?>
        <div class="accordion-item" style="border: 2px solid lightgray;">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#panelsStayOpen-collapse-<?=$row["aid"] ?>" aria-expanded="false"
                    style="display: flex; justify-content: space-between; width: 100%; align-items:center; position: relative;"
                    aria-controls="panelsStayOpen-collapse-<?=$row["aid"] ?>">
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
                        <?=$row["title"] ?>
                    </div>
                    <p class="m-0" style="position: absolute; right: 60px;">
                        <?=$row["date"] ?>
                    </p>
                </button>
            </h2>
            <div id="panelsStayOpen-collapse-<?=$row["aid"] ?>" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <div class="verify-content-body">
                        <div class="verify-content-info">
                            <div class="alert alert-primary" role="alert">
                                <?php
                                $id = check_landlord_id($conn, $row["landlord"]);
                                $id = $id->fetch_assoc();
                                ?>
                                <h5 class="mb-3">Landlord Request</h5>
                                <p class="m-0"><strong>Landlord Name:</strong> <?=$id["first_name"] ?>
                                    <?=$id["last_name"] ?></p>
                                <p class="m-0"><strong>Contact:</strong> <?=$id["phone"] ?></p>
                                <p class="mb-4"><strong>NIC:</strong> <?=$id["nic"] ?></p>

                                <div class="booking-btn-align d-flex">
                                    <form action="./includes/add_approval.inc.php" method="POST">
                                        <input type="text" hidden value="<?=$row["landlord"] ?>" name="landlord">
                                        <input type="text" hidden value="<?=$row["aid"] ?>" name="aid">
                                        <input type="text" hidden value="Approved" name="status">
                                        <button type="submit" class="btn btn-success" name="approval">Approve</button>
                                    </form>
                                    <form action="./includes/add_approval.inc.php" method="POST">
                                        <input type="text" hidden value="<?=$row["landlord"] ?>" name="landlord">
                                        <input type="text" hidden value="<?=$row["aid"] ?>" name="aid">
                                        <input type="text" hidden value="Rejected" name="status">
                                        <button type="submit" class="btn btn-danger mx-2"
                                            name="approval">Reject</button>
                                    </form>
                                    <form action="./includes/add_approval.inc.php" method="POST">
                                        <input type="text" hidden value="<?=$row["landlord"] ?>" name="landlord">
                                        <input type="text" hidden value="<?=$row["aid"] ?>" name="aid">
                                        <input type="text" hidden value="Pending" name="status">
                                        <button type="submit" class="btn btn-warning" name="approval">Pending</button>
                                    </form>
                                </div>

                            </div>
                            <p><strong>Title:</strong> <?=$row["title"] ?></p>
                            <p>
                                <strong>Description:</strong> <?=$row["description"] ?>
                            </p>
                            <p>
                                <strong>Facilities:</strong> <?=$row["facilities"] ?>
                            </p>
                            <p><strong>Address:</strong> <?=$row["address_l1"] ?>, <?=$row["address_l2"] ?></p>
                            <p><strong>Price:</strong> <?=$row["price"] ?></p>
                            <p><strong>Contact:</strong> <?=$row["phone"] ?></p>
                            <p><strong>Status:</strong> <?=$row["status"] ?></p>
                        </div>
                    </div>
                    <div class="g-map" id="map-<?=$row["aid"] ?>"></div>
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
            </div>
        </div>

        <?php
            }
        }
        else {?>
        <p>No records found.</p>
        <?php
        }
        ?>
    </div>
</section>

<?php } ?>








<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPTPrUe9ZyxS4NgdrqszzaMMt2tbAnPmY&callback=initMaps"
    async defer></script>
<script>
function initMaps() {
    <?php 
    // LANDLORD FUNC
    if ($_SESSION["role"] == "landlord") {
            $res = get_landlord_ads($conn, $_SESSION["landlord"]["uid"]);
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    if ($row["landlord"] == $_SESSION["landlord"]["uid"]) {
            ?>
    var centerCoordinates_<?=$row["aid"] ?> = {
        lat: <?=$row["lat"] ?>,
        lng: <?=$row["lon"] ?>
    };

    var map_<?=$row["aid"] ?> = new google.maps.Map(document.getElementById('map-<?=$row["aid"] ?>'), {
        zoom: 12,
        center: centerCoordinates_<?=$row["aid"] ?>
    });

    var marker_<?=$row["aid"] ?> = new google.maps.Marker({
        position: centerCoordinates_<?=$row["aid"] ?>,
        map: map_<?=$row["aid"] ?>,
        title: '<?=$row["title"] ?>',
    });
    var specialLocation = {
        lat: 6.8213,
        lng: 80.0416
    };
    var specialMarker_<?=$row["aid"] ?> = new google.maps.Marker({
        position: specialLocation,
        map: map_<?=$row["aid"] ?>,
        title: "NSBM Green University",
        icon: "./images/nsbm_crop.png" // Custom icon URL
    });
    <?php 
                    }
                }
            }}
            ?>
    <?php 
    // WARDEN AND MASTER FUNC
    if ($_SESSION["role"] == "warden" || $_SESSION["role"] == "master") {
            $res = get_landlord_ads($conn, "");
            if ($res && $res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
            ?>
    var centerCoordinates_<?=$row["aid"] ?> = {
        lat: <?=$row["lat"] ?>,
        lng: <?=$row["lon"] ?>
    };

    var map_<?=$row["aid"] ?> = new google.maps.Map(document.getElementById('map-<?=$row["aid"] ?>'), {
        zoom: 12,
        center: centerCoordinates_<?=$row["aid"] ?>
    });

    var marker_<?=$row["aid"] ?> = new google.maps.Marker({
        position: centerCoordinates_<?=$row["aid"] ?>,
        map: map_<?=$row["aid"] ?>,
        title: '<?=$row["title"] ?>',
    });
    var specialLocation = {
        lat: 6.8213,
        lng: 80.0416
    };
    var specialMarker_<?=$row["aid"] ?> = new google.maps.Marker({
        position: specialLocation,
        map: map_<?=$row["aid"] ?>,
        title: "NSBM Green University",
        icon: "./images/nsbm_crop.png" // Custom icon URL
    });
    <?php 
                    }
                }
            }
            ?>
}
</script>

<?php
include_once "site_parts/content_footer.php";
include_once "site_parts/dash_footer.php";
?>