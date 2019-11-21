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
<?php require "head.php";
/**
 * @var $customers Customer[]
 */
$customers = get_all('customers');
if (isset($_REQUEST['q'])) {
    $query = $_REQUEST['q'];
    if ($query !== "") {
        foreach ($customers as $key => $customer) {
            if (strpos(
                    strtolower(
                        (string)$customer)
                    , strtolower($query)
                ) === false) {
                unset($customers[$key]);
            }
        }
    }
}
?>
<h1>Customer list</h1>
<div class="search">
    <form action="customers-list.php">
        <label>
            Search for customers
            <input type="search" name="q" value="<?= (isset($_REQUEST['q'])) ? ($_REQUEST['q']) : "" ?>">
        </label>
    </form>
</div>
<div class="customers">
    <?php foreach ($customers as $customer): ?>
        <div class="customer">
            <div class="name">
                <?= $customer->getName() . ' ' . $customer->getFamily() ?>
            </div>
            <div class="mobile">
                <?= $customer->getMobile() ?>
            </div>
            <div class="address">
                <?= $customer->getAddress() ?>
            </div>
            <div class="registered_by">
                <?= $customer->getRegisteredBy() ?>
            </div>
            <div class="options">
                <a href="init-customer-order.php?cid=<?= $customer->getSerial() ?>">Add Order</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php require "foot.php"; ?>
