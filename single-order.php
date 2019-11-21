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
<!--                                <th>Action</th>-->
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
<!--                                    <td>-->
<!--                                        <form action="remove-from-cart.php">-->
<!--                                            <input type="hidden" name="cid" value="--><?//= $_REQUEST['cid'] ?><!--">-->
<!--                                            <input type="hidden" name="product_id"-->
<!--                                                   value="--><?//= $orderItem->getProduct()->getSerial() ?><!--">-->
<!--                                            <input type="submit" class="btn btn-rounded btn-danger" value="remove">-->
<!--                                        </form>-->
<!--                                    </td>-->

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