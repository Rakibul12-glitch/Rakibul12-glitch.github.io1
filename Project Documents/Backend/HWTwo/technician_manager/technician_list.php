<?php include '../view/header.php'; 
 require_once '../model/technician.php';
?>
<main>

    <h1>Technician List</h1>

    <!-- display a table of technicians -->
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($technicians as $technician) : 
            $tech = new Technician();
            $tech->setTechID($technician['techID']);
            $tech->setFirstName($technician['firstName']);
            $tech->setLastName($technician['lastName']);
            $tech->setEmail($technician['email']);
            $tech->setPassword($technician['phone']);
            $tech->setPassword($technician['password']);            
            ?>
        <tr>
            <td><?php echo htmlspecialchars($tech->getFirstName()); ?></td>
            <td><?php echo htmlspecialchars($tech->getLastName()); ?></td>
            <td><?php echo htmlspecialchars($tech->getEmail()); ?></td>
            <td><?php echo htmlspecialchars($tech->getPhone()); ?></td>
            <td><?php echo htmlspecialchars($tech->getPassword()); ?></td>
            <td><form action="." method="post">
                <input type="hidden" name="action"
                       value="delete_technician">
                <input type="hidden" name="technician_id"
                       value="<?php echo htmlspecialchars($tech->getTechID()); ?>">
                <input type="submit" value="Delete">
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Technician</a></p>

</main>
<?php include '../view/footer.php'; ?>