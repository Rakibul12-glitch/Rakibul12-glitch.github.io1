<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/incident_db.php');
require_once '../model/incident.php';
require_once '../model/customer.php';
$incident = new Incident();
$cust = new Customer();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'display_customer_get';
    }
}

$email = '';

switch($action){
    CASE $action == 'display_customer_get':
        include('customer_get.php');
        break;
    
    CASE $action == 'get_customer':
        $cust->setEmail(filter_input(INPUT_POST, 'email'));
        $customer = get_customer_by_email($cust);
        $products = get_products_by_customer($cust);
        $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
        include('incident_create.php');
        break;
    
    CASE $action == 'create_incident':
        $incident->setCustomerID(filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT));
        $incident->setProductCode(filter_input(INPUT_POST, 'product_code'));
        $incident->setTitle(filter_input(INPUT_POST, 'title'));
        $incident->setDescription(filter_input(INPUT_POST, 'description'));
        try{            
            add_incident($incident);
            $message = "This incident was added to our database.";
        }catch(Exception $e){
            $message = $e->getMessage();
        }        
        include('incident_create.php');
        break;
    
    DEFAULT:
        break;    
}
?>