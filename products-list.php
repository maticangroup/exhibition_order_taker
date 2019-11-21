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
 * @var $products Product[]
 */
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
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel">
                <div class="records--header">
                    <div class="title fa-th">
                        <h3 class="h3">All Products</h3>
                        <p>Found Total <?= count($products); ?> Products</p>
                    </div>

                    <div class="actions">
                        <form action="products-list.php" class="search flex-wrap flex-md-nowrap">
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
                <div class="records--list" data-title="Product Listing">
                    <table id="recordsListView">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product->getSerial() ?></td>
                                <td><?= $product->getName() ?></td>
                                <td><?= $product->getPrice() ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require "foot.php"; ?>