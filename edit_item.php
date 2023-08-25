<?php
// edit_item.php
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $_POST["item_id"];
    $itemName = $_POST["item_name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $updateQuery = "UPDATE Items SET Name='$itemName', Quantity=$quantity, Price=$price WHERE ID=$itemID";
    if ($conn->query($updateQuery) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} elseif (isset($_GET["id"])) {
    $itemID = $_GET["id"];
    $selectQuery = "SELECT * FROM Items WHERE ID=$itemID";
    $result = $conn->query($selectQuery);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <form method="post" action="">
        <input type="hidden" name="item_id" value="<?php echo $row['ID']; ?>">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" value="<?php echo $row['Name']; ?>" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $row['Quantity']; ?>" required><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $row['Price']; ?>" required><br>
        <input type="submit" value="Update Item">
    </form>
</body>
</html>
