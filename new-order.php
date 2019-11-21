<<<<<<< HEAD
=======
<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>
>>>>>>> 9de9e8ba171625fda2163084a1cd282f22cb6661
<?php
require "head.php";

/**
 * @var $order Order
 */
$order = retrieve('order', $_REQUEST['cid'], true);


/**
 * @var $products Product[]
 */
$products = [];

if (isset($_REQUEST['q'])) {
    $products = get_all('products');
    $query = $_REQUEST['q'];
    if ($query !== "") {
        foreach ($products as $key => $product) {
            if (strpos(
                    strtolower(
                        (string)$product)
                    , strtolower($query)
                ) === false) {
                unset($products[$key]);
            }
        }
    }
}
?>
<h1>New order</h1>
<div class="order-section">
    <div class="order-owner">
        <?= $order->getCustomer()->getName() ?> <?= $order->getCustomer()->getFamily() ?>
    </div>
    <div class="order-create-date">
        <?= $order->getCreateDate() ?>
<<<<<<< HEAD
    </div>
    <div class="order-status">
        <?= $order->getOrderStatus() ?>
    </div>
=======
    </div>
    <div class="order-status">
        <?= $order->getOrderStatus() ?>
    </div>
>>>>>>> 9de9e8ba171625fda2163084a1cd282f22cb6661
</div>
<div class="single-order-section">
    <div class="search">
        <form action="new-order.php">
            <input type="hidden" value="<?= $_REQUEST['cid'] ?>" name="cid">
            <input class="search-input" type="search" placeholder="search for product..."
                   value="<?= (isset($_REQUEST['q'])) ? ($_REQUEST['q']) : "" ?>" name="q">
        </form>
    </div>
    <div class="search-results">
        <?php foreach ($products as $product) : ?>
            <div class="result">
                <div class="product-serial">
                    <?= $product->getSerial() ?>
                </div>
                <div class="product-name">
                    <?= $product->getName() ?>
<<<<<<< HEAD
                </div>
                <div class="product-price">
                    <?= $product->getPrice() ?>
                </div>
=======
                </div>
                <div class="product-price">
                    <?= $product->getPrice() ?>
                </div>
>>>>>>> 9de9e8ba171625fda2163084a1cd282f22cb6661
                <div class="product-option">
                    <form action="add-to-cart.php" method="get">
                        <input type="hidden" name="cid" value="<?= $_REQUEST['cid'] ?>">
                        <input type="hidden" name="product_id" value="<?= $product->getSerial() ?>">
                        <input type="number" name="count">
                        <input type="submit" value="add to cart">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="selected-products">
        <?php foreach ($order->getOrderItems() as $orderItem) : ?>
            <div class="product">
                <div class="order-product-serial">

                </div>
                <div class="order-product-name">

                </div>
                <div class="order-product-price">

                </div>
                <div class="order-product-count">

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require "foot.php"; ?>