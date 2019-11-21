<?php
//
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>
<?php
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
    <link rel="icon" href="http://bitaplastic.com/wp-content/themes/bita-fa/option-tree/assets/images/logo.png"
          type="image/png">

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


    <script>
        function separated(element) {
            alert('sss');
            var num = $(element).html();
            var comma = /,/g;
            num = num.replace(comma, '');
            $('.num').html(num);
            var numCommas = addCommas(num);
            $(element).html(numCommas);
        }

        function addCommas(nStr) {
            nStr += '';
            var comma = /,/g;
            nStr = nStr.replace(comma, '');
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        setTimeout(function () {


            var textbox = '.commas';
            var hidden = '.num';
            $(textbox).keyup(function () {
                var num = $(this).val();
                var comma = /,/g;
                num = num.replace(comma, '');
                $(hidden).val(num);
                var numCommas = addCommas(num);
                $(this).val(numCommas);
            });


        }, 1000);

    </script>


</head>
<body style="overflow-x: hidden!important; <?= ($_SERVER['REQUEST_URI'] === '/login.php') ? "overflow:hidden;" : "" ?>">
<?php if ($_SERVER['REQUEST_URI'] !== '/login.php'): ?>
<!-- Wrapper Start -->
<div class="wrapper">
    <!-- Navbar Start -->
    <header class="navbar navbar-fixed">
        <!-- Navbar Header Start -->
        <div class="navbar--header">
            <!-- Logo Start -->
            <a href="/orders-list.php" class="logo">
                <img width="100%"
                     src="http://bitaplastic.com/wp-content/themes/bita-fa/option-tree/assets/images/logo.png"
                     alt="Bita">
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
                <!-- Nav User Start -->
                <li class="nav-item dropdown nav--user">
                    <a href="#" class="nav-link">
                        <span><?= current_user()->getName() ?></span>
                    </a>
                </li>
                <!-- Nav User End -->
            </ul>
        </div>
    </header>
    <!-- Navbar End -->
    <!-- Sidebar Start -->
    <aside class="sidebar" data-trigger="scrollbar">


        <!-- Sidebar Navigation Start -->
        <div class="sidebar--nav">
            <ul>
                <li>
                    <ul>
                        <li class="active">
                            <a href="new-customer-order.php">
                                <i class="fa fa-shopping-cart"></i>
                                <span>New Order</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="orders-list.php">
                                <i class="fab fa-wpforms"></i>
                                <span>Orders</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="customers-list.php">
                                <i class="far fa-address-book"></i>
                                <span>Customers</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="products-list.php">
                                <i class="fa fa-th"></i>
                                <span>Products</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="logout.php">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar Navigation End -->


    </aside>
    <!-- Sidebar End -->

    <!-- Main Container Start -->

    <main class="main--container">
        <div class="container pt-5">
            <?php endif; ?>




