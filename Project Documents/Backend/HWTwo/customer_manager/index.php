<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/customer.php');
$action = filter_input(INPUT_POST, 'action');

//instantiate variable(s)
$last_name = '';
$customers = array();
$cust = new Customer();

if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'search_customers';
    }
}
switch ($action) {
    CASE $action == 'search_customers':
        include('customer_search.php');
        break;
    CASE $action == 'display_customers':
        $cust->setLastName(filter_input(INPUT_POST, 'last_name'));
        if (empty($cust->getLastName())) {
            $message = 'You must enter a last name.';
        } else {
            $customers = get_customers_by_last_name($cust);
        }
        include('customer_search.php');
        break;
    CASE $action == 'display_customer':
        $cust->setId(filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT));
        $customer = get_customer($cust);
        $countries = country_list();
        include('customer_display.php');
        break;
    CASE $action == 'update_customer':
        $cust->setId(filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT));
        $cust->setFirstName(filter_input(INPUT_POST, 'first_name'));
        $cust->setLastName(filter_input(INPUT_POST, 'last_name'));
        $cust->setAddress(filter_input(INPUT_POST, 'address'));
        $cust->setCity(filter_input(INPUT_POST, 'city'));
        $cust->setState(filter_input(INPUT_POST, 'state'));
        $cust->setPostalCode(filter_input(INPUT_POST, 'postal_code'));
        $cust->setCountryCode(filter_input(INPUT_POST, 'country_code'));
        $cust->setPhone($phone = filter_input(INPUT_POST, 'phone'));
        $cust->setEmail(filter_input(INPUT_POST, 'email'));
        $cust->setPassword(filter_input(INPUT_POST, 'password'));

        update_customer($cust);

        include('customer_search.php');
        break;
    CASE $action == 'logout':
        session_start();
        session_destroy();
        //header('Location: index.php');
        break;
    DEFAULT:
        break;
}
?>