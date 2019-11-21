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
 * @var $orders Order[]
 */
$orders = get_all('orders');
?>


    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="records--header">
                    <div class="title fa-shopping-bag">
                        <h3 class="h3">All Orders</h3>
                        <p>Found Total <?= count($orders); ?> Orders</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="records--list" data-title="Order Listing">
                    <table id="recordsListView">
                        <thead>
                        <tr>
                            <th>Order Create Date</th>
                            <th>Order Taker</th>
                            <th>Order Customer Name</th>
                            <th>Amount</th>
                            <th class="not-sortable">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $totalPrice = 0;
                        foreach ($orders as $order):
//                            print_r($order);
//                        die;
                            ?>
                            <tr>
                                <td><?= $order->getCreateDate(); ?></td>
                                <td><?= $order->getTaker(); ?></td>
                                <td><?= $order->getCustomer()->getName() . " " . $order->getCustomer()->getFamily(); ?></td>
                                <?php
                                /**
                                 * @var $items OrderItem[]
                                 */
                                $items = $order->getOrderItems();
                                foreach ($items as $item): ?>
                                    <?php $totalPrice += (str_replace(",", "", $item->getPrice()) * $item->getCount()) ?>
                                    <td><?= $totalPrice; ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <a href="single-order.php?cid=<?= $order->getSerial() ?>"
                                       class="btn btn-rounded btn-info">View</a>
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