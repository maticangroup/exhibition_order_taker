<?php session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:3000/assets/css/all.min.css">
</head>
<body>
<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php if ($_SERVER['REQUEST_URI'] !== '/login.php'): ?>
    <div class="dashboard-options">
        <div class="option">
            <a href="new-customer-order.php">
                New Order
            </a>
        </div>
        <div class="option">
            <a href="orders-list.php">
                Orders
            </a>
        </div>
        <div class="option">
            <a href="customers-list.php">
                Customers
            </a>
        </div>
        <div class="option">
            <a href="products-list.php">
                Products
            </a>
        </div>
        <div class="option">
            <a href="logout.php">
                Logout
            </a>
        </div>
    </div>

<?php endif; ?>



