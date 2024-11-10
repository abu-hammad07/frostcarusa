<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
include './config/config.php';
require './function/function.inc.php';
include "./includes/header.php";
include "./includes/searchbar.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";

?>
<div class="container-fluid px-4">
    <div class="card my-3 px-3 border-0 shadow">
        <h4 class="mt-4 text-muted">Dashboard</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item text-muted">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-primary h-100 py-2">
                    <div class="card-body ">
                        <div class="row no-gutters  align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bolder  text-primary text-uppercase mb-1">
                                    Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-muted"><?php echo getCount('admin_users'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card  border-primary h-100 py-2">
                    <div class="card-body ">
                        <div class="row no-gutters  align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bolder  text-primary text-uppercase mb-1">
                                    Total Company</div>
                                <div class="h5 mb-0 font-weight-bold text-muted"><?php echo getCount('importer_details'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck fa-2x text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card  border-primary h-100 py-2">
                    <div class="card-body ">
                        <div class="row no-gutters  align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs fw-bolder  text-primary text-uppercase mb-1">
                                    Total Body Details</div>
                                <div class="h5 mb-0 font-weight-bold text-muted"><?php echo getCount('unit_details'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck text-muted fa-2x "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row my-5">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 text-start py-3 px-4">
                            <p class="font student">Usa Frost Car Details</p>
                        </div>
                        <div class="col-lg-9 col-md-9 py-3 ">
                            <div class="btn-edit-delete1 text-end px-1">
                                <a href="./excel/complete_expro_file.php" id="export">
                                    <span class="fa-solid fa-cloud-arrow-down export export-btn"> </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr class="m-0 ">

                    <div class="dov">
                        <div class="table-wrapper">
                            <table class="contain-table">
                                <thead>
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
                                        <th>front_S_Image<i class="fa-solid fa-arrow-down px-2"></i></th>
                                        <th>back_S_Image<i class="fa-solid fa-arrow-down px-2"></i></th>
                                        <th>left_S_Image<i class="fa-solid fa-arrow-down px-2"></i></th>
                                        <th>right_S_Image<i class="fa-solid fa-arrow-down px-2"></i></th>
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
                                        <th>Other<i class="fa-solid fa-arrow-down px-2"></i></th>


                                    </tr>
                                </thead>

                                <tbody id="data-table">

                                    <?php
                                    $sql = "SELECT * FROM `unit_details`
                                    INNER JOIN `importer_details` ON unit_details.company_name = importer_details.company_name";
                                    $result = $conn->query($sql);
                                    $no = 1;
                                    if ($result->num_rows > 0) {
                                        // Output data of each row
                                        while ($item = $result->fetch_assoc()) {
                                    ?>
                                            <tr>



                                                <td class="font"><?= $no++; ?></td>
                                                <td class="searchable"><?= $item['company_name'] ?></td>
                                                <td><?= $item['company_contact'] ?></td>
                                                <td><?= $item['company_address'] ?></td>
                                                <td><?= $item['company_city'] ?></td>
                                                <td><?= $item['company_state'] ?></td>
                                                <td><?= $item['company_zipcode'] ?></td>
                                                <td><?= $item['company_telephone'] ?></td>
                                                <td><?= $item['company_email'] ?></td>
                                                <td><?= $item['company_direct'] ?></td>
                                                <td><?= $item['company_port_of_entry'] ?></td>
                                                <td><?= $item['company_vessel_detail'] ?></td>
                                                <td><?= $item['company_trucking'] ?></td>
                                                <td><?= $item['company_misc'] ?></td>
                                                <td><?= $item['total_cost'] ?></td>
                                                <td><?= $item['custom_frieght'] ?></td>
                                                <!-- unit_details -->


                                                <td><?= $item['year'] ?></td>
                                                <td><?= $item['make'] ?></td>
                                                <td class="searchable"><?= $item['model'] ?></td>
                                                <td><img height="50" width="50" src="./media/car_images/<?= $item['front_S_Image']; ?>"></td>
                                                <td><img height="50" width="50" src="./media/car_images/<?= $item['back_S_Image']; ?>"></td>
                                                <td><img height="50" width="50" src="./media/car_images/<?= $item['left_S_Image']; ?>"></td>
                                                <td><img height="50" width="50" src="./media/car_images/<?= $item['right_S_Image']; ?>"></td>
                                                <td><?= $item['wheelbase'] ?></td>
                                                <td><?= $item['vin'] ?></td>
                                                <td><?= $item['contact_Name'] ?></td>
                                                <td><?= $item['contact_Num'] ?></td>
                                                <td><?= $item['fc_Unit_Cost'] ?></td>
                                                <td><?= $item['fc_Body'] ?></td>
                                                <td><?= $item['body_Weight'] ?></td>
                                                <td><?= $item['fc_Model'] ?></td>
                                                <td><?= $item['exterior_Dimension'] ?></td>
                                                <td><?= $item['compressor'] ?></td>
                                                <td><?= $item['comp_Serial'] ?></td>
                                                <td><?= $item['voltage'] ?></td>
                                                <td><?= $item['sound_Decibel'] ?></td>
                                                <td><?= $item['current_FLA'] ?></td>
                                                <td><?= $item['refrigerant'] ?></td>
                                                <td><?= $item['condenser'] ?></td>
                                                <td><?= $item['solenoid'] ?></td>
                                                <td><?= $item['condenser_Fan'] ?></td>
                                                <td><?= $item['interior_Lights'] ?></td>
                                                <td><?= $item['control_Panel'] ?></td>
                                                <td><?= $item['circuit_Breaker'] ?></td>
                                                <td><?= $item['electric_Contactor'] ?></td>
                                                <td><?= $item['part'] ?></td>
                                                <td><?= $item['eutectic_Plate'] ?></td>
                                                <td><?= $item['expansion_Valve'] ?></td>
                                                <td><?= $item['recovery_Tank'] ?></td>
                                                <td><?= $item['pressure_Control'] ?></td>
                                                <td><?= $item['sight_Glass'] ?></td>
                                                <td><?= $item['filter_Drier'] ?></td>
                                                <td><?= $item['thermostat'] ?></td>
                                                <td><?= $item['misc'] ?></td>
                                                <td><?= $item['air_Curtains'] ?></td>
                                                <td><?= $item['back_Camera'] ?></td>
                                                <td><?= $item['body_Graphic_Warp'] ?></td>
                                                <td><?= $item['add_Unit_Carrier'] ?></td>
                                                <td><?= $item['hand_Truck_Stand'] ?></td>
                                                <td><?= $item['other'] ?></td>

                                            </tr>

                                    <?php  }
                                    } else {
                                        echo '
                                <tr>
                                <td colspan="70" class="text-danger">Data not found</td></tr>
                            ';
                                    } ?>


                                </tbody>

                            </table>
                            <div id="no-data-message" class="text-danger" style="display: none; padding: 10px;">Data Not Found</div>

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