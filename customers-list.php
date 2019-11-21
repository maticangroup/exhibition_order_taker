<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>
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


<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="records--header">
                <div class="title fa-address-book">
                    <h3 class="h3">All Customers</h3>
                    <p>Found Total <?= count($customers); ?> Customers</p>
                </div>

                <div class="actions">
                    <form action="customers-list.php" class="search flex-wrap flex-md-nowrap">
                        <input type="search" class="form-control" name="q"
                               value="<?= (isset($_REQUEST['q'])) ? ($_REQUEST['q']) : "" ?>"
                               placeholder="Customer Name...">
                        <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
            <div class="records--list" data-title="Customer Listing">
                <table id="recordsListView">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Mobile</th>
                        <th>Customer Address</th>
                        <th>Customer Register Date</th>
                        <th class="not-sortable">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?= $customer->getName() . ' ' . $customer->getFamily() ?></td>
                            <td><?= $customer->getMobile() ?></td>
                            <td><?= $customer->getAddress() ?></td>
                            <td><?= $customer->getRegisteredBy() ?></td>
                            <td>
                                <a href="init-customer-order.php?cid=<?= $customer->getSerial() ?>"
                                   class="btn btn-rounded btn-info">Make an Order</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require "foot.php"; ?>
