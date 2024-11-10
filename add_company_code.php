<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
require './function/function.inc.php';
include "./config/config.php";


// Check if the form is submitted

if (isset($_POST['add_company_btn'])) {
    $company_name = $_POST['company_name'];
    $company_contact = $_POST['company_contact'];
    $company_address = $_POST['company_address'];
    $company_city = $_POST['company_city'];
    $company_state = $_POST['company_state'];
    $company_zipcode = $_POST['company_zipcode'];
    $company_telephone = $_POST['company_telephone'];
    $company_email = $_POST['company_email'];
    $company_direct = $_POST['company_direct'];
    $company_port = $_POST['company_port'];
    $company_vessel = $_POST['company_vessel'];
    $company_trucking = $_POST['company_trucking'];
    $company_misc = $_POST['company_misc'];
    $total_cost = $_POST['total_cost'];
    $custom_freight = $_POST['custom_frieght'];


    $_SESSION['company_name'] = $company_name;
    if (
        empty($company_name) || empty($company_email)
    ) {
        if (empty($company_name)) {
            $_SESSION['empty_company_name'] = "Please fill in the Company Name.";
        }
        if (empty($company_email)) {
            $_SESSION['empty_company_email'] = "Please fill in the Company Email.";
        }
        header("location:company.php");
        exit();
    } else {

        $res_model = mysqli_query($conn, "SELECT * FROM importer_details WHERE `company_name` = '$company_name' AND importer_id <> '$id'");
        $check_model = mysqli_num_rows($res_model);
        if ($check_model > 0) {
            redirectdelete("company.php", "Company Name Already Exit");

            exit();
        }
        $res_model = mysqli_query($conn, "SELECT * FROM importer_details WHERE `company_email` = '$company_email' AND importer_id <> '$id'");
        $check_model = mysqli_num_rows($res_model);
        if ($check_model > 0) {
            redirectdelete("company.php", "Company Email Already Exit");

            exit();
        } else {
            $sql = "INSERT INTO importer_details (company_name, company_contact, company_address, company_city, company_state, company_zipcode, 
        company_telephone, company_email, company_direct, company_port_of_entry, company_vessel_detail, company_trucking, company_misc, total_cost, 
        custom_frieght , added_on ,added_by) VALUES ('$company_name', '$company_contact', '$company_address', '$company_city', '$company_state', '$company_zipcode', 
        '$company_telephone', '$company_email', '$company_direct', '$company_port', '$company_vessel', '$company_trucking', '$company_misc',
         '$total_cost', '$custom_freight' , NOW() , '{$_SESSION['user_fullname']}')";

            $inset_qury_run = mysqli_query($conn, $sql);

            if ($inset_qury_run) {
                $_SESSION['company_name'] = [""];
                redirect("company.php", "Data Insert Successfully!");
                exit();
                // header("location:company.php");
            } else {
                echo "error ";
            }
        }
    }
}



$delete = [''];
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM importer_details WHERE importer_id=$id ";
    $sql = mysqli_query($conn, $delete_query);

    if ($sql) {
        // Assuming your redirect function sets the session message correctly
        redirectdelete("company.php", "Data Delete Successfully!");

        exit(); // Add this line to stop executing the script after the redirect
    } else {
        echo 'Data not Delete Successfully!';
    }
}

if (isset($_POST['update_company_btn'])) {
    $id = $_POST['edit'];
    $company_name = $_POST['company_name'];
    $company_contact = $_POST['company_contact'];
    $company_address = $_POST['company_address'];
    $company_city = $_POST['company_city'];
    $company_state = $_POST['company_state'];
    $company_zipcode = $_POST['company_zipcode'];
    $company_telephone = $_POST['company_telephone'];
    $company_email = $_POST['company_email'];
    $company_direct = $_POST['company_direct'];
    $company_port = $_POST['company_port'];
    $company_vessel = $_POST['company_vessel'];
    $company_trucking = $_POST['company_trucking'];
    $company_misc = $_POST['company_misc'];
    $total_cost = $_POST['total_cost'];
    $custom_freight = $_POST['custom_frieght'];

    if (
        empty($company_name)
    ) {
        if (empty($company_name)) {
            $_SESSION['empty_company_name'] = "Please fill in the Company Name.";
        }
        header("location:company.php");
        exit();
    } else {

        $res_model = mysqli_query($conn, "SELECT * FROM importer_details WHERE `company_name` = '$company_name' AND importer_id <> '$id'");
        $check_model = mysqli_num_rows($res_model);
        if ($check_model > 0) {
            redirectdelete("company.php", "Company Name Already Exit");

            exit();
        }
        $res_model = mysqli_query($conn, "SELECT * FROM importer_details WHERE `company_email` = '$company_email' AND importer_id <> '$id'");
        $check_model = mysqli_num_rows($res_model);
        if ($check_model > 0) {
            redirectdelete("company.php", "Company Email Already Exit");

            exit();
        } else {

            $update = "UPDATE importer_details SET company_name='$company_name',
        `company_contact`='$company_contact',`company_address`='$company_address',`company_city`='$company_city',
        `company_state`='$company_state',`company_zipcode`='$company_zipcode',`company_telephone`='$company_telephone',
        `company_email`='$company_email',`company_direct`='$company_direct',`company_port_of_entry`='$company_port',
        `company_vessel_detail`='$company_vessel',`company_trucking`='$company_trucking',`company_misc`='$company_misc',
        `total_cost`='$total_cost',`custom_frieght`='$custom_freight',updated_on=NOW() , updated_by='{$_SESSION['user_fullname']}'
        WHERE importer_id='$id'";

            $qury = mysqli_query($conn, $update);
            if ($qury) {
                redirect("company.php", "Data Update Successfully!");
                exit();
            } else {
                redirectdelete("company.php", "Data error!");
            }
        }
    }
}
