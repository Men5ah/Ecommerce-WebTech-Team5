<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $cartId = $_POST['product_id'];
    echo $cartId;

    // Perform the deletion logic using $cartId
    $deleteQuery = "DELETE FROM Carts WHERE product_id = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $cartId);
    $deleteStmt->execute();

    // Handle any additional logic after deletion if needed
    header('Location: ../views/cart.php');

    $deleteStmt->close();
    $conn->close();
} else {
    // Handle the case when the form is not properly submitted
    echo "Invalid request.";
}
