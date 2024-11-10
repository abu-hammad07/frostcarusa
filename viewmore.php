<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
include './config/config.php';
require './function/function.inc.php';
include "./includes/header.php";
include "./includes/serchform.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `unit_details`
    INNER JOIN `importer_details` ON unit_details.company_name = importer_details.company_name
    WHERE unit_details.id = $id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output the details of the specific row
        $fach = $result->fetch_assoc();

        // Now you have data from both databases
        // You can access $fach for "unit_details" data and $importer_data for "importer_details" data
        $id = $fach['id'];
        $year = $fach['year'];
        $make = $fach['make'];
        $model = $fach['model'];
        $wheelbase = $fach['wheelbase'];
        $vin = $fach['vin'];
        $contact_Name = $fach['contact_Name'];
        $contact_Num = $fach['contact_Num'];
        $fc_Unit_Cost = $fach['fc_Unit_Cost'];
        $fc_Body = $fach['fc_Body'];
        $body_Weight = $fach['body_Weight'];
        $fc_Model = $fach['fc_Model'];
        $exterior_Dimension = $fach['exterior_Dimension'];
        $compressor = $fach['compressor'];
        $comp_Serial = $fach['comp_Serial'];
        $voltage = $fach['voltage'];
        $sound_Decibel = $fach['sound_Decibel'];
        $current_FLA = $fach['current_FLA'];
        $refrigerant = $fach['refrigerant'];
        $condenser = $fach['condenser'];
        $solenoid = $fach['solenoid'];
        $condenser_Fan = $fach['condenser_Fan'];
        $interior_Lights = $fach['interior_Lights'];
        $control_Panel = $fach['control_Panel'];
        $circuit_Breaker = $fach['circuit_Breaker'];
        $electric_Contactor = $fach['electric_Contactor'];
        $part = $fach['part'];
        $eutectic_Plate = $fach['eutectic_Plate'];
        $expansion_Valve = $fach['expansion_Valve'];
        $recovery_Tank = $fach['recovery_Tank'];
        $pressure_Control = $fach['pressure_Control'];
        $sight_Glass = $fach['sight_Glass'];
        $filter_Drier = $fach['filter_Drier'];
        $thermostat = $fach['thermostat'];
        $misc = $fach['misc'];
        $air_Curtains = $fach['air_Curtains'];
        $back_Camera = $fach['back_Camera'];
        $body_Graphic_Warp = $fach['body_Graphic_Warp'];
        $add_Unit_Carrier = $fach['add_Unit_Carrier'];
        $hand_Truck_Stand = $fach['hand_Truck_Stand'];
        $other = $fach['other'];
        $fron_image = $fach['front_S_Image'];
        $back_S_Image = $fach['back_S_Image'];
        $left_S_Image = $fach['left_S_Image'];
        $right_S_Image = $fach['right_S_Image'];
        // $importer_data for "importer_details" data
        $importer_id = $fach['importer_id'];
        $company_name = $fach['company_name'];
        $company_contact = $fach['company_contact'];
        $company_address = $fach['company_address'];
        $company_city = $fach['company_city'];
        $company_state = $fach['company_state'];
        $company_zipcode = $fach['company_zipcode'];
        $company_telephone = $fach['company_telephone'];
        $company_email = $fach['company_email'];
        $company_direct = $fach['company_direct'];
        $company_port = $fach['company_port_of_entry'];
        $company_vessel = $fach['company_vessel_detail'];
        $company_trucking = $fach['company_trucking'];
        $company_misc = $fach['company_misc'];
        $total_cost = $fach['total_cost'];
        $custom_freight = $fach['custom_frieght'];

        // $importer_data for "importer_details" data

    } else {
        // Handle case when no data is found in "importer_details" database
        echo "Something Went Wrong importer_details";
    }
} else {
    // Handle case when no data is found in "unit_details" database
    echo "Something Went Wrong unit_details";
}
// }



?>
<div class="container-fluid ">
    <div class="card border-0 shadow mt-5 py-5">
        <div class="row px-5">
            <div class="col-9">
                <h3 class="mb-5">COMPANY DETAILS</h3>
            </div>
            <div class="col-3 text-end">

                <a href="edit_company.php?editid=<?= $importer_id ?>" name="edit" class="btn btn-primary">Edit</a>
                <!-- <a href="edit_truck.php?editid=<?= $id ?>" name="edit" class="btn btn-primary">Edit</a> -->
            </div>
        </div>
        <div class="row px-5">
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Name:</label>
                    <div class=" pt-2">
                        <p><?= $company_name ?><?php if (empty($company_name)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Contact:</label>
                    <div class=" pt-2">
                        <p><?= $company_contact ?><?php if (empty($company_contact)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Address:</label>
                    <div class=" pt-2">
                        <p><?= $company_address ?><?php if (empty($company_address)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company City:</label>
                    <div class=" pt-2">
                        <p><?= $company_city ?><?php if (empty($company_city)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company State:</label>
                    <div class=" pt-2">
                        <p><?= $company_state ?><?php if (empty($company_state)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Zipcode:</label>
                    <div class=" pt-2">
                        <p><?php if (empty($company_zipcode)) {
                                echo "------";
                            } else {
                                echo $company_zipcode;
                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Telephone:</label>
                    <div class=" pt-2">
                        <p><?= $company_telephone ?><?php if (empty($company_telephone)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Email:</label>
                    <div class=" pt-2">
                        <p><?= $company_email ?><?php if (empty($company_email)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Direct:</label>
                    <div class=" pt-2">
                        <p><?= $company_direct ?><?php if (empty($company_direct)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Port:</label>
                    <div class=" pt-2">
                        <p><?= $company_port ?><?php if (empty($company_port)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Vessel:</label>
                    <div class=" pt-2">
                        <p><?= $company_vessel ?><?php if (empty($company_vessel)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Trucking:</label>
                    <div class=" pt-2">
                        <p><?= $company_trucking ?><?php if (empty($company_trucking)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Company Misc:</label>
                    <div class=" pt-2">
                        <p><?= $company_misc ?><?php if (empty($company_misc)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Total Cost:</label>
                    <div class=" pt-2">
                        <p><?= $total_cost ?><?php if (empty($total_cost)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Custom Freight:</label>
                    <div class=" pt-2">
                        <p><?= $custom_freight ?><?php if (empty($custom_freight)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mt-5 py-5">
        <div class="row px-5">
            <div class="col-9">
                <h3 class="mb-5">TRUCK DETAILS</h3>
            </div>
            <div class="col-3 text-end">
                <a href="edit_truck.php?editid=<?= $id ?>" name="edit" class="btn btn-primary">Edit</a>
            </div>
        </div>
        <div class="row px-5">
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Year:</label>
                    <div class=" pt-2">
                        <p><?= $year ?><?php if (empty($year)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Mack:</label>
                    <div class="pt-2">
                        <p><?= $make ?><?php if (empty($make)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Modal:</label>
                    <div class="pt-2">
                        <p><?= $model ?><?php if (empty($model)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Wheelbase:</label>
                    <div class="pt-2">
                        <p><?= $wheelbase ?><?php if (empty($wheelbase)) {
                                                echo "------";
                                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Vin #:</label>
                    <div class="pt-2">
                        <p><?= $vin ?><?php if (empty($vin)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Contact Name:</label>
                    <div class="pt-2">
                        <p><?= $contact_Name ?><?php if (empty($contact_Name)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Contact #:</label>
                    <div class="pt-2">
                        <p><?= $contact_Num ?><?php if (empty($contact_Num)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Frost Car unit Cost:</label>
                    <div class="pt-2">
                        <p><?= $fc_Unit_Cost ?><?php if (empty($fc_Unit_Cost)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">FC Body:</label>
                    <div class="pt-2">
                        <p><?= $fc_Body ?><?php if (empty($fc_Body)) {
                                                echo "------";
                                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Body Weight:</label>
                    <div class="pt-2">
                        <p><?= $body_Weight ?><?php if (empty($body_Weight)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">FC Model:</label>
                    <div class="pt-2">
                        <p><?= $fc_Model ?><?php if (empty($fc_Model)) {
                                                echo "------";
                                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Exterior Dimension:</label>
                    <div class="pt-2">
                        <p><?= $exterior_Dimension ?><?php if (empty($exterior_Dimension)) {
                                                            echo "------";
                                                        } ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Compressor:</label>
                    <div class="pt-2">
                        <p><?= $compressor ?><?php if (empty($compressor)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Comp.Serial:</label>
                    <div class="pt-2">
                        <p><?= $comp_Serial ?><?php if (empty($comp_Serial)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Voltage:</label>
                    <div class="pt-2">
                        <p><?= $voltage ?><?php if (empty($voltage)) {
                                                echo "------";
                                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Sound Decibel:</label>
                    <div class="pt-2">
                        <p><?= $sound_Decibel ?><?php if (empty($sound_Decibel)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Current FLA:</label>
                    <div class="pt-2">
                        <p><?= $current_FLA ?><?php if (empty($current_FLA)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Refrigerant:</label>
                    <div class="pt-2">
                        <p><?= $refrigerant ?><?php if (empty($refrigerant)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Condenser:</label>
                    <div class="pt-2">
                        <p><?= $condenser ?><?php if (empty($condenser)) {
                                                echo "------";
                                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Solenoid:</label>
                    <div class="pt-2">
                        <p><?= $solenoid ?><?php if (empty($solenoid)) {
                                                echo "------";
                                            } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Condenser Fan:</label>
                    <div class="pt-2">
                        <p><?= $condenser_Fan ?><?php if (empty($condenser_Fan)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Interior Lights:</label>
                    <div class="pt-2">
                        <p><?= $interior_Lights ?><?php if (empty($interior_Lights)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Control Panel:</label>
                    <div class="pt-2">
                        <p><?= $control_Panel ?><?php if (empty($control_Panel)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Circuit Breaker:</label>
                    <div class="pt-2">
                        <p><?= $circuit_Breaker ?><?php if (empty($circuit_Breaker)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Electric Contactor:</label>
                    <div class="pt-2">
                        <p><?= $electric_Contactor ?><?php if (empty($electric_Contactor) || !isset($electric_Contactor)) {
                                                            echo "------";
                                                        } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Part #:</label>
                    <div class="pt-2">
                        <p><?= $part ?><?php if (empty($part)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Eutectic Plate:</label>
                    <div class="pt-2">
                        <p><?= $eutectic_Plate ?><?php if (empty($eutectic_Plate)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Expansion Valve:</label>
                    <div class="pt-2">
                        <p><?= $expansion_Valve ?><?php if (empty($expansion_Valve)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Recovery Tank:</label>
                    <div class="pt-2">
                        <p><?= $recovery_Tank ?><?php if (empty($recovery_Tank)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Pressure Control:</label>
                    <div class="pt-2">
                        <p><?= $pressure_Control ?><?php if (empty($pressure_Control)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Sight Glass:</label>
                    <div class="pt-2">
                        <p><?= $sight_Glass ?><?php if (empty($sight_Glass)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Filter Drier:</label>
                    <div class="pt-2">
                        <p><?= $filter_Drier ?><?php if (empty($filter_Drier)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Thermostat:</label>
                    <div class="pt-2">
                        <p><?= $thermostat ?><?php if (empty($thermostat)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4 ">
                    <label for="" class="fw-bold text-muted">Misc:</label>
                    <div class="pt-2">
                        <p><?= $misc ?><?php if (empty($misc)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row px-5">
            <div class="col-9">
                <h3 class="mb-5">Additional Accessories:</h3>
            </div>
        </div>
        <div class="row px-5">
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Air Curtains:</label>
                    <div class=" pt-2">
                        <p><?= $air_Curtains ?><?php if (empty($air_Curtains)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Back Camera:</label>
                    <div class=" pt-2">
                        <p><?= $back_Camera ?><?php if (empty($back_Camera)) {
                                                    echo "------";
                                                } ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Body Graphic Warp:</label>
                    <div class=" pt-2">
                        <p><?= $body_Graphic_Warp ?><?php if (empty($body_Graphic_Warp)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Add Unit Carrier:</label>
                    <div class=" pt-2">
                        <p><?= $add_Unit_Carrier ?><?php if (empty($add_Unit_Carrier)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Hand Truck Stand:</label>
                    <div class=" pt-2">
                        <p><?= $hand_Truck_Stand ?><?php if (empty($hand_Truck_Stand)) {
                                                        echo "------";
                                                    } ?></p>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="" class="fw-bold text-muted">Other:</label>
                    <div class=" pt-2">
                        <p><?= $other ?><?php if (empty($other)) {
                                            echo "------";
                                        } ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mt-5 py-5">
        <div class="row px-5 ">
            <h3 class="mb-3">IMAGE TRUCK</h3>
            <div class="row">
                <div class="col-lg-3 my-3 ">
                    <div class="card">
                        <img src="./media/car_images/<?= $fron_image ?>" class="" height="200px" alt="<?php if (empty($fron_image)) {
                                                                                                            echo "Image not Upload";
                                                                                                        } else {
                                                                                                            echo "Truck Front Side Image";
                                                                                                        } ?>">
                        <div class="card-footer bg-primary text-center ">
                            <p class="text-light fw-bold">Truck Front Side Image</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3 ">
                    <div class="card">
                        <img src="./media/car_images/<?= $back_S_Image ?>" height="200px" class="" alt="<?php if (empty($back_S_Image)) {
                                                                                                            echo "Image not Upload";
                                                                                                        } else {
                                                                                                            echo "Truck Back Side Image";
                                                                                                        } ?>">
                        <div class="card-footer bg-primary text-center ">
                            <p class="text-light fw-bold">Truck Back Side Image</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3 ">
                    <div class="card">
                        <img src="./media/car_images/<?= $left_S_Image ?>" height="200px" class="" alt="<?php if (empty($left_S_Image)) {
                                                                                                            echo "Image not Upload";
                                                                                                        } else {
                                                                                                            echo "Truck Left Side Image";
                                                                                                        } ?>">
                        <div class="card-footer bg-primary text-center ">
                            <p class="text-light fw-bold"> Truck Left Side Image</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 my-3 ">
                    <div class="card">
                        <img src="./media/car_images/<?= $right_S_Image ?>" height="200px" class="" alt="<?php if (empty($right_S_Image)) {
                                                                                                                echo "Image not Upload";
                                                                                                            } else {
                                                                                                                echo "Truck Right Side Image";
                                                                                                            } ?>">
                        <div class="card-footer bg-primary text-center ">
                            <p class="text-light fw-bold">Truck Right Side Image</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>