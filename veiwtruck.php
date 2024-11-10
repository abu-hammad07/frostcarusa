<?php
session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
include './config/config.php';
require './function/function.inc.php';
global $conn;
include "./includes/header.php";
include "./includes/searchbar.php";
include "./includes/navbar.php";
include "./includes/sidebar.php";
?>
<div class="container-fluid px-4">
    <div class="row my-5">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="row">
                    <div class="col-lg-3 col-md-3 text-start py-3 px-4">
                        <p class="font student">Frost Car Usa Body Details</p>
                    </div>
                    <div class="col-lg-9 col-md-9 py-3 ">
                        <div class="btn-edit-delete1 text-end px-1">
                            <a href="./excel/bodyexport.php" id="export">
                                <span class="fa-solid fa-cloud-arrow-down export export-btn"> </span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="m-0 ">
                <div class="dov ">
                    <div class="table-wrapper">
                        <table class="contain-table">
                            <thead>
                                <tr>
                                    <th>S/NO<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Year<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Company Name<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Make<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Model<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Wheelbase<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Vin #<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Contact Name<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>View more<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Added ON<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Added BY<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Updated ON<i class="fa-solid fa-arrow-down px-2"></i></th>
                                    <th>Updated BY<i class="fa-solid fa-arrow-down px-2"></i></th>
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
                                            <td><?= $item['year'] ?></td>
                                            <td class="searchable"><?= $item['company_name'] ?></td>
                                            <td><?= $item['make'] ?></td>
                                            <td class="searchable"><?= $item['model'] ?></td>
                                            <td><?= $item['wheelbase'] ?></td>
                                            <td><?= $item['vin'] ?></td>
                                            <td><?= $item['contact_Num'] ?></td>
                                            <td class="text-center">
                                                <a href="viewmore.php?id=<?= $item['id'] ?>"><i class="fa-solid fa-eye text-primary fs-6"></i></a>
                                            </td>
                                            <td><?= $item['added_on'] ?></td>
                                            <td><?= $item['added_by'] ?></td>
                                            <td><?= $item['updated_on'] ?></td>
                                            <td><?= $item['updated_by'] ?></td>
                                        </tr>
                                <?php  }
                                } else {
                                    echo '
                                <tr>
                                <td class="text-danger">Data not found</td></tr>
                            ';
                                } ?>
                            </tbody>
                        </table>
                        <div id="no-data-message" class="text-danger" style="display: none; padding: 10px;">Data Not Found</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "./includes/footer.php";
?>