<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}
if (($_SESSION["role"] != "master")) {
    header("Location: dashboard.php");
    exit();
}

$title = "Add new article";
$web_title = "Add new article";

include_once "site_parts/dash_header.php";
require "./includes/db.inc.php";
require "./includes/functions.inc.php";
require "site_parts/getters.php";
?>

<section>
    <div class="">
        <?php 
        add_alerts();
        ?>
        <form validate method="post" action="./includes/add_article.inc.php" enctype="multipart/form-data">
            <h5 class="mb-2"><?=required_star()?> Add article info</h5>
            <div class="from_div_content row g-3 needs-validation">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label"><?=required_star() ?> Title</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom01" required
                        name="title" />
                </div>
                <div class="col-md-12">
                    <label for="floatingTextarea" class="form-label"><?=required_star() ?> Description</label>
                    <textarea class="form-control form-control-sm" id="floatingTextarea" required
                        name="description"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="formFileSm" class="form-label"><?=required_star() ?> Upload photo</label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="photo" required
                        accept="image/jpeg, image/png">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary form-control" type="submit" name="add_article">
                        Add Article
                    </button>
                </div>

            </div>
        </form>
    </div>
</section>




<?php
include_once "site_parts/content_footer.php";
include_once "site_parts/dash_footer.php";
?>