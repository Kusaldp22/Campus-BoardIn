<?php
include_once "./site_parts/web_custom_header.php";
?>

<!-- <section class="form_header"> -->

<div class="form_header navbar-spacing">

    <h2 class="text-center mt-3">Student Log In</h2>
    <div class="alert alert-primary mb-4 mt-3 inside-content" role="alert">
        <b>Instructions</b>
        <p class="m-0">Enter your NSBM student ID and password to login
        </p>
    </div>
    <?php
if (isset($_GET["err"])) {
    ?>
    <div class="alert alert-danger alert-dismissible fade show login-content mb-4" role="alert">
        <p style="text-align: center; margin: 0;"><strong>Warning! &nbsp;</strong><?=$_GET["err"]?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
</div>
<!-- </section> -->
<section class="user_info">
    <?php 
        include_once "site_parts/getters.php";
        ?>
    <div class="login-content card-animation">
        <form validate method="post" action="./includes/login.inc.php">
            <div class="from_div_content row g-3 needs-validation">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label"><?=required_star()?> Student ID</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom01" required
                        name="username" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01" class="form-label"><?=required_star() ?> Password</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom01" required
                        name="password" />
                </div>


                <div class="col-md-12 mt-4">
                    <button class="btn btn-primary form-control" style="width: 100%;" type="submit" name="user_login">
                        Log In
                    </button>
                </div>

            </div>
        </form>
    </div>
</section>

<?php
include_once "./site_parts/web_custom_footer.php";
?>