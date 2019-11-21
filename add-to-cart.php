<?php
require "head.php";

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

$orderItem->setPrice($product['price']);
$orderItem->setProduct(json_encode($product));
$orderItem->setCount($count);

$alreadyAddedOrderItems[] = $orderItem;
$getOrder->setOrderItems($alreadyAddedOrderItems);

remove_order($getOrder->getSerial());


save('order', $getOrder);

redirect('/new-order.php?cid=' . $customerId);

