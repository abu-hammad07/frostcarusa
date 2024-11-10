<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
include './config/config.php';
require './function/function.inc.php';
global $conn;
include "./includes/header.php";
include "./includes/serchform.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";
?>
<div class="container-fluid ">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card mt-3 py-5">
            <h3 class=" font-inter text-center">Edit Profile</h3>
            <?php
            $select = "SELECT * FROM `admin_users` WHERE `user_email` = '{$_SESSION['user_email']}'";
            $result = mysqli_query($conn, $select);
            $res_num = mysqli_num_rows($result);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_image'] = $row['user_image'];
                $_SESSION['user_contact'] = $row['user_contact'];
                $_SESSION['user_email'] = $row['user_email'];
            ?>
                <div class="row px-5 ">
                    <div class="text-center my-3">
                        <img class="rounded-circle" height="150" width="150" src="media/user_images/<?php echo $_SESSION['user_image']; ?>" alt="">
                    </div>
                    <div class="col-lg-6">
                        <label for="name" class="form-label fw-semibold">Name:</label>
                        <input disabled class="w-100 inputDesign" placeholder="<?php echo $_SESSION['user_fullname']; ?>">
                        <label for="user_contact" class="form-label fw-semibold mt-3">Contact Number</label>
                        <input disabled class="w-100 inputDesign" id="user_contact" name="user_contact" placeholder="<?php echo $_SESSION['user_contact']; ?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="email" class="form-label fw-semibold ">Email</label>
                        <input disabled class="w-100 inputDesign" id="email" placeholder="<?php echo $_SESSION['user_email']; ?>">
                        <div class="my-5 text-end">
                            <a href="edit_profile.php?editid=<?= $row['user_id'] ?>" name="edit" class="btn btn-primary px-3">
                                <i class="fa-solid fa-pen-to-square text-white  fs-5"></i> Edit</a>
                        <?php
                    } ?>
                        </div>
                    </div>
                </div>
        </div>
    </form>
</div>
<?php
include "./includes/footer.php";
?>