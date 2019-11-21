<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>
<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>

<?php
require "head.php";

/**
 * @var $order Order
 */
$order = retrieve('order', $_REQUEST['cid'], true);
//print_r($order);
//die;
/**
 * @var $products Product[]
 */
//$products = [];
$products = get_all('products');

if (isset($_REQUEST['q'])) {

    $query = $_REQUEST['q'];
    if ($query !== "") {
        foreach ($products as $key => $product) {
            if (strpos(
                    strtolower(
                        (string)$product)
                    , strtolower($query)
                ) === false) {
                unset($products[$key]);
            }
        }
    }
}
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
                <div class="records--header">
                    <div class="title fa-shopping-bag">
                        <h3 class="h3">All Products</h3>
                        <p>Found Total <?= count($products); ?> Products</p>
                    </div>

                    <div class="actions">
                        <form action="new-order.php" class="search flex-wrap flex-md-nowrap">
                            <input type="hidden" value="<?= $_REQUEST['cid'] ?>" name="cid">
                            <input type="search" class="form-control" name="q"
                                   value="<?= (isset($_REQUEST['q'])) ? ($_REQUEST['q']) : "" ?>"
                                   placeholder="Product Name...">
                            <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Product Listing">
                    <table id="recordsListView">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th class="not-sortable">Product Count</th>
                            <th class="not-sortable">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product->getSerial() ?></td>
                                <td><?= $product->getName() ?></td>
                                <td><?= $product->getPrice() ?></td>
                                <form action="add-to-cart.php" method="get">
                                    <input type="hidden" name="cid" value="<?= $_REQUEST['cid'] ?>">
                                    <input type="hidden" name="product_id" value="<?= $product->getSerial() ?>">
                                    <td>
                                        <input type="number" class="form-control" name="count" required>
                                    </td>
                                    <td>
                                        <input type="submit" class="btn btn-rounded btn-info" value="add to cart">
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Records List End -->
            </div>
        </div>
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
                                <th>Action</th>
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
                                    <td>
                                        <form action="remove-from-cart.php">
                                            <input type="hidden" name="cid" value="<?= $_REQUEST['cid'] ?>">
                                            <input type="hidden" name="product_id"
                                                   value="<?= $orderItem->getProduct()->getSerial() ?>">
                                            <input type="submit" class="btn btn-rounded btn-danger" value="remove">
                                        </form>
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