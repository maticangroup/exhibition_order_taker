<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php";


$customerId = $_REQUEST['cid'];
$productId = $_REQUEST['product_id'];


/**
 * @var $getOrder Order
 */
$getOrder = retrieve('order', $customerId, true);

print_r($getOrder);
die;