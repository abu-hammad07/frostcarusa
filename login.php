<?php
session_start();
ob_start();
require './config/config.php';
global $conn;
$emailError = false;
$passError = false;
if (isset($_POST['submit'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $email_search = "SELECT * FROM admin_users WHERE user_email = '$user_email' AND is_verified = 'active' ";
    $query = mysqli_query($conn, $email_search);
    $email_count = mysqli_num_rows($query);
    if ($email_count) {
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['user_password'];
        $_SESSION['user_fullname'] = $email_pass['user_fullname'];
        $_SESSION['user_email'] = $email_pass['user_email'];
        $_SESSION['user_password'] = $email_pass['user_password'];
        $_SESSION['user_id'] = $email_pass['user_id'];
        $_SESSION['user_type'] = $email_pass['user_type'];
       
        $pass_decode = password_verify($user_password, $db_pass);
        $_SESSION['user_pass'] = $pass_decode;
        if ($pass_decode) {
            if (isset($_POST['rememberme'])) {
                
                setcookie('emailcookie', $user_email, time() + 86400);
                setcookie('passwordcookie', $user_password, time() + 86400);
                header('location:index.php');
            } else {
                header('location:index.php');
            }
            $_SESSION['login'] = true;
        } else {
            $passError = true;
        }
    } else {
        $emailError = true;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- costume css -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<style>
    .msg {
        height: 50px;
        border-radius: 10px;
        justify-content: center;
        text-align: center;
        padding-top: 10px;
    }
</style>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-6">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="index.html" class="text-nowrap logo-img text-center d-block mb-3 mt-3 w-100">
                                    <img src="./assets/img/forscar_logo.png" width="50%" alt="">
                                </a>
                                <div class="position-relative text-center my-4">
                                    <p class="fw-bolder mt-3 fs-3 px-3 d-inline-block bg-white text-dark z-index-5 position-relative">
                                        Login</p>
                                    <span class="border-bottom w-100 position-absolute start-50 z-index-5 translate-middle"></span>
                                </div>

                                <div>
                                    <p class="msg pb-5 text-white px-5 fs-5" style="background-color: #98A0A5; ">
                                        <?php
                                        if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                        } else {
                                            echo $_SESSION['msg'] = "You are logged Out. PLease login again.";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <?php
                                if ($passError == true) {
                                    echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>@Error!</strong> Incrorropt Password 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                }
                                if ($emailError == true) {
                                    echo '
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>@Error!</strong> Envelid Email
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                                }
                                ?>
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" class="w-100 inputDesign" id="" name="user_email" placeholder="User Email" value="<?php
                                                                                                                                                if (isset($_COOKIE['emailcookie'])) {
                                                                                                                                                    echo $_COOKIE['emailcookie'];
                                                                                                                                                }
                                                                                                                                                ?>">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" class="w-100 inputDesign" id="" name="user_password" placeholder="User Password" value="<?php
                                                                                                                                                        if (isset($_COOKIE['passwordcookie'])) {
                                                                                                                                                            echo $_COOKIE['passwordcookie'];
                                                                                                                                                        }
                                                                                                                                                        ?>">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" id="rememberme" name="rememberme">
                                            <label class="form-check-label text-dark" for="rememberme">
                                                Remeber me
                                            </label>
                                        </div>
                                        <a class="text-primary fw-medium" href="./recover_email.php">Forgot Password?</a>
                                    </div>
                                    <button name="submit" href="index.html" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap SJ -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>