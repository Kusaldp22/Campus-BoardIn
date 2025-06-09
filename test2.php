<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Latitude and Longitude of Clicked Location</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
    #map {
        height: 400px;
        width: 100%;
    }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>Click on the Map to Get Latitude and Longitude</h1>
        <div id="map"></div>
        <div class="mt-3">
            <label for="latitudeInput" class="form-label">Latitude:</label>
            <input type="text" class="form-control" id="latitudeInput" readonly>
        </div>
        <div class="mt-3">
            <label for="longitudeInput" class="form-label">Longitude:</label>
            <input type="text" class="form-control" id="longitudeInput" readonly>
        </div>
    </div>

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
            zoom: 10,
        });

        // Add a fixed marker at the specified position
        const fixedMarker = new google.maps.Marker({
            position: {
                lat: 6.8213,
                lng: 80.0416
            },
            map: map,
            title: "Fixed Location",
            icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png", // Red marker icon
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPTPrUe9ZyxS4NgdrqszzaMMt2tbAnPmY&callback=initMap"
        async defer></script>

</body>

</html>


<!-- new -->

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

    <?php
                }}}
            }
        else if ($_SESSION["role"] == "student") {
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

    <?php
                    }}}
                    
                        ?>
    <?php    
            }

            ?>

}
</script>