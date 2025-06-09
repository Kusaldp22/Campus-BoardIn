<?php
session_start();

if (!(isset($_SESSION["role"]) && $_SESSION["role"] == "landlord")) {
    header("Location: dashboard.php");
    exit();
}

$title = "Create new property";
$web_title = "Create new property";
include_once "site_parts/dash_header.php";
require "./includes/db.inc.php";
?>
<?php
require "site_parts/getters.php";
?>

<style>
#map {
    height: 400px;
    width: 100%;
}
</style>

<section class="">
    <?php 
        include_once "site_parts/getters.php";
        ?>
    <div class="">
        <?php 
        add_alerts();
        ?>
        <form validate method="post" action="./includes/add_property.inc.php" enctype="multipart/form-data">
            <h5 class="mb-2"><?=required_star()?> Property Information</h5>
            <div class="from_div_content row g-3 needs-validation">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label"><?=required_star() ?> Title</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom01" required
                        name="title" />
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label"><?=required_star() ?> Description</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom02" required
                        name="description" />
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label"><?=required_star() ?> Facilities</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom02" required
                        name="facilities" />
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Price</label>
                    <input type="number" class="form-control form-control-sm" id="validationCustom03" required
                        name="price" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label"><?=required_star() ?> For Boys / Girls</label>
                    <select style="border: 2px solid rgb(208, 161, 255)" class="form-select form-select-sm"
                        id="validationCustom04" required name="gender">
                        <?=get_gender("")?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Phone</label>
                    <input type="number" class="form-control form-control-sm" id="validationCustom03" required
                        name="phone" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Address Line
                        1</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="address_l1" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Address Line
                        2</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="address_l2" />
                </div>
                <div class="col-md-12">
                    <label for="formFileSm" class="form-label"><?=required_star() ?> Upload Photos (5 max)</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="photos[]" required
                        multiple accept="image/jpeg, image/png" max="5">
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Mark your location inside
                        of
                        the map</label>
                    <div id="map"></div>
                </div>
                <!-- <input type="text" class="form-control" id="latitudeInput" readonly>
                <input type="text" class="form-control" id="longitudeInput" readonly> -->
                <input type="text" class="form-control form-control-sm" id="latitudeInput" name="lat" hidden />
                <input type="text" class="form-control form-control-sm" id="longitudeInput" name="lon" hidden />
                <input type="text" class="form-control form-control-sm" id="longitudeInput" value="Pending"
                    name="status" hidden />

            </div>
            <div class="from_div_content row g-3 needs-validation mt-4 mb-2">
                <div class="col-12">
                    <button class="btn btn-primary form-control" type="submit" name="add_property">
                        Add Property
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include_once "site_parts/content_footer.php";
?>
<!-- Google Maps JavaScript API -->
<script>
let map;
let marker;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 6.8213,
            lng: 80.0416
        },
        zoom: 12,
    });

    // Add a fixed marker at the specified position
    const fixedMarker = new google.maps.Marker({
        position: {
            lat: 6.8213,
            lng: 80.0416
        },
        map: map,
        title: "Fixed Location",
        icon: "./images/nsbm_crop.png", // Red marker icon
    });


    // Event listener for click on the map
    map.addListener("click", (event) => {
        document.getElementById("latitudeInput").value = event.latLng.lat();
        document.getElementById("longitudeInput").value = event.latLng.lng();

        // Remove previous marker
        if (marker) {
            marker.setMap(null);
        }

        // Add marker at clicked position
        marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            title: "Clicked Location",
            draggable: true, // If you want to make the marker draggable
        });
    });
}
</script>

<!-- Load the Google Maps JavaScript API asynchronously -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPTPrUe9ZyxS4NgdrqszzaMMt2tbAnPmY&callback=initMap" async
    defer></script>


<?php
// include_once "site-parts/footer_part.php";
include_once "site_parts/dash_footer.php";
?>