<?php
include "../settings/connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'])) {
        $productID = $_POST['product_id'];
        $userID = $_SESSION['user_id'];

        $reduceQuery = "UPDATE Carts SET quantity = quantity - 1 WHERE product_id = ? AND user_id = ?";
        $reduceStmt = $conn->prepare($reduceQuery);
        $reduceStmt->bind_param("ii", $productID, $userID);
        $reduceStmt->execute();

        $reduceStmt->close();

        header('Location: ../views/cart.php');
        exit();
    }
}

