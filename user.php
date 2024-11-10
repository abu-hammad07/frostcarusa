<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != "Admin") {
    header('location: index.php'); // Redirect to your login page if not logged in
    exit;
}
include 'config/config.php';
global $conn;
require './function/function.inc.php';
include "./includes/header.php";
include "./includes/serchform.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";
?>
<div class="container-fluid mt-3">
    <?php if (!empty($_SESSION['error_messege'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>@Warning</strong> <?php echo  $_SESSION['error_messege']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php }
    unset($_SESSION['error_messege']); ?>
    <div class="card  my-5 mein-card mb-5">
        <h3 class=" font-inter text-center">Add New User</h3>
        <div class="container-fluid course-card">
            <div class="row my-5 ">
                <div class="col-lg-6">
                    <form action="user_code.php" method="POST" enctype="multipart/form-data">
                        <div class="in mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="user_fullname" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Full Name">
                            <?php if (isset($_SESSION['empty_user_fullname'])) {
                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_fullname'] . '</p>';
                                unset($_SESSION['empty_user_fullname']);
                            }
                            ?>
                        </div>
                        <div class="in mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="user_email" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Email">
                            <?php if (isset($_SESSION['empty_user_email'])) {
                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_email'] . '</p>';
                                unset($_SESSION['empty_user_email']);
                            }
                            ?>
                        </div>
                        <div class="in mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="user_password" class=" inputDesign w-100 py-2" placeholder="Enter Your Password">
                            <?php if (isset($_SESSION['empty_user_password'])) {
                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_password'] . '</p>';
                                unset($_SESSION['empty_user_password']);
                            }
                            ?>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="in mb-3">
                        <label class="form-label fw-semibold">User Type</label>
                        <select name="user_type" class="inputDesign py-2 w-100">
                            <option value="" selected>User Type</option>
                            <option value="Admin">Admin</option>
                            <option value="User"> User</option>
                        </select>
                        <?php if (isset($_SESSION['empty_user_type'])) {
                            echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_type'] . '</p>';
                            unset($_SESSION['empty_user_type']);
                        }
                        ?>
                    </div>
                    <div class="in mb-3">
                        <label class="form-label fw-semibold">Contact Number</label>
                        <input type="text" name="user_contact" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Contact Number">
                        <?php if (isset($_SESSION['empty_user_contact'])) {
                            echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_contact'] . '</p>';
                            unset($_SESSION['empty_user_contact']);
                        }
                        ?>
                        </span>
                    </div>
                    <div class="in">
                        <label class="form-label fw-semibold">Image</label>
                        <input type="file" name="user_image" id="image" class="inputDesign w-100 py-2">
                    </div>
                </div>
                <button type="submit" name="submit" class="save py-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";

?>