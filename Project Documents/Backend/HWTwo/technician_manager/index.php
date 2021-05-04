<?php
require('../model/database_oo.php');
require_once '../model/technician.php';
require_once '../model/technician_db_oo.php';
$techDB = new TechnicianDB();
$tech = new Technician();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_technicians';
    }
}

switch($action){
    CASE $action == 'list_technicians':
        $technicians = $techDB->get_technicians();
        include('technician_list.php');
        break;
    
    CASE $action == 'delete_technician':
        $tech->setTechID(filter_input(INPUT_POST, 'technician_id', FILTER_VALIDATE_INT));
        $techDB->delete_technician($tech);
        header("Location: .");
        break;
    
    CASE $action == 'show_add_form':
        include('technician_add.php');
        break;
    
    CASE $action == 'add_technician':
        $tech->setFirstName(filter_input(INPUT_POST, 'first_name'));
        $tech->setLastName(filter_input(INPUT_POST, 'last_name'));
        $tech->setPhone(filter_input(INPUT_POST, 'phone'));
        $tech->setEmail(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
        $tech->setPassword(filter_input(INPUT_POST, 'password'));
        // Validate the inputs
        if (empty($tech->getFirstName()) || empty($tech->getLastName()) || empty($tech->getPhone()) || 
            $tech->getEmail() === NULL || $tech->getEmail() === FALSE || empty($tech->getPassword())) {
            $error = "Invalid technician data. Check all fields and try again.";
            include('../errors/error.php');
        } else {        
            $techDB->add_technician($tech);
            header("Location: .");
        }
        break;
    
    DEFAULT:
        break;
}
?>