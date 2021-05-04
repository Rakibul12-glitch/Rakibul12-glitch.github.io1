<?php include '../view/header.php'; ?>
<?php require_once '../model/incident.php';
$inc = new Incident();
?>



    <h2>Create Incident</h2>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php else: ?>
        <form action="." method="post" id="aligned">
            <input type="hidden" name="action"
                   value="create_incident">
            <input type="hidden" name="customer_id"
                   value="<?php echo htmlspecialchars($customer['customerID']); ?>">

            <label>Customer:</label>
            <label><?php echo htmlspecialchars(
                    $customer['firstName'] . ' ' . 
                    $customer['lastName']); ?></label>
            <br>

            <label>Product:</label>
            <select name="product_code">
            <?php foreach ($products as $product) : 
                $inc->setProductCode($product['productCode']);
                ?>
                
                <option value="<?php echo htmlspecialchars($product['productCode']); ?>"
                         <?php if ($product['productCode'] == $inc->getProductCode()) {
                            echo 'selected';
                        } ?> >
                    <?php echo htmlspecialchars($product['name']); ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>

            <label>Title:</label>
            <input type="text" name="title"><br>

            <label>Description:</label>
            <textarea name="description" cols="40" rows="5"></textarea><br>

            <label>&nbsp;</label>
            <input type="submit" value="Create Incident">
        </form>
    <?php endif; ?>


<?php include '../view/footer.php'; ?>