<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>

<?php require "head.php";
$order = retrieve('order', $_REQUEST['cid'], true);
?>
    <h1>Single order</h1>
    <div class="single-order-section">
        <div class="search"></div>
        <div class="search-results">
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
            <div class="result">
                <div class="product-serial">
                    123123123
                </div>
                <div class="product-name">
                    This is the product name
                </div>
                <div class="product-price">
                    12,000,000
                </div>
            </div>
        </div>
        <div class="selected-products">
            <div class="order-product-serial">

            </div>
            <div class="order-product-name">

            </div>
            <div class="order-product-price">

            </div>
        </div>
    </div>
<?php require "foot.php"; ?>