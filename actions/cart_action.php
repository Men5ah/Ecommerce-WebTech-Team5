<?php
include_once "../settings/connection.php";
include "../settings/core.php";

if (isset($_POST['product_id'])) {
    // $productId = $_POST['addToCart'];
    $productId = $_POST['product_id'];
    // echo $productId;
    $userId = $_SESSION['user_id'];

    // Check if the product exists in the Product table
    $checkProductQuery = "SELECT * FROM Product WHERE product_id = ?";
    $checkProductStmt = $conn->prepare($checkProductQuery);
    $checkProductStmt->bind_param("i", $productId);
    $checkProductStmt->execute();
    $checkProductResult = $checkProductStmt->get_result();

    if ($checkProductResult->num_rows > 0) {
        // If the product exists, proceed with adding to the cart
        $checkIfExistsQuery = "SELECT * FROM Carts WHERE user_id = ? AND product_id = ?";
        $checkIfExistsStmt = $conn->prepare($checkIfExistsQuery);
        $checkIfExistsStmt->bind_param("ii", $userId, $productId);
        $checkIfExistsStmt->execute();
        $checkIfExistsResult = $checkIfExistsStmt->get_result();

        if ($checkIfExistsResult->num_rows > 0) {
            // If the product already exists in the cart, update the quantity
            $updateQuantityQuery = "UPDATE Carts SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
            $updateQuantityStmt = $conn->prepare($updateQuantityQuery);
            $updateQuantityStmt->bind_param("ii", $userId, $productId);
            $updateQuantityStmt->execute();

            header("Location: ../views/cart.php");
            exit();
        } else {
            // If the product is not in the cart, add it with a quantity of 1
            $insertIntoCartQuery = "INSERT INTO Carts (user_id, product_id, quantity) VALUES (?, ?, 1)";
            $insertIntoCartStmt = $conn->prepare($insertIntoCartQuery);
            $insertIntoCartStmt->bind_param("ii", $userId, $productId);
            // header("Location: ../views/cart.php");

            // Check if the insertion was successful
            if ($insertIntoCartStmt->execute()) {
                // Redirect the user to the cart page or any other page as needed
                header("Location: ../views/cart.php");
                exit();
            } else {
                echo "Error inserting into Carts: ";
                //  . $conn->error;
            }
        }
    } else {
        echo "Product with ID $productId does not exist.";
    }
} else {
    // echo 'Invalid request.';
}

$conn->close();

function getCartCount()
{
    include "../settings/connection.php";

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        $cartCountQuery = "SELECT SUM(quantity) as total FROM Carts WHERE user_id = ?";
        $cartCountStmt = $conn->prepare($cartCountQuery);
        $cartCountStmt->bind_param("i", $userId);
        $cartCountStmt->execute();
        $result = $cartCountStmt->get_result();
        $cartCount = $result->fetch_assoc()['total'] ?? 0;

        $cartCountStmt->close();

        return $cartCount;
    }

    return 0;
}

function getSubTotal()
{
    include "../settings/connection.php";

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        $cartCountQuery = "SELECT SUM(total) as total FROM Carts WHERE user_id = ?";
        $cartCountStmt = $conn->prepare($cartCountQuery);
        $cartCountStmt->bind_param("i", $userId);
        $cartCountStmt->execute();
        $result = $cartCountStmt->get_result();
        $cartCount = $result->fetch_assoc()['total'] ?? 0;

        $cartCountStmt->close();

        return $cartCount;
    }

    return 0;
}
