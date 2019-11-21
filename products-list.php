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
    <h1>Products list</h1>
    <div class="products-list-section">
        <div class="product-search">
            <form action="#">
                <label>
                    <input type="search" placeholder="Search for products..." name="q"
                           value="<?= (isset($_REQUEST['q'])) ? ($_REQUEST['q']) : "" ?>">
                </label>
            </form>
        </div>

        <div class="products-list">
            <?php foreach ($products as $product) : ?>
                <div class="product">
                    <div class="product-barcode">
                        <?= $product->getSerial() ?>
                    </div>
                    <div class="product-name">
                        <?= $product->getName() ?>
                    </div>
                    <div class="product-price">
                        <?= $product->getPrice() ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php require "foot.php"; ?>