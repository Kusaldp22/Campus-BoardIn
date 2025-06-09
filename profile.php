<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: dashboard.php");
    exit();
}

$title = "Profile";
$web_title = "Profile";
include_once "site_parts/dash_header.php";
require "./includes/db.inc.php";
?>

<section class="">
    <?php 
        include_once "site_parts/getters.php";
        ?>
    <div class="">
        <?php 
        include_once "site_parts/getters.php";
        add_alerts();
        if ($_SESSION["role"] == "student") {
        ?>
        <form validate method="post" action="./includes/profile_edit.inc.php">
            <h5 class="mb-2"><?=required_star()?> Student Information</h5>
            <div class="from_div_content row g-3 needs-validation">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label"><?=required_star() ?> First name</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom01" required
                        name="first_name" value="<?=$_SESSION['student']['first_name'] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label"><?=required_star() ?> Last name</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom02" required
                        name="last_name" value="<?=$_SESSION['student']['last_name'] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label"><?=required_star() ?> Gender</label>
                    <select style="border: 2px solid rgb(208, 161, 255)" class="form-select form-select-sm"
                        id="validationCustom04" required name="gender">
                        <?=get_gender($_SESSION['student']['gender'])?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Student ID</label>
                    <input type="number" class="form-control form-control-sm" id="validationCustom03" required disabled
                        value="<?=$_SESSION['student']['sid'] ?>" />
                    <input type="number" class="form-control form-control-sm" id="validationCustom03" required
                        name="sid" hidden value="<?=$_SESSION['student']['sid'] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Batch</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="batch" value="<?=$_SESSION['student']['batch'] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Email</label>
                    <input type="email" class="form-control form-control-sm" id="validationCustom03" required
                        name="email" value="<?=$_SESSION['student']['email'] ?>" />
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Phone</label>
                    <input type="number" class="form-control form-control-sm" id="validationCustom03" required
                        name="phone" value="<?=$_SESSION['student']['phone'] ?>" />
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Address Line
                        1</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="address_l1" value="<?=$_SESSION['student']['address_l1'] ?>" />
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Address Line
                        2</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="address_l2" value="<?=$_SESSION['student']['address_l2'] ?>" />
                </div>
                <!-- <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star()?> Password Reset</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom03" required
                        name="password_1" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label"><?=required_star() ?> Password Repeat</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom05" required
                        name="password_2" />
                </div> -->
            </div>
            <div class="from_div_content row g-3 needs-validation mt-4 mb-2">
                <div class="col-12">
                    <button class="btn btn-primary form-control" type="submit" name="edit_student">
                        Edit details
                    </button>
                </div>
            </div>
        </form>
        <?php
        }
        else if ($_SESSION["role"] == "landlord") {
            ?>
        <form validate method="post" action="./includes/profile_edit.inc.php">
            <h5 class="mb-2"><?=required_star()?> Landlord Information</h5>
            <div class="from_div_content row g-3 needs-validation">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label"><?=required_star() ?> First name</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom01" required
                        name="first_name" value="<?=$_SESSION["landlord"]["first_name"] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label"><?=required_star() ?> Last name</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom02" required
                        name="last_name" value="<?=$_SESSION["landlord"]["last_name"] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label"><?=required_star() ?> Gender</label>
                    <select style="border: 2px solid rgb(208, 161, 255)" class="form-select form-select-sm"
                        id="validationCustom04" required name="gender">
                        <?=get_gender($_SESSION["landlord"]["gender"])?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> NIC</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        value="<?=$_SESSION["landlord"]["nic"] ?>" disabled />
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required name="nic"
                        value="<?=$_SESSION["landlord"]["nic"] ?>" hidden />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Email</label>
                    <input type="email" class="form-control form-control-sm" id="validationCustom03" required
                        value="<?=$_SESSION["landlord"]["email"] ?>" disabled />
                    <input type="email" class="form-control form-control-sm" id="validationCustom03" required
                        name="email" value="<?=$_SESSION["landlord"]["email"] ?>" hidden />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Phone</label>
                    <input type="number" class="form-control form-control-sm" id="validationCustom03" required
                        name="phone" value="<?=$_SESSION["landlord"]["phone"] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Address Line
                        1</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="address_l1" value="<?=$_SESSION["landlord"]["address_l1"] ?>" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Address Line
                        2</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="address_l2" value="<?=$_SESSION["landlord"]["address_l2"] ?>" />
                </div>
                <!-- <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star()?> Password</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom03" required
                        name="password_1" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label"><?=required_star() ?> Password Repeat</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom05" required
                        name="password_2" />
                </div> -->
            </div>
            <div class="from_div_content row g-3 needs-validation mt-4 mb-2">
                <div class="col-12">
                    <button class="btn btn-primary form-control" type="submit" name="edit_landlord">
                        Edit Landlord
                    </button>
                </div>
            </div>
        </form>

        <?php
        }
    ?>
    </div>
</section>


<?php
include_once "site_parts/content_footer.php";
include_once "site_parts/dash_footer.php";
?>