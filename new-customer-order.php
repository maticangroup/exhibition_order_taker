<?php require "head.php";

current_user();
?>
    <div class="form">
        <form action="#">


            <div class="form-element">
                <div class="element-title">
                    Name
                </div>
                <div class="element-input">
                    <input type="text" name="customer-name">
                </div>
            </div>
            <div class="form-element">
                <div class="element-title">
                    Family
                </div>
                <div class="element-input">
                    <input type="text" name="customer-family">
                </div>
            </div>
            <div class="form-element">
                <div class="element-title">
                    Mobile
                </div>
                <div class="element-input">
                    <input type="text" name="customer-mobile">
                </div>
            </div>
            <div class="form-element">
                <div class="element-title">
                    Telephone
                </div>
                <div class="element-input">
                    <input type="text" name="customer-telephone">
                </div>
            </div>
            <div class="form-element">
                <div class="element-title">
                    Address
                </div>
                <div class="element-input">
                    <input type="text" name="customer-address">
                </div>
            </div>
            <div class="form-element submit">
                <div class="element-title">
                </div>
                <div class="element-input">
                    <input type="submit" value="Value">
                </div>
            </div>
        </form>
    </div>
<?php require "foot.php"; ?>


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