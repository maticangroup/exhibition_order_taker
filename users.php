<?php
@session_start();
$users = [
    '09120342273' =>
        [
            'mobile' => '09120342273',
            'name' => 'حسین عظیمی',
            'role' => 'admin',
            'password' => '123456'
        ],
    '09122930611' =>
        [
            'mobile' => '09122930611',
            'name' => 'Amirhossein',
            'role' => 'admin',
            'password' => '123'
        ],
    '09382706764' =>
        [
            'mobile' => '09382706764',
            'name' => 'زهرا توکلی',
            'role' => 'user',
            'password' => '123456'
        ],
    '09388450169' =>
        [
            'mobile' => '09388450169',
            'name' => 'تبلت کارخانه',
            'role' => 'user',
            'password' => '123456'
        ],
    '09192331008' =>
        [
            'mobile' => '09192331008',
            'name' => 'حامد فتح آبادی',
            'role' => 'user',
            'password' => '123456'
        ],
    '09128702568' =>
        [
            'mobile' => '09128702568',
            'name' => 'جاوید ثنایی',
            'role' => 'user',
            'password' => '123456'
        ],
    '09192694398' =>
        [
            'mobile' => '09192694398',
            'name' => 'محمد خداویسی',
            'role' => 'user',
            'password' => '123456'
        ],
    '09121259673' =>
        [
            'mobile' => '09121259673',
            'name' => 'مهرداد مهرانفر',
            'role' => 'user',
            'password' => '123456'
        ],
    '09394091279' =>
        [
            'mobile' => '09394091279',
            'name' => 'میثم محمودی',
            'role' => 'user',
            'password' => '123456'
        ]
];
$actions = [
    'login' => 'login',
    'see_all_orders' => 'see_all_orders',
    'see_single_order' => 'see_single_order',
    'register_order' => 'register_order',
    'see_user_orders' => 'see_user_orders',
    'search_products' => 'search_products'
];
$permissions = [
    'admin' => [
        $actions['login'],
        $actions['see_all_orders'],
        $actions['see_single_order'],
        $actions['register_order'],
        $actions['see_user_orders'],
        $actions['search_products'],
    ],
    'user' => [
        $actions['login'],
        $actions['see_all_orders'],
        $actions['see_single_order'],
        $actions['register_order'],
        $actions['see_user_orders'],
        $actions['search_products'],
    ]
];
//
//function is_allowed($actionName)
//{
//    /**
//     * @todo Later
//     */
//}