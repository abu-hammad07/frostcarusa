<?php
// if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
//     header('location: login.php'); 
//     exit;
// }

if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header('location: login.php');
    exit;
}
// if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
//     header('location:index.php');
//     exit;
// } else {
//     header('location:login.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Frost Car Usa</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/alertify.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="css/alertifybootstrap.css" />

    <!-- --------------google font----------- -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="css/main.css">
</head>

<body class="sb-nav-fixed">


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-white shadow">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php"><img width="200px" src="assets/img/forscar_logo.png" alt=""></a>

        <!-- Sidebar Toggle-->
        <button class="btn text-black btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="text-dark fas fa-bars"></i></button>
        <!-- Navbar Search-->