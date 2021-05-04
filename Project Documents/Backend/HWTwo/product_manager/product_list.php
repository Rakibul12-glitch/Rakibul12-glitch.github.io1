<?php include '../view/header.php'; 
 require_once '../model/product.php';
?>
<main>
    <h1>Product List</h1>

    <!-- display a table of products -->
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($products as $product) :
                $prod = new Product();
                $prod->setProductCode($product['productCode']);
                $prod->setName($product['name']);
                $prod->setVersion($product['version']);
                $prod->setReleaseDate($product['releaseDate']);        
            ?>
        <tr>
            <td><?php echo htmlspecialchars($prod->getProductCode()); ?></td>
            <td><?php echo htmlspecialchars($prod->getName()); ?></td>
            <td><?php echo htmlspecialchars($prod->getVersion()); ?></td>
            <td><?php echo htmlspecialchars($prod->getReleaseDate()); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_product">
                <input type="hidden" name="product_code"
                       value="<?php echo htmlspecialchars($prod->getProductCode()); ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Product</a></p>

</main>
<?php include '../view/footer.php'; ?>