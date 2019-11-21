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


/**
 * @var $product Product
 */
$product = retrieve('product', $productId, true);


$orderItem = new OrderItem();
$orderItem->setPrice($product->getPrice());
$orderItem->setProduct($product);
$orderItem->setCount($count);

$alreadyAddedOrderItems[] = $orderItem;

$getOrder->setCustomer($customerId);

$getOrder->setOrderItems($alreadyAddedOrderItems);



remove_customer_order($getOrder->getSerial());

save('order', $getOrder);

redirect('/new-order.php?cid=' . $customerId);


//die("sss");