<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>

<?php require "head.php";
$order = retrieve('order', $_REQUEST['cid'], true);
?>
    <div class="row">

        <div class="col-4"></div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="panel">
                <!-- Mini Stats Panel Start -->
                <div class="miniStats--panel text-white bg-blue">
                    <div class="miniStats--header" data-overlay="0.1">
                        <p class="miniStats--label text-blue bg-white">
                            <span>New Order</span>
                        </p>
                    </div>

                    <div class="miniStats--body">
                        <i class="miniStats--icon fa fa-user text-white"></i>

                        <h3 class="miniStats--title h4 text-white">
                            <?= $order->getCustomer()->getName() ?> <?= $order->getCustomer()->getFamily() ?></h3>
                        <p class="miniStats--caption"><?= $order->getCreateDate() ?> </p>

                        <p class="miniStats--num"><?= $order->getOrderStatus() ?></p>
                    </div>
                </div>
                <!-- Mini Stats Panel End -->
            </div>
        </div>
        <div class="col-4"></div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <!-- Invoice Start -->
                <div class="invoice">
                    <div class="invoice--header">
                        <div class="invoice--logo">
                            <img src="http://bitaplastic.com/wp-content/themes/bita-fa/option-tree/assets/images/logo.png"
                                 alt="Bita">
                        </div>
                    </div>

                    <div class="invoice--order">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product Serial</th>
                                <th>Product Name</th>
                                <th>Product Count</th>
                                <th>Product Price</th>
                                <th>Total Product Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $totalPrice = 0;
                            foreach ($order->getOrderItems() as $orderItem) :?>
                                <tr>
                                    <td><?= $orderItem->getProduct()->getSerial(); ?></td>
                                    <td><?= $orderItem->getProduct()->getName(); ?></td>
                                    <td><?= $orderItem->getCount(); ?></td>
                                    <td><?= $orderItem->getPrice() ?></td>
                                    <td>
                                        <script>
                                            document.write(addCommas( <?= (str_replace([','], '', $orderItem->getPrice()) * $orderItem->getCount()) ?> ))
                                        </script>
                                    </td>
                                </tr>
                                <?php $totalPrice += str_replace([','], '', $orderItem->getPrice()) * $orderItem->getCount(); endforeach; ?>

                            <tr>
                                <td colspan="4"><strong>Total Price</strong></td>
                                <td>
                                    <script>
                                        document.write(addCommas( <?= $totalPrice; ?> ))
                                    </script>
                                </td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Invoice End -->
            </div>
        </div>
    </div>
<?php require "foot.php"; ?>