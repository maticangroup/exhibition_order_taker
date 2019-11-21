<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php";


$customerId = $_REQUEST['cid'];
$productId = $_REQUEST['product_id'];
$count = $_REQUEST['count'];

/**
 * @var $getOrder Order
 */
$getOrder = retrieve('order', $customerId, true);

$alreadyAddedOrderItems = $getOrder->getOrderItems();
$orderItem = new OrderItem();
$product = retrieve('product', $productId);
<<<<<<< HEAD

$orderItem->setPrice($product['price']);
$orderItem->setProduct(json_encode($product));
$orderItem->setCount($count);

$alreadyAddedOrderItems[] = $orderItem;
$getOrder->setOrderItems($alreadyAddedOrderItems);

remove_order($getOrder->getSerial());


save('order', $getOrder);

=======

$orderItem->setPrice($product['price']);
$orderItem->setProduct(json_encode($product));
$orderItem->setCount($count);

$alreadyAddedOrderItems[] = $orderItem;
$getOrder->setOrderItems($alreadyAddedOrderItems);

remove_order($getOrder->getSerial());

save('order', $getOrder);

>>>>>>> 9de9e8ba171625fda2163084a1cd282f22cb6661
redirect('/new-order.php?cid=' . $customerId);

