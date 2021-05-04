<?php
function add_registration($cust, $prod) {
    global $db;
    $date = date('Y-m-d');  // get current date in yyyy-mm-dd format
    $query = 'INSERT INTO registrations VALUES
            (:customer_id, :product_code, :date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $cust->getId());
    $statement->bindValue(':product_code', $prod->getProductCode());
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
?>