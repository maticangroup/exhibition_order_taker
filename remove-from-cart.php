<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php";


$customerId = $_REQUEST['cid'];
$productId = $_REQUEST['product_id'];


/**
 * @var $getOrder Order
 */
$getOrder = retrieve('order', $customerId, true);

/**
 * @var $orderItems OrderItem[]
 */
$orderItems = $getOrder->getOrderItems();

foreach ($orderItems as $key => $orderItem) {
    if ($orderItem->getProduct()->getSerial() === $productId) {
        unset($orderItems[$key]);
    }
}

$getOrder->setOrderItems($orderItems);
$getOrder->setCustomer($customerId);

remove_customer_order($getOrder->getSerial());

save('order', $getOrder);

redirect('/new-order.php?cid=' . $customerId);
