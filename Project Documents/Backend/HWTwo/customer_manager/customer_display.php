<?php include '../view/header.php';
 require_once '../model/customer.php';
 $cust = new Customer();
?>
<main>

    <!-- display a table of customer information -->
    <h2>View/Update Customer</h2>
    <?php
    $cust->setId($customer['customerID']);
    $cust->setFirstName($customer['firstName']);
    $cust->setLastName($customer['lastName']);
    $cust->setAddress($customer['address']);
    $cust->setCity($customer['city']);
    $cust->setState($customer['state']);
    $cust->setPostalCode($customer['postalCode']);
    $cust->setCountryCode($customer['countryCode']);
    $cust->setPhone($customer['phone']);
    $cust->setEmail($customer['email']);
    $cust->setPassword($customer['password']);
    ?>
    <form action="." method="post" id="aligned">
        <input type="hidden" name="action" value="update_customer">
        <input type="hidden" name="customer_id" 
               value="<?php echo htmlspecialchars($cust->getId()); ?>">

        <label>First Name:</label>
        <input type="text" name="first_name" 
               value="<?php echo htmlspecialchars($cust->getFirstName()); ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" 
               value="<?php echo htmlspecialchars($cust->getLastName()); ?>"><br>

        <label>Address:</label>
        <input type="text" name="address" 
               value="<?php echo htmlspecialchars($cust->getAddress()); ?>" 
               size="50"><br>

        <label>City:</label>
        <input type="text" name="city" 
               value="<?php echo htmlspecialchars($cust->getCity()); ?>"><br>

        <label>State:</label>
        <input type="text" name="state" 
               value="<?php echo htmlspecialchars($cust->getState()); ?>"><br>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" 
               value="<?php echo htmlspecialchars($cust->getPostalCode()); ?>"><br>

        <label>Country Code:</label>
        <select name="country_code">
            <?php foreach ($countries as $country) : ?>  
                <option value="<?php echo $country['countryCode']; ?>" 
                        <?php if ($country['countryCode'] == $cust->getCountryCode()) {
                            echo 'selected';
                        } ?> >
                        <?php echo $country['countryName']; ?></option>
            <?php endforeach; ?>
        </select>

        <br>

        <label>Phone:</label>
        <input type="text" name="phone" 
               value="<?php echo htmlspecialchars($cust->getPhone()); ?>"><br>

        <label>Email:</label>
        <input type="text" name="email" 
               value="<?php echo htmlspecialchars($cust->getEmail()); ?>" 
               size="50"><br>

        <label>Password:</label>
        <input type="text" name="password" 
               value="<?php echo htmlspecialchars($cust->getPassword()); ?>"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Customer"><br>
    </form>
    <p><a href="">Search Customers</a></p>

</main>
<?php include '../view/footer.php'; ?>