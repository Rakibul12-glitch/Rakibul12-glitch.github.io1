<?php
function get_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians
              ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->execute();
    $technicians = $statement->fetchAll();
    $statement->closeCursor();   
    return $technicians;
}

function delete_technician($tech) {
    global $db;
    $query = 'DELETE FROM technicians
              WHERE techID = :technician_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':technician_id', $tech->getTechID());
    $statement->execute();
    $statement->closeCursor();
}

function add_technician($tech) {
    global $db;
    $query = 'INSERT INTO technicians
                 (firstName, lastName, phone, email, password)
              VALUES
                 (:first_name, :last_name, :phone, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $tech->getFirstName());
    $statement->bindValue(':last_name', $tech->getLastName());
    $statement->bindValue(':phone', $tech->getPhone());
    $statement->bindValue(':email', $tech->getEmail());
    $statement->bindValue(':password', $tech->getPassword());
    $statement->execute();
    $statement->closeCursor();
}

?>