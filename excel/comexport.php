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
                    <th class="fs-4" colspan="17">USA IMPORTANT Details</th>
                </tr>
                <tr>
                    <th>S/no</th>
                    <th>Company Name</th>
                    <th>Contact number</th>
                    <th>Address </th>
                    <th>City </th>
                    <th>State </th>
                    <th>Zip Code</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Direct </th>
                    <th>Port Of Entry </th>
                    <th>Vessel Details </th>
                    <th>Trucking </th>
                    <th>Misc </th>
                    <th>Total Cost </th>
                    <th class="last-th">Custom Freight </th>
                   
                </tr>
            </thead>
            <tbody id="data-table">';

                            // Execute the query
                            $query = "SELECT * FROM importer_details";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $no = 1;
                                while ($item = mysqli_fetch_assoc($result)) {
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
                                    $html .= '</tr>';
                                }
                            } else {
                                $html .= '<tr><td class="text-danger" colspan="18">Data not found</td></tr>';
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