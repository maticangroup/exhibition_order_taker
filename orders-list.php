<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>
<?php require "head.php";
get_all('orders');
?>

    <div class="page-header">
        <h1>Orders List</h1>
        <a href="#" class="btn btn-create">Add new</a>
    </div>
    <div class="orders">
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
        <div class="order">
            <div class="order-serial">
                123123
            </div>
            <div class="order-date">
                12-12-12
            </div>
            <div class="order-taker">
                Hossein Azimi
            </div>
            <div class="order-product-count">
                12
            </div>
            <div class="order-options">
                <a class="btn order-edit" href="#">Edit</a>
                <a class="btn order-view" href="#">View</a>
            </div>
        </div>
    </div>

<?php require "foot.php"; ?>