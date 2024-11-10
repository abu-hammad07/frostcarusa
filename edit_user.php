<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != "Admin") {
    header('location: index.php');
    exit;
}
include 'config/config.php';
require './function/function.inc.php';
global $conn;
$name = '';
$user_email = '';
$user_type = '';
$user_contact = '';
if (isset($_GET['editid']) && $_GET['editid'] != '') {
    $id = get_safe_value($conn, $_GET['editid']); // Use $_GET to get 'id' parameter
    $res = mysqli_query($conn, "SELECT * FROM `admin_users` WHERE user_id = '$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['user_fullname'];
        $user_email = $row['user_email'];
        $user_type = $row['user_type'];
        $user_contact = $row['user_contact'];
    } else {
        redirect("uservewi.php", "Please Don't Change The URL!");
        exit();
    }
}

// ===================   Update Querry   =====================
if (isset($_POST['update'])) {
    $name = get_safe_value($conn, $_POST['user_fullname']);
    $user_email = get_safe_value($conn, $_POST['user_email']);
    $user_type = get_safe_value($conn, $_POST['user_type']);
    $user_contact = get_safe_value($conn, $_POST['user_contact']);

    $res_email = mysqli_query($conn, "SELECT * FROM `admin_users` WHERE `user_email` = '$user_email'");
    $check_email = mysqli_num_rows($res_email);
    if ($check_email > 0) {
        if (isset($_GET['editid']) && $_GET['editid'] != '') {
            $getData = mysqli_fetch_assoc($res_email);
            if ($id == $getData['user_id']) {
            } else {
                redirect("uservewi.php", "Email is already exist!");
                exit();
            }
        } else {
            redirect("uservewi.php", "Email is already exist!");
            exit();
        }
    } else {
        $res_contact = mysqli_query($conn, "SELECT * FROM `admin_users` WHERE `user_contact` = '$user_contact'");
        $check_contact = mysqli_num_rows($res_contact);
        if ($check_contact > 0) {
            if (isset($_GET['editid']) && $_GET['editid'] != '') {
                $getData = mysqli_fetch_assoc($res_contact);
                if ($id == $getData['user_id']) {
                } else {
                    redirect("uservewi.php", "Contact Number is already exist!");
                    exit();
                }
            } else {
                redirect("uservewi.php", "Contact Number is already exist!");
                exit();
            }
        }
    }

    if ($id == $id) {

        if (isset($_GET['editid']) && $_GET['editid'] != '') {
            $user_image = '';
            // Check if the 'front_S_Image' file is provided
            if ($_FILES['user_image']['name'] != '') {
                $user_image = rand(111111111, 999999999) . '_' . $_FILES['user_image']['name'];
                move_uploaded_file($_FILES['user_image']['tmp_name'], 'media/user_images/' . $user_image);
            }

            // Construct the SQL query
            $update_sql = "UPDATE `admin_users` SET `user_fullname` = '$name', `user_email` = '$user_email', `user_type` = '$user_type', 
            `user_contact` = '$user_contact'";

            // Add image fields to the query if they are provided
            if (!empty($user_image)) {
                $update_sql .= ", `user_image` = '$user_image'";
            }

            // Complete the query
            $update_sql .= ", `updated_on` = NOW(), `updated_by` = '{$_SESSION['user_fullname']}' WHERE `user_id` = '$id'";
            mysqli_query($conn, $update_sql);
        }
        redirect("uservewi.php", "Updated Successfully!");
        die();
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
        <h3 class=" font-inter text-center">Update User</h3>
        <div class="container-fluid course-card">
            <div class="row my-5 ">
                <div class="col-lg-6">
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="in mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="user_fullname" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Full Name" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                            echo $name;
                                                                                                                                                        } ?>">
                            <?php if (isset($_SESSION['empty_user_fullname'])) {
                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_fullname'] . '</p>';
                                unset($_SESSION['empty_user_fullname']);
                            }
                            ?>
                        </div>

                        <div class="in mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="user_email" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Email" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                        echo $user_email;
                                                                                                                                                    } ?>">
                            <?php if (isset($_SESSION['empty_user_email'])) {
                                echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_email'] . '</p>';
                                unset($_SESSION['empty_user_email']);
                            }
                            ?>
                        </div>

                        <div class="in mb-3">
                            <label class="form-label fw-semibold">User Type</label>
                            <select name="user_type" class="inputDesign py-2 w-100">
                                <option selected><?php if (isset($_GET['editid'])) {
                                                        echo $user_type;
                                                    } else {
                                                        
                                                    } ?></option>

                                <option value="Admin">Admin</option>
                                <option value="User"> User</option>
                                <?php if (isset($_SESSION['empty_user_type'])) {
                                    echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_type'] . '</p>';
                                    unset($_SESSION['empty_user_type']);
                                }
                                ?>
                            </select>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="in mb-3">
                        <label class="form-label fw-semibold">Contact Number</label>
                        <input type="text" name="user_contact" id="name" class=" inputDesign w-100 py-2" placeholder="Enter Your Contact Number" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                            echo $user_contact;
                                                                                                                                                        } ?>">
                        <?php if (isset($_SESSION['empty_user_contact'])) {
                            echo '
                                        <p class="text-danger">' . $_SESSION['empty_user_contact'] . '</p>';
                            unset($_SESSION['empty_user_contact']);
                        }
                        ?>
                    </div>
                    <div class="in">
                        <label class="form-label fw-semibold">Image</label>
                        <input type="file" name="user_image" id="image" class="inputDesign w-100 py-2">
                    </div>
                </div>
                <button type="submit" name="update" class="save py-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";

?>