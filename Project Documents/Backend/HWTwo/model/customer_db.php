<?php
function country_list() {
        global $db;
        $query = 'SELECT * FROM countries';
        $statement = $db->prepare($query);
        $statement->execute();
        $countries = $statement->fetchAll();
        $statement->closeCursor();
        return $countries;
    }

function get_customers_by_last_name($cust) {
    global $db;
    $query = 'SELECT customerID, firstName, lastName, email, city FROM customers
              WHERE lastName = :last_name
              ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->bindValue(':last_name', $cust->getLastName());
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
    return $customers;
}

function get_customer($cust) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $cust->getId());
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function get_customer_by_email($cust) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $cust->getEmail());
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function update_customer($cust) {
    global $db;
    $query = 'UPDATE customers
              SET firstName = :first_name,
                  lastName = :last_name,
                  address = :address,
                  city = :city,
                  state = :state,
                  postalCode = :postal_code,
                  countryCode = :country_code,
                  phone = :phone,
                  email = :email,
                  password = :password
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $cust->getFirstName());
    $statement->bindValue(':last_name', $cust->getLastName());
    $statement->bindValue(':address', $cust->getAddress());
    $statement->bindValue(':city', $cust->getCity());
    $statement->bindValue(':state', $cust->getState());
    $statement->bindValue(':postal_code', $cust->getPostalCode());
    $statement->bindValue(':country_code', $cust->getCountryCode());
    $statement->bindValue(':phone', $cust->getPhone());
    $statement->bindValue(':email', $cust->getEmail());
    $statement->bindValue(':password', $cust->getPassword());
    $statement->bindValue(':customer_id', $cust->getId());
    $statement->execute();
    $statement->closeCursor();
}
?>