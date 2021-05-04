<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_products_by_customer($cust) {
    global $db;
    $query = 'SELECT products.productCode, products.name 
              FROM products
                INNER JOIN registrations ON products.productCode = registrations.productCode
                INNER JOIN customers ON registrations.customerID = customers.customerID
              WHERE customers.email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $cust->getEmail());
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function delete_product($prod) {
    global $db;
    $query = 'DELETE FROM products
              WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $prod->getProductCode());
    $statement->execute();
    $statement->closeCursor();
}

function add_product($prod) {
    global $db;
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :release_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $prod->getProductCode());
    $statement->bindValue(':name', $prod->getName());
    $statement->bindValue(':version', $prod->getVersion());
    $statement->bindValue(':release_date', $prod->getReleaseDate());
    $statement->execute();
    $statement->closeCursor();
}
?>