<?php

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST["item_name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    $insertQuery = "INSERT INTO Items (Name, Quantity, Price) VALUES ('$itemName', $quantity, $price)";
    if ($conn->query($insertQuery) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Item</title>
</head>
<body>
    <h1>Add New Item</h1>
    <form method="post" action="">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" required><br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required><br>
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
