<?php
session_start();
include "../config/config.php";
if (!isset($_SESSION['user_fullname'])) {
    echo "You are logged out";
    header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />

    <title>Usa Frost Car</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {

            border: 1px ridge black;
        }

        .last-th {
            border-right: 1px solid black;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <form action="add_company_code.php" method="post">
            <div class="row my-5">
                <div class="col-lg-12 ">
                    <div class="card">


                        <div class="dov ">
                            <?php
                            // Create a table in HTML and set it as a variable
                            $html = '<table class="contain-table">
            <thead>
                <tr>
                    <th class="fs-4" colspan="56">USA FROST CAR DETELES</th>
                </tr>
                <tr>

                <th>S/NO<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Company Name<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Contact number<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Address <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>City <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>State <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Zipe Code<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Tele Phone<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Email<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Direct <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Port Of Entry <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Vessel Details <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Trucking <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Misc <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Total Cost <i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Custom Frieght <i class="fa-solid fa-arrow-down px-2"></i></th>
                <!-- unit_details -->



                <th>Year<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Make<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Model<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Wheelbase<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Vin #<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Contact Name<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Contact # Number<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Frost Car unit Cost<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>FC Body<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Body Weight<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>FC Model<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Exterior Dimension<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Compressor<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Comp.Serial<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Voltage<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Sound Decibel<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Current FLA<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Refrigerant<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Condenser<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Solenoid<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Condenser Fan<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Interior Lights<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Control Panel<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Circuit Breaker<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Electric Contactor<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Part #<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Eutectic Plate<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Expansion Valve<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Recovery Tank<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Pressure Control<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Sight Glass<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Filter Drier<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Thermostat<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Misc<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Air Curtains<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Back Camera<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Body Graphic Warp<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Add Unit Carrier<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th>Hand Truck Stand<i class="fa-solid fa-arrow-down px-2"></i></th>
                <th class="last-th">Other<i class="fa-solid fa-arrow-down px-2"></i></th>


            </tr>
            </thead>
            <tbody id="data-table">';

                            // Execute the query
                            $sql = "SELECT * FROM `unit_details`
                                    INNER JOIN `importer_details` ON unit_details.company_name = importer_details.company_name";
                            $result = $conn->query($sql);
                            $no = 1;
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($item = $result->fetch_assoc()) {
                                    $html .= '<tr>';
                                    $html .= '<td class="font">' . $no++ . '</td>';
                                    $html .= '<td>' . $item['company_name'] . '</td>';
                                    $html .= '<td>' . $item['company_contact'] . '</td>';
                                    $html .= '<td>' . $item['company_address'] . '</td>';
                                    $html .= '<td>' . $item['company_city'] . '</td>';
                                    $html .= '<td>' . $item['company_state'] . '</td>';
                                    $html .= '<td>' . $item['company_zipcode'] . '</td>';
                                    $html .= '<td>' . $item['company_telephone'] . '</td>';
                                    $html .= '<td>' . $item['company_email'] . '</td>';
                                    $html .= '<td>' . $item['company_direct'] . '</td>';
                                    $html .= '<td>' . $item['company_port_of_entry'] . '</td>';
                                    $html .= '<td>' . $item['company_vessel_detail'] . '</td>';
                                    $html .= '<td>' . $item['company_trucking'] . '</td>';
                                    $html .= '<td>' . $item['company_misc'] . '</td>';
                                    $html .= '<td>' . $item['total_cost'] . '</td>';
                                    $html .= '<td>' . $item['custom_frieght'] . '</td>';

                                    $html .= '<td>' . $item['model'] . '</td>';
                                    $html .= '<td>' . $item['year'] . '</td>';
                                    $html .= '<td>' . $item['make'] . '</td>';
                                    $html .= '<td>' . $item['wheelbase'] . '</td>';
                                    $html .= '<td>' . $item['vin'] . '</td>';
                                    $html .= '<td>' . $item['contact_Name'] . '</td>';
                                    $html .= '<td>' . $item['contact_Num'] . '</td>';
                                    $html .= '<td>' . $item['fc_Unit_Cost'] . '</td>';
                                    $html .= '<td>' . $item['fc_Body'] . '</td>';
                                    $html .= '<td>' . $item['body_Weight'] . '</td>';
                                    $html .= '<td>' . $item['fc_Model'] . '</td>';
                                    $html .= '<td>' . $item['exterior_Dimension'] . '</td>';
                                    $html .= '<td>' . $item['compressor'] . '</td>';
                                    $html .= '<td>' . $item['comp_Serial'] . '</td>';
                                    $html .= '<td>' . $item['voltage'] . '</td>';
                                    $html .= '<td>' . $item['sound_Decibel'] . '</td>';
                                    $html .= '<td>' . $item['current_FLA'] . '</td>';
                                    $html .= '<td>' . $item['refrigerant'] . '</td>';
                                    $html .= '<td>' . $item['condenser'] . '</td>';
                                    $html .= '<td>' . $item['solenoid'] . '</td>';
                                    $html .= '<td>' . $item['condenser_Fan'] . '</td>';
                                    $html .= '<td>' . $item['interior_Lights'] . '</td>';
                                    $html .= '<td>' . $item['control_Panel'] . '</td>';
                                    $html .= '<td>' . $item['circuit_Breaker'] . '</td>';
                                    $html .= '<td>' . $item['electric_Contactor'] . '</td>';
                                    $html .= '<td>' . $item['part'] . '</td>';
                                    $html .= '<td>' . $item['eutectic_Plate'] . '</td>';
                                    $html .= '<td>' . $item['expansion_Valve'] . '</td>';
                                    $html .= '<td>' . $item['recovery_Tank'] . '</td>';
                                    $html .= '<td>' . $item['pressure_Control'] . '</td>';
                                    $html .= '<td>' . $item['sight_Glass'] . '</td>';
                                    $html .= '<td>' . $item['filter_Drier'] . '</td>';
                                    $html .= '<td>' . $item['thermostat'] . '</td>';
                                    $html .= '<td>' . $item['misc'] . '</td>';
                                    $html .= '<td>' . $item['air_Curtains'] . '</td>';
                                    $html .= '<td>' . $item['back_Camera'] . '</td>';
                                    $html .= '<td>' . $item['body_Graphic_Warp'] . '</td>';
                                    $html .= '<td>' . $item['add_Unit_Carrier'] . '</td>';
                                    $html .= '<td>' . $item['hand_Truck_Stand'] . '</td>';
                                    $html .= '<td>' . $item['other'] . '</td>';
                                    $html .= '</tr>';
                                }
                            } else {
                                $html .= '<tr><td class="text-danger" colspan="57">Data not found</td></tr>';
                            }

                            // Close the HTML table
                            $html .= '</tbody></table>';

                            // Set the appropriate headers for Excel download
                            header('Content-Type: application/vnd.ms-excel');
                            header('Content-Disposition: attachment; filename=FrostCarUsa.xls');

                            // Output the HTML content
                            echo $html;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>







</body>

</html>