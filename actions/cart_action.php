<?php
include "../settings/connection.php";
include "../settings/core.php";

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['user_id'];

    // Check if the product exists in the Product table
    $checkProductQuery = "SELECT quantity_chosen, quantity_available FROM Product WHERE product_id = ?";
    $checkProductStmt = $conn->prepare($checkProductQuery);
    $checkProductStmt->bind_param("i", $productId);
    $checkProductStmt->execute();
    $checkProductResult = $checkProductStmt->get_result();

    if ($checkProductResult->num_rows > 0) {
        $productRow = $checkProductResult->fetch_assoc();
        $quantityChosen = $productRow['quantity_chosen'];
        $quantityAvailable = $productRow['quantity_available'];

        // Check if the product is already in the cart
        $checkIfExistsQuery = "SELECT quantity FROM Carts WHERE user_id = ? AND product_id = ?";
        $checkIfExistsStmt = $conn->prepare($checkIfExistsQuery);
        $checkIfExistsStmt->bind_param("ii", $userId, $productId);
        $checkIfExistsStmt->execute();
        $checkIfExistsResult = $checkIfExistsStmt->get_result();

        if ($checkIfExistsResult->num_rows > 0) {
            // If the product already exists in the cart, update the quantity based on quantity_chosen
            $checkIfExistsRow = $checkIfExistsResult->fetch_assoc();
            $cartQuantity = $checkIfExistsRow['quantity'];
            $newQuantity = min($quantityChosen, $quantityAvailable); // Ensure the cart quantity doesn't exceed available quantity

            if ($quantityChosen > $quantityAvailable) {
                echo "The quantity is insufficient.";
                exit();
            } else {
                $updateQuantityQuery = "UPDATE Carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
                $updateQuantityStmt = $conn->prepare($updateQuantityQuery);
                $updateQuantityStmt->bind_param("iii", $newQuantity, $userId, $productId);
                $updateQuantityStmt->execute();
                $updateQuantityStmt->close();
            }
        } else {
            // If the product is not in the cart, add it with the quantity chosen from the Product table
            if ($quantityChosen > $quantityAvailable) {
                echo "The quantity is insufficient.";
                exit();
            }

            $addToCartQuery = "INSERT INTO Carts (user_id, product_id, quantity) VALUES (?, ?, ?)";
            $addToCartStmt = $conn->prepare($addToCartQuery);
            $addToCartStmt->bind_param("iii", $userId, $productId, $quantityChosen);
            $addToCartStmt->execute();
            $addToCartStmt->close();
        }

        // Redirect to cart page after updating/adding to cart
        header("Location: ../views/cart.php");
        exit();
    } else {
        // Product with the provided ID does not exist
        echo "Product with ID $productId does not exist.";
    }
} else {
    // Invalid request, product ID not provided
    // echo "Invalid request.";                        These have been commented out because more than one they dsiplay on pages that do not need the product_id to be present when tyhey redurect to the cart_action.php file
    // $conn->close();                                 
}

// Close connection
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
        $cartCount = $result->fetch_assoc()['total'];

        $cartCountStmt->close();

        if ($cartCount === null) {
            $cartCount = 0;
        }

        echo $cartCount;
    } else {
        echo "User not logged in";
    }
}