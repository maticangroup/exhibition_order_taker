<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>
<?php require "head.php";
?>

<?php require "foot.php"; ?>