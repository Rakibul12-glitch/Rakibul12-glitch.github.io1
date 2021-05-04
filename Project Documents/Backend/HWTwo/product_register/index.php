<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');
require_once '../model/customer.php';
require_once '../model/product.php';

$cust = new Customer();
$prod = new Product();        

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'login_customer';
    }
}

//instantiate variable(s)
$email = '';

switch($action){
    CASE $action == 'login_customer':
        include('customer_login.php');
        break;
    
    CASE $action == 'get_customer':
        $cust->setEmail(filter_input(INPUT_POST, 'email'));
        $customer = get_customer_by_email($cust);
        $products = get_products();
        include('product_register.php');
        break;
    
    CASE $action == 'register_product':
        $cust->setId(filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT));
        $prod->setProductCode(filter_input(INPUT_POST, 'product_code'));
        add_registration($cust, $prod);
        $message = "Product ( ".$prod->getProductCode()." ) was registered successfully.";
        include('product_register.php');
        break;
    
    DEFAULT:
        break;
}
?>