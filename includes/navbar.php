<?php
include './config/config.php';
global $conn;
// session_start();
?>
<?php
$select = "SELECT * FROM `admin_users` WHERE `user_email` = '{$_SESSION['user_email']}'";
$result = mysqli_query($conn, $select);
$res_num = mysqli_num_rows($result);

$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user_image'] = $row['user_image'];
    $_SESSION['user_contact'] = $row['user_contact'];
    $_SESSION['user_email'] = $row['user_email'];
?>
    <!-- Navbar-->
    <ul class="navbar-nav  ms-auto me-0 me-md-3 my-2 my-md-0   ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark " id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle" height="25" width="25" src="media/user_images/<?php echo $_SESSION['user_image']; ?>" alt="">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li class="dropdown-item">
                    <h6 class="mt-0 mb-0"><b>Name</b></h6>
                    <p class="my-0 py-0"><?php echo $_SESSION['user_fullname']; ?></p>
                </li>
                <li class="dropdown-item">
                    <h6 class="my-0 py-0"><b>Email</b></h6>
                    <p class="my-0 py-0"><?php echo $_SESSION['user_email']; ?></p>
                </li>
                <li class="dropdown-item py-1 my-0">
                    <a href="./profile.php" class="text-dark text-decoration-none fw-bolder">Profile</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
        </li>

    <?php } ?>
    </ul>
    </nav>