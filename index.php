<?php
// index.php
require_once("config.php");

$query = "SELECT * FROM Items";
$result = $conn->query($query);

// Initialize total value
$totalValue = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
</head>
<body>
    <h1>Inventory Items</h1>
    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['Name']."</td>";
            echo "<td>".$row['Quantity']."</td>";
            echo "<td>".$row['Price']."</td>";
            echo "<td><a href='edit_item.php?id=".$row['ID']."'>Edit</a></td>";
            echo "</tr>";

            // Calculate item value and add to total
            $itemValue = $row['Quantity'] * $row['Price'];
            $totalValue += $itemValue;
        }
        ?>
    </table>
    <br>
    <p>Total Inventory Value: $<?php echo number_format($totalValue, 2); ?></p>
    <a href="add_item.php">Add New Item</a>
</body>
</html>
