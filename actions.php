<?php
function success_message($message)
{
    if (!isset($_SESSION['success_messages'])) {
        $_SESSION['success_messages'] = [];
    }
    $_SESSION['success_messages'][] = $message;
}

function fail_message($message)
{
    if (!isset($_SESSION['error_messages'])) {
        $_SESSION['error_messages'] = [];
    }
    $_SESSION['error_messages'][] = $message;
}

function manage_login($user, $password)
{
    if ($user) {
        if ($user['password'] === $password) {

            success_message("Welcome " . $user['name']);
            login($user);

        } else {
            fail_message("Password does not match");
        }
    } else {
        fail_message("Could not find user");
    }
}

function login($user)
{
    $_SESSION['user'] = $user;
    header('Location: /');
    return true;
}


function logout()
{
    unset($_SESSION['user']);
    header('Location: /login.php');
    return true;
}

function current_user()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login.php');
        die;
    } else {
        $userFromSession = $_SESSION['user'];
        $user = new User();
        $user->setMobile($userFromSession['mobile']);
        $user->setName($userFromSession['name']);
        $user->setRole($userFromSession['role']);
        return $user;
    }

}

function get_path($path)
{
    return str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);
}

function save($what, $data)
{
    if ($what === 'customer') {
        /**
         * @var $data Customer
         */
        $path = get_path(__DIR__ . '/data/customers');
        if (!file_exists($path)) {
            mkdir($path);
        }
        file_put_contents($path . '/' . $data->getSerial() . '.txt', (string)$data);
    }
    if ($what === 'order') {
        /**
         * @var $data Order
         */
        $path = get_path(__DIR__ . '/data/orders');
        if (!file_exists($path)) {
            mkdir($path);
        }
        file_put_contents($path . '/' . $data->getCustomer() . '.txt', (string)$data);
    }
    if ($what === 'product') {
        /**
         * @var $data Product
         */
        $path = get_path(__DIR__ . '/data/products');
        if (!file_exists($path)) {
            mkdir($path);
        }
        file_put_contents($path . '/' . $data->getSerial() . '.txt', (string)$data);
    }

}

function get_all($what)
{
    if ($what === 'orders') {
        $path = get_path(__DIR__ . '/data/orders');
        $orders = scandir($path);
        unset($orders[0]);
        unset($orders[1]);
        $ordersArray = [];
        foreach ($orders as $order) {
            $orderJson = file_get_contents($path . '/' . $order);
            $ordersArray[] = json_decode($orderJson, true);
        }
        print_r($ordersArray);
        die("sss");
    }
    if ($what === 'customers') {
        $path = get_path(__DIR__ . '/data/customers');
        $customers = scandir($path);
        unset($customers[0]);
        unset($customers[1]);
        $customersArray = [];
        foreach ($customers as $customer) {
            $customerJson = file_get_contents($path . '/' . $customer);
            $customerArray = json_decode($customerJson, true);
            $customerModel = new Customer();
            $customerModel->setName($customerArray['name']);
            $customerModel->setMobile($customerArray['mobile']);
            $customerModel->setRegisteredBy($customerArray['registered_by']);
            $customerModel->setAddress($customerArray['address']);
            $customerModel->setTelephone($customerArray['telephone']);
            $customerModel->setFamily($customerArray['family']);
            $customerModel->setSerial($customerArray['serial']);
            $customersArray[] = $customerModel;
        }
        return $customersArray;
    }
    if ($what === 'products') {
        $path = get_path(__DIR__ . '/data/products');
        $products = scandir($path);
        unset($products[0]);
        unset($products[1]);
        $productModelsArray = [];
        foreach ($products as $product) {
            $customerJson = file_get_contents($path . '/' . $product);
            $productModelArray = json_decode($customerJson, true);
            $productModel = new Product();
            $productModel->setPrice($productModelArray['price']);
            $productModel->setName($productModelArray['name']);
            $productModel->setSerial($productModelArray['serial']);
            $productModelsArray[] = $productModel;
        }
        return $productModelsArray;
    }
}

/**
 * @param $orderSerial
 * @throws Exception
 */
function init_order($orderSerial)
{
    $orderModel = new Order();
    $orderModel->setSerial($orderSerial);
    $orderModel->setCreateDate(new \DateTime('now'));
    /**
     * @var $customer Customer
     */
    $customer = retrieve('customer', $orderSerial, true);
    $orderModel->setCustomer($customer->getSerial());
    $orderModel->setOrderStatus('open');
    $orderModel->setTaker(current_user()->getMobile());
    $orderModel->setOrderItems('');
    save('order', $orderModel);
}

function retrieve($type, $serial, $instance = false)
{

    if ($type === 'customer') {

        $path = get_path(__DIR__ . '/data/customers/' . $serial . '.txt');
        if (file_exists($path)) {
            $content = file_get_contents($path);
            $serializedContent = json_decode($content, true);
            if ($instance) {
                $customer = new Customer();
                $customer->setSerial($serializedContent['serial']);
                $customer->setName($serializedContent['name']);
                $customer->setFamily($serializedContent['family']);
                $customer->setTelephone($serializedContent['telephone']);
                $customer->setAddress($serializedContent['address']);
                $customer->setRegisteredBy($serializedContent['registered_by']);
                $customer->setMobile($serializedContent['mobile']);
                return $customer;
            }
            return $serializedContent;
        }
        return false;
    }
    if ($type === 'product') {
        $path = get_path(__DIR__ . '/data/products/' . $serial . '.txt');
        if (file_exists($path)) {
            $content = file_get_contents($path);
            return json_decode($content, true);
        }
        return false;
    }
    if ($type === 'order') {
        $path = get_path(__DIR__ . '/data/orders/' . $serial . '.txt');
        if (file_exists($path)) {

            $content = json_decode(file_get_contents($path), true);
            if ($instance) {

                $order = new Order();
                $order->setSerial($content['serial']);
                $order->setTaker($content['orderTaker']);
                $order->setOrderStatus($content['orderStatus']);
                $order->setCustomer(retrieve('customer', $content['customer'], true));
                $order->setCreateDate($content['createDate']);
                return $order;
            }
            return $content;
        }
        return false;
    }
}

function redirect($where)
{
    header('Location: ' . $where);
    die;
}

function get_serial()
{
    return rand(1000000, 9999999);
}

function get_price()
{
    return rand(1000000, 9999999);
}

function import_products()
{

    $path = get_path(__DIR__ . '/data/csv/products.csv');
    $row = 1;
    $productsArray = [];
    if (($handle = fopen($path, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            $row++;
            for ($c = 0; $c < $num; $c++) {
                $productsArray[$row][$c] = $data[$c];
            }
        }
        fclose($handle);
    }
    foreach ($productsArray as $item) {
        $product = new Product();
        $product->setSerial($item[0] . '--' . $item[1]);
        $product->setName($item[2]);
        $product->setPrice($item[3]);
        save('product', $product);
    }
    return true;
}