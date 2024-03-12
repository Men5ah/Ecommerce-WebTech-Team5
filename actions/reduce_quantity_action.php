<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'])) {
        $cartId = $_POST['product_id'];

        // Perform the reduction in the database
        $reduceQuery = "UPDATE Carts SET quantity = quantity - 1 WHERE product_id = ?";
        $reduceStmt = $conn->prepare($reduceQuery);
        $reduceStmt->bind_param("i", $cartId);
        $reduceStmt->execute();

        // Close the statement
        $reduceStmt->close();

        // Redirect back to the cart page
        header('Location: ../views/cart.php');
        exit();
    }
}
