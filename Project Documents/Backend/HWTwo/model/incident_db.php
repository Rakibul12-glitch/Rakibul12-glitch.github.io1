<?php
function add_incident($incident) {
    global $db;
    $date_opened = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query =
        'INSERT INTO incidents
            (customerID, productCode, dateOpened, title, description)
        VALUES (
               :customer_id, :product_code, :date_opened,
               :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $incident->getCustomerID());
    $statement->bindValue(':product_code', $incident->getProductCode());
    $statement->bindValue(':date_opened', $incident->getDateOpened());
    $statement->bindValue(':title', $incident->getTitle());
    $statement->bindValue(':description', $incident->getDescription());
    $statement->execute();
    $statement->closeCursor();
}
?>