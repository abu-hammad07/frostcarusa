<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
if ($_SESSION['user_type'] !== "Admin") {
    header("location:index.php");
}
require './function/function.inc.php';
include "./config/config.php";
// <!-- =============================== User Page Insert Query  ==================================== -->
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$error = array();
if (isset($_POST['submit'])) {
    $user_fullname = mysqli_real_escape_string($conn, $_POST['user_fullname']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $user_contact = mysqli_real_escape_string($conn, $_POST['user_contact']);
    $user_image = $_FILES['user_image']['name'];
    $image_temp_name = $_FILES['user_image']['tmp_name'];
    $image_folder = 'media/user_images/' . $user_image;
    $_SESSION['show_fullname'] = mysqli_real_escape_string($conn, $_POST['user_fullname']);
    $_SESSION['show_email'] = mysqli_real_escape_string($conn, $_POST['user_email']);
    $_SESSION['user_password'] = mysqli_real_escape_string($conn, $_POST['user_password']);
    $pass = password_hash($user_password, PASSWORD_BCRYPT);
    $token = bin2hex(random_bytes(15));
    if (
        empty($user_fullname) || empty($user_email) || empty($user_password) || empty($user_type) || empty($user_contact)
    ) {
        if (empty($user_fullname)) {
            $_SESSION['empty_user_fullname'] = "Please fill in the user_fullname.";
        }
        if (empty($user_email)) {
            $_SESSION['empty_user_email'] = "Please fill in the user_email.";
        }
        if (empty($user_password)) {
            $_SESSION['empty_user_password'] = "Please fill in the user_password.";
        }
        if (empty($user_type)) {
            $_SESSION['empty_user_type'] = "Please fill in the user_type.";
        }
        if (empty($user_contact)) {
            $_SESSION['empty_user_contact'] = "Please fill in the user_contact.";
        }
        header("location:user.php");
        exit();
    } else {
        // Password complexity validation
        if (strlen($user_password) < 8) {
            $_SESSION['error_messege'] = "Password should be at least 8 characters long.";
            header("location:user.php");
        } else {
            $emailquery = "SELECT * FROM `admin_users` WHERE `user_email` = '$user_email'";
            $query = mysqli_query($conn, $emailquery);
            $emailcount = mysqli_num_rows($query);
            if ($emailcount > 0) {
                redirectdelete("user.php", "Email already exists");
            } else {
                $contactquery = "SELECT * FROM `admin_users` WHERE `user_contact` = '$user_contact'";
                $query = mysqli_query($conn, $contactquery);
                $contactcount = mysqli_num_rows($query);
                if ($contactcount > 0) {
                    redirectdelete("user.php", "Contact Number already exists");
                } else {
                    $insertquery = "INSERT INTO `admin_users` (`user_fullname`, `user_email`, `user_password`, `user_type`, `user_contact`, `user_image`, `registered_on`, `token`, `is_verified`, `added_by`, `added_on`) 
                        VALUES ('$user_fullname', '$user_email', '$pass', '$user_type', '$user_contact', '$user_image', NOW(), '$token', 'Inactive', '{$_SESSION['user_fullname']}', NOW())";
                    $iquery = mysqli_query($conn, $insertquery);
                    if ($iquery) {
                        $mail = new PHPMailer(true);
                        try {
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = 'hammadking427@gmail.com';
                            $mail->Password = 'gtohfmaaanqufdbn';
                            $mail->SMTPSecure = 'tls';
                            $mail->Port = 587;
                            $mail->setFrom('hammadking427@gmail.com', 'Abu_Hammad');
                            $mail->addAddress($user_email, $user_fullname);
                            $mail->Subject = 'Email Verification Required for Frostcar USA Admin Portal';
                            // Include the email content from email.php
                            include('email.php');
                            // Replace placeholders with actual values
                            $emailContent = str_replace('$user_fullname', $user_fullname, $emailContent);
                            $emailContent = str_replace('$token', $token, $emailContent);
                            // Set the email content as HTML
                            $mail->isHTML(true);
                            $mail->Body = $emailContent;
                            $mail->send();
                            move_uploaded_file($image_temp_name, $image_folder);
                            redirect("user.php", "Please Check The Gmail And Activate!");
                            $_SESSION['msg'] = "Check your mail to activate your account $user_email";
                        } catch (Exception $e) {
                            echo "Failed to send email. Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        redirectdelete("user.php", "Not Inserted");
                    }
                }
            }
        }
    }
}

// <!-- =============================== User Page Delete Query  ==================================== -->
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM `admin_users` WHERE user_id=$id ";
    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        // Assuming your redirect function sets the session message correctly
        redirectdelete("uservewi.php", "Data Delete Successfully!");

        exit(); // Add this line to stop executing the script after the redirect
    } else {
        redirectdelete("uservewi.php", "Data Not Delete Successfully!");
    }
}
