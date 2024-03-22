<?php

include "../settings/connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'])) {
        $productID = $_POST['product_id'];

        if (isset($_POST['condition'])) {
            $cartUpdateQuery = "UPDATE Carts SET quantity = quantity - 1 WHERE product_id = ?";
            $cartUpdateStmt = $conn->prepare($cartUpdateQuery);
            $cartUpdateStmt->bind_param("i", $productID);
            $cartUpdateStmt->execute();
            $cartUpdateStmt->close();

            $productUpdateQuery = "UPDATE Product SET quantity_chosen = quantity_chosen - 1 WHERE product_id = ?";
            $productUpdateStmt = $conn->prepare($productUpdateQuery);
            $productUpdateStmt->bind_param("i", $productID);
            $productUpdateStmt->execute();
            $productUpdateStmt->close();

            header('Location: ../views/cart.php?product_id=' . $productID);
        } else {
            $productUpdateQuery = "UPDATE Product SET quantity_chosen = quantity_chosen - 1 WHERE product_id = ?";
            $productUpdateStmt = $conn->prepare($productUpdateQuery);
            $productUpdateStmt->bind_param("i", $productID);
            $productUpdateStmt->execute();
            $productUpdateStmt->close();

            header('Location: ../details/detail 1.php?product_id=' . $productID);
        }
    } else {
        echo "Error";
    }
} else {
    echo "Error";
}
