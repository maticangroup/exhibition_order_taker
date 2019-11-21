<?php

class Customer
{
    private $serial;
    private $name;
    private $family;
    private $mobile;
    private $address;
    private $telephone;
    private $registeredBy;

    /**
     * @return mixed
     */
    public function getRegisteredBy()
    {
        return $this->registeredBy;
    }

    /**
     * @param mixed $registeredBy
     */
    public function setRegisteredBy($registeredBy)
    {
        $this->registeredBy = $registeredBy;
    }


    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param mixed $family
     */
    public function setFamily($family)
    {
        $this->family = $family;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }


    public function __toString()
    {
        $toArray = [
            'serial' => $this->getSerial(),
            'name' => $this->getName(),
            'address' => $this->getAddress(),
            'family' => $this->getMobile(),
            'mobile' => $this->getFamily(),
            'telephone' => $this->getTelephone(),
            'registered_by' => $this->getRegisteredBy()
        ];
        return json_encode($toArray, JSON_UNESCAPED_UNICODE);
    }


}

class Order
{
    private $create_date;
    private $taker;
    private $serial;
    private $orderStatus;
    private $customer;
    private $orderItems;

    /**
     * @return OrderItem[]
     */
    public function getOrderItems()
    {
        $orderItems = json_decode($this->orderItems, true);
        $orderItemsArray = [];
        if ($orderItems) {
            foreach ($orderItems as $orderItem) {
                $orderItemModel = new OrderItem();
//            $orderItemModel->setCount();
//            $orderItemModel->setProduct();
//            $orderItemModel->setPrice();
//            $orderItemModel->setProductSerial();
                $orderItemsArray[] = $orderItemModel;
            }
        }
        return $orderItemsArray;
    }

    /**
     * @param mixed $orderItems
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getCreateDate()
    {
        $createDate = new \DateTime($this->create_date['date']);
        return $createDate->format('Y-n-d');
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date)
    {
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getTaker()
    {
        return $this->taker;
    }

    /**
     * @param mixed $taker
     */
    public function setTaker($taker)
    {
        $this->taker = $taker;
    }

    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * @return mixed
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @param mixed $orderStatus
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    public function __toString()
    {
        $orderItems = $this->getOrderItems();
        $orderItemModelArray = [];

        foreach ($orderItems as $orderItem) {
            $orderItemModelArray[] = (string)$orderItem;
        }

        $order = [
            'customer' => $this->getCustomer(),
            'serial' => $this->getSerial(),
            'createDate' => $this->getCreateDate(),
            'orderStatus' => $this->getOrderStatus(),
            'orderTaker' => $this->getTaker(),
            'orderItems' => ''
        ];
        return json_encode($order);
    }


}

class OrderItem
{
    private $product;
    private $count;
    private $price;

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    public function __toString()
    {
        $this->getPrice();
        $this->getProduct();
        $this->getCount();

        $orderItemArray = [
            'price' => $this->getPrice(),
            'product' => (string)$this->getProduct(),
            'count' => $this->getCount(),
        ];

        return json_encode($orderItemArray);
    }


}

class User
{
    private $mobile;
    private $name;
    private $role;
    private $password;

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}

class Product
{
    private $serial;
    private $name;
    private $price;

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     * @return mixed
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        $product = [
            'serial' => $this->getSerial(),
            'name' => $this->getName(),
            'price' => $this->getPrice()
        ];
        return json_encode($product, JSON_UNESCAPED_UNICODE);
    }
}