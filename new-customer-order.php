<?php require "users.php"; ?>
<?php require "actions.php"; ?>
<?php require "entities.php"; ?>

<?php
if ($_SERVER['REQUEST_URI'] !== '/login.php'):
    current_user();
endif;
?>
<?php
if (isset($_REQUEST['customer-name'])) {
    $customer = new Customer();
    $customer->setSerial(get_serial());
    $customer->setName($_REQUEST['customer-name']);
    $customer->setFamily($_REQUEST['customer-family']);
    $customer->setMobile($_REQUEST['customer-mobile']);
    $customer->setTelephone($_REQUEST['customer-telephone']);
    $customer->setAddress($_REQUEST['customer-address']);
    $customer->setRegisteredBy(current_user()->getMobile());

    /**
     * @todo There shouldn't be any duplicate customer here
     */
    /**
     * @todo Validation should be checked here
     */


    save('customer', $customer);

    redirect('/init-customer-order.php?cid=' . $customer->getSerial());
}
?>
<?php require "head.php"; ?>


<div class="row gutter-20 mt-5">
    <div class="col-3"></div>
    <div class="col-md-6">
        <!-- Panel Start -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">New Customer Form</h3>
            </div>

            <form action="/new-customer-order.php" class="panel-content" method="post">
                <div class="form-group">
                    <label>
                        <span class="label-text">Name</span>
                        <input type="text" name="customer-name"
                               class="form-control">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="label-text">Family</span>
                        <input type="text" name="customer-family"
                               class="form-control">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="label-text">Mobile</span>
                        <input type="text" name="customer-mobile"
                               class="form-control">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="label-text">Telephone</span>
                        <input type="text" name="customer-telephone"
                               class="form-control">
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="label-text">Address</span>
                        <input type="text" name="customer-address"
                               class="form-control">
                    </label>
                </div>

                <input type="submit" value="Submit" class="btn btn-sm btn-rounded btn-success">
            </form>
        </div>
    </div>
    <div class="col-3"></div>
</div>


<!--<div class="form">-->
<!--    <form action="/new-customer-order.php" method="post">-->


<!--        <div class="form-element">-->
<!--            <div class="element-title">-->
<!--                Name-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input type="text" name="customer-name">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="form-element">-->
<!--            <div class="element-title">-->
<!--                Family-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input type="text" name="customer-family">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="form-element">-->
<!--            <div class="element-title">-->
<!--                Mobile-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input type="text" name="customer-mobile">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="form-element">-->
<!--            <div class="element-title">-->
<!--                Telephone-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input type="text" name="customer-telephone">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="form-element">-->
<!--            <div class="element-title">-->
<!--                Address-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input type="text" name="customer-address">-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="form-element submit">-->
<!--            <div class="element-title">-->
<!--            </div>-->
<!--            <div class="element-input">-->
<!--                <input type="submit" value="Value">-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<?php require "foot.php"; ?>


