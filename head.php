<?php

<<<<<<< HEAD
session_start();
=======
>>>>>>> 9de9e8ba171625fda2163084a1cd282f22cb6661
//
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>
<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php";

if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>



<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-outlines">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- ==== Document Title ==== -->
    <title>Dashboard - DAdmin</title>

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="favicon.png" type="image/png">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="assets/css/morris.min.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/jquery-jvectormap.min.css">
    <link rel="stylesheet" href="assets/css/horizontal-timeline.min.css">
    <link rel="stylesheet" href="assets/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/css/dropzone.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Page Level Stylesheets -->

</head>
<body>

<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Navbar Start -->
    <header class="navbar navbar-fixed">
        <!-- Navbar Header Start -->
        <div class="navbar--header">
            <!-- Logo Start -->
            <a href="index.html" class="logo">
                <img src="assets/img/logo.png" alt="">
            </a>
            <!-- Logo End -->

            <!-- Sidebar Toggle Button Start -->
            <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
                <i class="fa fa-bars"></i>
            </a>
            <!-- Sidebar Toggle Button End -->
        </div>
        <!-- Navbar Header End -->

        <!-- Sidebar Toggle Button Start -->
        <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <!-- Sidebar Toggle Button End -->

        <div class="navbar--nav ml-auto">
            <ul class="nav">
                <?php if ($_SERVER['REQUEST_URI'] !== '/login.php'): ?>
                    <!-- Nav User Start -->
                    <li class="nav-item dropdown nav--user">
                        <a href="#" class="nav-link">
                            <span><?= current_user()->getName() ?></span>
                        </a>
                    </li>
                    <!-- Nav User End -->
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <!-- Navbar End -->

    <!-- Sidebar Start -->
    <aside class="sidebar" data-trigger="scrollbar">

        <?php if ($_SERVER['REQUEST_URI'] !== '/login.php'): ?>

            <!-- Sidebar Navigation Start -->
            <div class="sidebar--nav">
                <ul>
                    <li>
                        <ul>
                            <li class="active">
                                <a href="new-customer-order.php">
                                    <i class="fa fa-home"></i>
                                    <span>New Order</span>
                                </a>
                            </li>

                            <li class="active">
                                <a href="orders-list.php">
                                    <i class="fa fa-home"></i>
                                    <span>Orders</span>
                                </a>
                            </li>

                            <li class="active">
                                <a href="customers-list.php">
                                    <i class="fa fa-home"></i>
                                    <span>Customers</span>
                                </a>
                            </li>

                            <li class="active">
                                <a href="products-list.php">
                                    <i class="fa fa-home"></i>
                                    <span>Products</span>
                                </a>
                            </li>

                            <li class="active">
                                <a href="logout.php">
                                    <i class="fa fa-home"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Sidebar Navigation End -->


        <?php endif; ?>

    </aside>
    <!-- Sidebar End -->

    <!-- Main Container Start -->
    <main class="main--container">





