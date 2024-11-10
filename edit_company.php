<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
require './function/function.inc.php';
include "./includes/header.php";
include "./includes/serchform.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";


?>


<div class="container-fluid">
    <div class="row my-5">
        <?php
        if (isset($_GET['editid'])) {
            $id = $_GET['editid'];

            $company = getByID("importer_details", $id);
            if (mysqli_num_rows($company) > 0) {
                $data = mysqli_fetch_array($company);
        ?>

                <div class="col-lg-12 course-card pb-5">
                    <div class="card mein-card mb-5">
                        <h3 class=" font-inter text-center  my-3">Update Company</h3>
                        <div class="container-fluid">

                            <form action="add_company_code.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="in">
                                            <input type="hidden" name="edit" value="<?= $data['importer_id']; ?> ">
                                            <input type="text" name="company_name" value="<?= $data['company_name']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Company Name">
                                            <?php if (isset($_SESSION['empty_company_name'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_name'] . '</p>';
                                                unset($_SESSION['empty_company_name']);
                                            }
                                            ?>
                                        </div>



                                        <div class="in">
                                            <input type="text" name="company_contact" value="<?= $data['company_contact']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Contact Number ">
                                            <?php if (isset($_SESSION['empty_company_contact'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_contact'] . '</p>';
                                                unset($_SESSION['empty_company_contact']);
                                            }
                                            ?>
                                        </div>

                                        <div class="in">
                                            <input type="text" name="company_address" value="<?= $data['company_address']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Address">
                                            <?php if (isset($_SESSION['empty_company_address'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_address'] . '</p>';
                                                unset($_SESSION['empty_company_address']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="company_city" value="<?= $data['company_city']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="City">
                                            <?php if (isset($_SESSION['empty_company_city'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_city'] . '</p>';
                                                unset($_SESSION['empty_company_city']);
                                            }
                                            ?>
                                        </div>

                                        <div class="in">
                                            <input type="text" name="company_state" value="<?= $data['company_state']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="State ">
                                            <?php if (isset($_SESSION['empty_company_state'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_state'] . '</p>';
                                                unset($_SESSION['empty_company_state']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="company_zipcode" value="<?= $data['company_zipcode']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Zip Code ">
                                            <?php if (isset($_SESSION['empty_company_zipcode'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_zipcode'] . '</p>';
                                                unset($_SESSION['empty_company_zipcode']);
                                            }
                                            ?>
                                        </div>

                                        <div class="in">
                                            <input type="text" name="company_telephone" value="<?= $data['company_telephone']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Telephone ">
                                            <?php if (isset($_SESSION['empty_company_telephone'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_telephone'] . '</p>';
                                                unset($_SESSION['empty_company_telephone']);
                                            }
                                            ?>
                                        </div>

                                        <div class="in">
                                            <input type="email" name="company_email" value="<?= $data['company_email']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Email ">
                                            <?php if (isset($_SESSION['empty_company_email'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_email'] . '</p>';
                                                unset($_SESSION['empty_company_email']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="in">
                                            <input type="text" name="company_direct" value="<?= $data['company_direct']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Direct ">
                                            <?php if (isset($_SESSION['empty_company_direct'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_direct'] . '</p>';
                                                unset($_SESSION['empty_company_direct']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="company_port" value="<?= $data['company_port_of_entry']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Port Of Entry ">
                                            <?php if (isset($_SESSION['empty_company_port'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_port'] . '</p>';
                                                unset($_SESSION['empty_company_port']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="company_vessel" value="<?= $data['company_vessel_detail']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Vessel Details">
                                            <?php if (isset($_SESSION['empty_company_vessel'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_vessel'] . '</p>';
                                                unset($_SESSION['empty_company_vessel']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="company_trucking" value="<?= $data['company_trucking']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Trucking">
                                            <?php if (isset($_SESSION['empty_company_trucking'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_trucking'] . '</p>';
                                                unset($_SESSION['empty_company_trucking']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="company_misc" value="<?= $data['company_misc']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Misc">
                                            <?php if (isset($_SESSION['empty_company_misc'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_company_misc'] . '</p>';
                                                unset($_SESSION['empty_company_misc']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="total_cost" value="<?= $data['total_cost']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Total Cost">
                                            <?php if (isset($_SESSION['empty_total_cost'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_total_cost'] . '</p>';
                                                unset($_SESSION['empty_total_cost']);
                                            }
                                            ?>
                                        </div>
                                        <div class="in">
                                            <input type="text" name="custom_frieght" value="<?= $data['custom_frieght']; ?>" class=" inputDesign w-100 py-2 mt-3" placeholder="Custom Frieght">
                                            <?php if (isset($_SESSION['empty_custom_freight'])) {
                                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_custom_freight'] . '</p>';
                                                unset($_SESSION['empty_custom_freight']);
                                            }
                                            ?>
                                        </div>

                                        <button type="submit" name="update_company_btn" class="save py-2">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php } else {
                echo "company not found";
            }
        } else {
            echo '
            <p class="mx-5"></p></p>id messing from url</p>
            ';
        }
        ?>


    </div>
</div>
<?php
include "./includes/footer.php";
?>