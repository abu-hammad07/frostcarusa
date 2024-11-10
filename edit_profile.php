<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
include 'config/config.php';

require './function/function.inc.php';

if (isset($_GET['editid']) && $_GET['editid'] != '') {
    $id = get_safe_value($conn, $_GET['editid']); // Use $_GET to get 'id' parameter
    $res = mysqli_query($conn, "SELECT * FROM `admin_users` WHERE `user_email` = '{$_SESSION['user_email']}'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $user_contact = $row['user_contact'];
    } else {
        // echo "Please Don't Change The URL!";
        redirect("profile.php", "Please Don't Change The URL!");
        // exit();
    }
}



// ===================   Update Querry   =====================

if (isset($_POST['update'])) {
    $user_contact = mysqli_real_escape_string($conn, $_POST['user_contact']);

    if ($_FILES['user_image']['name']) {
        // If a new image is uploaded, update the user_image field
        $user_image = rand(111111111, 999999999) . '_' . $_FILES['user_image']['name'];
        move_uploaded_file($_FILES['user_image']['tmp_name'], 'media/user_images/' . $user_image);
        $update_query = "UPDATE `admin_users` SET `user_contact` = '$user_contact', `user_image` = '$user_image' 
                        WHERE `user_email` = '{$_SESSION['user_email']}'";
    } else {
        // If no new image is uploaded, retain the existing image in the database
        $update_query = "UPDATE `admin_users` SET `user_contact` = '$user_contact' 
                        WHERE `user_email` = '{$_SESSION['user_email']}'";
    }

    $sql = mysqli_query($conn, $update_query);

    if ($sql) {
        redirect("profile.php", "Updated Successfully!");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



?>


<?php
include "./includes/header.php";
include "./includes/serchform.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";
?>
<div class="container-fluid mt-3">


    <div class="card  my-5 mein-card mb-5">
        <h3 class=" font-inter text-center">Update Profile</h3>
        <div class="container-fluid course-card">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row my-5 ">

                    <div class="col-lg-6">

                        <div class="in mb-3">
                            <label class="form-label fw-semibold">Contact Number</label>
                            <input type="text" name="user_contact" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Contact Number" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                echo $user_contact;
                                                                                                                                                            } ?>">
                        </div>

                        <div class=" mt-4">
                            <button type="submit" name="update" class="btn btn-primary py-2">Update Profile</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="in">
                            <label class="form-label fw-semibold">Image</label>
                            <input type="file" name="user_image" id="image" class="inputDesign w-100 py-2">
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php
include "./includes/footer.php";

?>