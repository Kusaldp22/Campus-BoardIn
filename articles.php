<?php
include_once "./site_parts/web_custom_header.php";
require "./includes/db.inc.php";
require "./includes/functions.inc.php";
?>

<style>
.post-container {
    margin-bottom: 30px;
}

.post-img {
    max-height: 300px;
    object-fit: cover;
}
</style>

<section class="navbar-spacing">
    <?php 
    $posts = get_posts($conn);
    if ($posts && $posts->num_rows > 0) {
        while ($row = $posts->fetch_assoc()) {
            $formatted_date = date("Y-m-d", strtotime($row["date"]));
    
    ?>
    <div class="container mb-3" style="border: 2px solid lightgray; border-radius: 15px; padding: 15px;">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="post-container">
                    <h2 class="mb-3"><?=$row["title"] ?></h2>
                    <img src="./img/<?=$row["photo"] ?>" alt="Post Image" class="img-fluid">
                    <p class="lead"><?=$row["description"] ?></p>
                    <p class="text-muted">Posted on <span class="fw-bold"><?=$formatted_date ?></span></p>
                </div>

            </div>
        </div>
    </div>

    <?php 
        }
    }
    ?>
</section>

<?php
include_once "./site_parts/web_custom_footer.php";
?>