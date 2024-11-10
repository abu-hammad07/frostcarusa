<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}

require './function/function.inc.php';
include "./config/config.php";


if (isset($_POST['add_truck_btn'])) {
    $year = get_safe_value($conn, $_POST['year']);
    $make = get_safe_value($conn, $_POST['make']);
    $company_name = mysqli_real_escape_string($conn, $_POST['company_name']);
    $model = get_safe_value($conn, $_POST['model']);
    $wheelbase = get_safe_value($conn, $_POST['wheelbase']);
    $vin = get_safe_value($conn, $_POST['vin']);
    $contact_Name = get_safe_value($conn, $_POST['contact_Name']);
    $contact_Num = get_safe_value($conn, $_POST['contact_Num']);
    $fc_Unit_Cost = get_safe_value($conn, $_POST['fc_Unit_Cost']);
    $fc_Body = get_safe_value($conn, $_POST['fc_Body']);
    $body_Weight = get_safe_value($conn, $_POST['body_Weight']);
    $fc_Model = get_safe_value($conn, $_POST['fc_Model']);
    $exterior_Dimension = get_safe_value($conn, $_POST['exterior_Dimension']);
    $compressor = get_safe_value($conn, $_POST['compressor']);
    $comp_Serial = get_safe_value($conn, $_POST['comp_Serial']);
    $voltage = get_safe_value($conn, $_POST['voltage']);
    $sound_Decibel = get_safe_value($conn, $_POST['sound_Decibel']);
    $current_FLA = get_safe_value($conn, $_POST['current_FLA']);
    $refrigerant = get_safe_value($conn, $_POST['refrigerant']);
    $condenser = get_safe_value($conn, $_POST['condenser']);
    $solenoid = get_safe_value($conn, $_POST['solenoid']);
    $condenser_Fan = get_safe_value($conn, $_POST['condenser_Fan']);
    $interior_Lights = get_safe_value($conn, $_POST['interior_Lights']);
    $control_Panel = get_safe_value($conn, $_POST['control_Panel']);
    $circuit_Breaker = get_safe_value($conn, $_POST['circuit_Breaker']);
    $electric_Contactor = get_safe_value($conn, $_POST['electric_Contactor']);
    $part = get_safe_value($conn, $_POST['part']);
    $eutectic_Plate = get_safe_value($conn, $_POST['eutectic_Plate']);
    $expansion_Valve = get_safe_value($conn, $_POST['expansion_Valve']);
    $recovery_Tank = get_safe_value($conn, $_POST['recovery_Tank']);
    $pressure_Control = get_safe_value($conn, $_POST['pressure_Control']);
    $sight_Glass = get_safe_value($conn, $_POST['sight_Glass']);
    $filter_Drier = get_safe_value($conn, $_POST['filter_Drier']);
    $thermostat = get_safe_value($conn, $_POST['thermostat']);
    $misc = get_safe_value($conn, $_POST['misc']);
    $air_Curtains = get_safe_value($conn, $_POST['air_Curtains']);
    $back_Camera = get_safe_value($conn, $_POST['back_Camera']);
    $body_Graphic_Warp = get_safe_value($conn, $_POST['body_Graphic_Warp']);
    $add_Unit_Carrier = get_safe_value($conn, $_POST['add_Unit_Carrier']);
    $hand_Truck_Stand = get_safe_value($conn, $_POST['hand_Truck_Stand']);
    $other = get_safe_value($conn, $_POST['other']);

    if (
        empty($model) || empty($company_name )|| empty($year)
    ) {
        if (empty($year)) {
            $_SESSION['empty_model'] = "Please fill in the model.";
        }
        if (empty($model)) {
            $_SESSION['empty_model'] = "Please fill in the model.";
        }
        if (empty($company_name)) {
            $_SESSION['empty_company_name'] = "Please fill in the Company Name.";
        }
        header("location:add-truck.php");
        exit();
    } else {

        $res_model = mysqli_query($conn, "SELECT * FROM `unit_details` WHERE `model` = '$model'");
        $check_model = mysqli_num_rows($res_model);
        if ($check_model > 0) {
            redirect("add-truck.php", "Model Already Exit");
            exit();
        } else {
            $front_S_Image = rand(111111111, 999999999) . '_' . $_FILES['front_S_Image']['name'];
            move_uploaded_file($_FILES['front_S_Image']['tmp_name'], 'media/car_images/' . $front_S_Image);

            $back_S_Image = rand(111111111, 999999999) . '_' . $_FILES['back_S_Image']['name'];
            move_uploaded_file($_FILES['back_S_Image']['tmp_name'], 'media/car_images/' . $back_S_Image);

            $left_S_Image = rand(111111111, 999999999) . '_' . $_FILES['left_S_Image']['name'];
            move_uploaded_file($_FILES['left_S_Image']['tmp_name'], 'media/car_images/' . $left_S_Image);

            $right_S_Image = rand(111111111, 999999999) . '_' . $_FILES['right_S_Image']['name'];
            move_uploaded_file($_FILES['right_S_Image']['tmp_name'], 'media/car_images/' . $right_S_Image);

            $sql = "INSERT INTO unit_details(`year`, `company_name`, `make`, `model`, `wheelbase`, `vin`, `contact_Name`, `contact_Num`, `fc_Unit_Cost`, 
        `fc_Body`, `body_Weight`, `fc_Model`, `exterior_Dimension`, `compressor`, `comp_Serial`, `voltage`, `sound_Decibel`, `current_FLA`, 
        `refrigerant`, `condenser`, `solenoid`, `condenser_Fan`, `interior_Lights`, `control_Panel`, `circuit_Breaker`, `electric_Contactor`, 
        `part`, `eutectic_Plate`, `expansion_Valve`, `recovery_Tank`, `pressure_Control`, `sight_Glass`, `filter_Drier`, `thermostat`, `misc`, `front_S_Image`, 
        `back_S_Image`, `left_S_Image`, `right_S_Image`, `air_Curtains`, `back_Camera`, `body_Graphic_Warp`, `add_Unit_Carrier`, `hand_Truck_Stand`, `other`, 
        `added_on`, `added_by`)
        VALUES ('$year', '$company_name', '$make', '$model', '$wheelbase', '$vin', '$contact_Name', '$contact_Num', 
        '$fc_Unit_Cost', '$fc_Body', '$body_Weight', '$fc_Model', '$exterior_Dimension', '$compressor', '$comp_Serial',
        '$voltage', '$sound_Decibel', '$current_FLA', '$refrigerant', '$condenser', '$solenoid', '$condenser_Fan', '$interior_Lights', 
        '$control_Panel', '$circuit_Breaker', '$electric_Contactor', '$part', '$eutectic_Plate', '$expansion_Valve', '$recovery_Tank',
        '$pressure_Control', '$sight_Glass', '$filter_Drier', '$thermostat', '$misc', '$front_S_Image', '$back_S_Image','$left_S_Image', 
        '$right_S_Image', '$air_Curtains', '$back_Camera', '$body_Graphic_Warp', '$add_Unit_Carrier', '$hand_Truck_Stand', '$other', 
        NOW(), '{$_SESSION['user_fullname']}')";

            $inset_qury_run = mysqli_query($conn, $sql);

            if ($inset_qury_run) {
                redirect("add-truck.php", "Data Insert Successfully!");
                $make = '';
                exit();
            } else {
                echo "error ";
            }
        }
    }
}

// $delete = [''];
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM `unit_details` WHERE id=$id ";
    $sql = mysqli_query($conn, $delete_query);
    if ($sql) {
        redirectdelete("add-truck.php", "Data Delete Successfully!");
        exit();
    } else {
        redirectdelete("add-truck.php", "Data Not Delete Successfully!");
    }
}
