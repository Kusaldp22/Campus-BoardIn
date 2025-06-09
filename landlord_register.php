<?php
include_once "./site_parts/web_custom_header.php";
?>
<div class="form_header navbar-spacing">

    <h2 class="text-center mt-3">Landlord Registrations</h2>
    <div class="alert alert-primary mb-4 mt-3 inside-content" role="alert">
        <b>Instructions</b>
        <p class="m-0">Fill all the required fields.
            You need to give the same password twice for reduce the type errors.
            Once all fields are filled, click on the "Register" button to proceed.
        </p>
    </div>
    <?php 
        include_once "site_parts/getters.php";
        add_alerts();
        ?>
</div>
<section class="user_info">
    <div class="inside-content">
        <form validate method="post" action="./includes/landlord_register.inc.php">
            <h5 class="mb-2"><?=required_star()?> Landlord Information</h5>
            <div class="from_div_content row g-3 needs-validation">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label"><?=required_star() ?> First name</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom01" required
                        name="first_name" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label"><?=required_star() ?> Last name</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom02" required
                        name="last_name" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label"><?=required_star() ?> Gender</label>
                    <select style="border: 2px solid rgb(208, 161, 255)" class="form-select form-select-sm"
                        id="validationCustom04" required name="gender">
                        <?=get_gender("")?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> NIC</label>
                    <input type="text" class="form-control form-control-sm" id="validationCustom03" required
                        name="nic" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star() ?> Email</label>
                    <input type="email" class="form-control form-control-sm" id="validationCustom03" required
                        name="email" />
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
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label"><?=required_star()?> Password</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom03" required
                        name="password_1" />
                </div>
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label"><?=required_star() ?> Password Repeat</label>
                    <input type="password" class="form-control form-control-sm" id="validationCustom05" required
                        name="password_2" />
                </div>
            </div>
            <div class="from_div_content row g-3 needs-validation mt-4 mb-2">
                <div class="col-12">
                    <button class="btn btn-primary form-control" type="submit" name="ll_register">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>


<?php
include_once "./site_parts/web_custom_footer.php";
?>