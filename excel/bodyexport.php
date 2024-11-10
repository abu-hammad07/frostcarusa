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
            /* max-width: max-content; */

        }

        th,
        td {
            padding: 0;
            border: 1px ridge black;

        }

        .last-th {
            /* max-width: max-content; */
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
                    <th class="fs-4" colspan="41">USA IMPORTANT Details</th>
                </tr>
                <tr>
                      <th>S/NO</th>
                                    <th>Year</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Wheelbase</th>
                                    <th>Vin #</th>
                                    <th>Contact Name</th>
                                    <th>Contact #</th>
                                     <th>Frost Car unit Cost</th>
                                    <th>FC Body</th>
                                    <th>Body Weight</th>
                                     <th>FC Model</th>
                                    <th>Exterior Dimension</th>
                                    <th>Compressor</th>
                                    <th>Comp.Serial</th>
                                    <th>Voltage</th>
                                    <th>Sound Decibel</th>
                                    <th>Current FLA</th>
                                    <th>Refrigerant</th>
                                    <th>Condenser</th>
                                    <th>Solenoid</th>
                                    <th>Condenser Fan</th>
                                    <th>Interior Lights</th>
                                    <th>Control Panel</th>
                                    <th>Circuit Breaker</th>
                                    <th>Electric Contactor</th>
                                    <th>Part #</th>
                                    <th>Eutectic Plate</th>
                                    <th>Expansion Valve</th>
                                    <th>Recovery Tank</th>
                                    <th>Pressure Control</th>
                                    <th>Sight Glass</th>
                                    <th>Filter Drier</th>
                                    <th>Thermostat</th>
                                    <th >Misc</th>
                                    <th >Air Curtains</th>
                                    <th >Back Camera</th>
                                    <th >Body Graphic_Warp</th>
                                    <th >Add Unit_Carrier</th>
                                    <th >Hand Truck_Stand</th>
                                    <th class="last-th">other</th>
                    
                   
                </tr>
            </thead>
            <tbody id="data-table">';

                            // Execute the query
                            $query = "SELECT * FROM unit_details";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $no = 1;
                                while ($item = mysqli_fetch_assoc($result)) {
                                    $html .= '<tr>';
                                    $html .= '<td class="font">' . $no++ . '</td>';
                                    $html .= '<td>' . $item['year'] . '</td>';
                                    $html .= '<td>' . $item['make'] . '</td>';
                                    $html .= '<td>' . $item['model'] . '</td>';
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
                                $html .= '<tr><td class="text-danger" colspan="35">Data not found</td></tr>';
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