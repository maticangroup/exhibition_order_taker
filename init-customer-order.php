<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php";
$already_added_order = retrieve('order', $_REQUEST['cid']);
if (!$already_added_order) {
    init_order($_REQUEST['cid']);
}
redirect('/new-order.php?cid=' . $_REQUEST['cid']);