<?php
require('../model/database.php');
require('../model/product_db.php');
require_once '../model/product.php';
$prod = new Product();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

switch($action){
    CASE $action == 'list_products':
        $products = get_products();
        include('product_list.php');
        break;
    
    CASE $action == 'delete_product':
        $prod->setProductCode(filter_input(INPUT_POST, 'product_code'));    
        delete_product($prod);
        header("Location: .");
        break;
    
    CASE $action == 'show_add_form':
        include('product_add.php');
        break;
    
    CASE $action == 'add_product':
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $version = filter_input(INPUT_POST, 'version', FILTER_VALIDATE_FLOAT);
        $release_date = filter_input(INPUT_POST, 'release_date');
        // Validate the inputs
        if ( $code === NULL || $name === FALSE || 
            $version === NULL || $version === FALSE || 
            $release_date === NULL) {
            $error = "Invalid product data. Check all fields and try again.";
            include('../errors/error.php');
        } else {
            $prod->setProductCode($code);
            $prod->setName($name);
            $prod->setVersion($version);
            $prod->setReleaseDate($release_date);
            add_product($prod);
            header("Location: .");
        }
        break;
    
    DEFAULT:
        break;
}
?>