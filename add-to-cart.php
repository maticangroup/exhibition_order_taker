<?php
require "head.php";

$customerId = $_REQUEST['cid'];
$productId = $_REQUEST['product_id'];
$count = $_REQUEST['count'];

/**
 * @var $getOrder Order
 */
$getOrder = retrieve('order', $customerId, true);



print_r($getOrder);
die("sss");
//$alreadyOrderItems = ;

