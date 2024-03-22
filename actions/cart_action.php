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
                exit(); // Stop further execution
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
    // echo "Invalid request.";
    // $conn->close();
}

// Close connection
$conn->close();









// if (isset($_POST['product_id'])) {
//     $productId = $_POST['product_id'];
//     $userId = $_SESSION['user_id'];

//     // Check if the product exists in the Product table
//     $checkProductQuery = "SELECT quantity_chosen, quantity_available FROM Product WHERE product_id = ?";
//     $checkProductStmt = $conn->prepare($checkProductQuery);
//     $checkProductStmt->bind_param("i", $productId);
//     $checkProductStmt->execute();
//     $checkProductResult = $checkProductStmt->get_result();

//     if ($checkProductResult->num_rows > 0) {
//         $productRow = $checkProductResult->fetch_assoc();
//         $quantityChosen = $productRow['quantity_chosen'];
//         $quantityAvailable = $productRow['quantity_available'];

//         // Check if the product is already in the cart
//         $checkIfExistsQuery = "SELECT quantity FROM Carts WHERE user_id = ? AND product_id = ?";
//         $checkIfExistsStmt = $conn->prepare($checkIfExistsQuery);
//         $checkIfExistsStmt->bind_param("ii", $userId, $productId);
//         $checkIfExistsStmt->execute();
//         $checkIfExistsResult = $checkIfExistsStmt->get_result();

//         if ($checkIfExistsResult->num_rows > 0) {
//             // If the product already exists in the cart, update the quantity based on quantity_chosen
//             $updateQuantityQuery = "UPDATE Carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
//             $updateQuantityStmt = $conn->prepare($updateQuantityQuery);
//             $newQuantity = min($quantityChosen, $quantityAvailable); // Ensure the cart quantity doesn't exceed available quantity
//             $updateQuantityStmt->bind_param("iii", $newQuantity, $userId, $productId);
//             $updateQuantityStmt->execute();
//             $updateQuantityStmt->close();
//         } else {
//             // If the product is not in the cart, add it with the quantity chosen from the Product table
//             $addToCartQuery = "INSERT INTO Carts (user_id, product_id, quantity) VALUES (?, ?, ?)";
//             $addToCartStmt = $conn->prepare($addToCartQuery);
//             $addToCartStmt->bind_param("iii", $userId, $productId, $quantityChosen);
//             $addToCartStmt->execute();
//             $addToCartStmt->close();
//         }

//         // Redirect to cart page after updating/adding to cart
//         header("Location: ../views/cart.php");
//         exit();
//     } else {
//         // Product with the provided ID does not exist
//         echo "Product with ID $productId does not exist.";
//     }
// } else {
//     // Invalid request, product ID not provided
//     echo "Invalid request.";
// }

// // Close connection
// $conn->close();


// if (isset($_POST['product_id'])) {
//     $productId = $_POST['product_id'];
//     $userId = $_SESSION['user_id'];

//     // Check if the product exists in the Product table
//     $checkProductQuery = "SELECT * FROM Product WHERE product_id = ?";
//     $checkProductStmt = $conn->prepare($checkProductQuery);
//     $checkProductStmt->bind_param("i", $productId);
//     $checkProductStmt->execute();
//     $checkProductResult = $checkProductStmt->get_result();

//     if ($checkProductResult->num_rows > 0) {
//         // If the product exists, proceed with adding to the cart
//         $checkIfExistsQuery = "SELECT * FROM Carts WHERE user_id = ? AND product_id = ?";
//         $checkIfExistsStmt = $conn->prepare($checkIfExistsQuery);
//         $checkIfExistsStmt->bind_param("ii", $userId, $productId);
//         $checkIfExistsStmt->execute();
//         $checkIfExistsResult = $checkIfExistsStmt->get_result();

//         // if ($checkIfExistsResult->num_rows > 0) {
//         //     // If the product already exists in the cart, update the quantity
//         //     $updateQuantityQuery = "UPDATE Carts SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?";
//         //     $updateQuantityStmt = $conn->prepare($updateQuantityQuery);
//         //     $updateQuantityStmt->bind_param("ii", $userId, $productId);
//         //     $updateQuantityStmt->execute();

//         //     header("Location: ../views/cart.php");
//         //     exit();
//         // } else {
//         //     // If the product is not in the cart, add it with a quantity of 1
//         //     $insertIntoCartQuery = "INSERT INTO Carts (user_id, product_id, quantity) VALUES (?, ?, 1)";
//         //     $insertIntoCartStmt = $conn->prepare($insertIntoCartQuery);
//         //     $insertIntoCartStmt->bind_param("ii", $userId, $productId);
//         //     // header("Location: ../views/cart.php");

//         //     // Check if the insertion was successful
//         //     if ($insertIntoCartStmt->execute()) {
//         //         header("Location: ../views/cart.php");
//         //         exit();
//         //     } else {
//         //         echo "Error inserting into Carts: ";
//         //         $conn->error;
//         //     }
//         // }
//         if ($checkIfExistsResult->num_rows > 0) {
//             // If the product already exists in the cart, update the quantity
//             $productQuery = "SELECT quantity_chosen, quantity_available FROM Product WHERE product_id = ?";
//             $productStmt = $conn->prepare($productQuery);
//             $productStmt->bind_param("i", $productId);
//             $productStmt->execute();
//             $productResult = $productStmt->get_result();

//             if ($productResult->num_rows > 0) {
//                 $productRow = $productResult->fetch_assoc();
//                 $quantityChosen = $productRow['quantity_chosen'];
//                 $quantityAvailable = $productRow['quantity_available'];

//                 if ($quantityChosen < $quantityAvailable) {
//                     // If quantity chosen is less than quantity available, update the quantity in the cart
//                     $updateQuantityQuery = "UPDATE Carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
//                     $newQuantity = $quantityChosen + 1;
//                     $updateQuantityStmt = $conn->prepare($updateQuantityQuery);
//                     $updateQuantityStmt->bind_param("iii", $newQuantity, $userId, $productId);
//                     $updateQuantityStmt->execute();

//                     header("Location: ../views/cart.php");
//                     exit();
//                 } else {
//                     // Quantity chosen exceeds available quantity, handle accordingly
//                     echo "Quantity chosen exceeds available quantity.";
//                     // Redirect or display an error message as per your requirement
//                 }
//             } else {
//                 // Product not found in the Product table, handle accordingly
//                 echo "Product not found.";
//                 // Redirect or display an error message as per your requirement
//             }
//         } else {
//             // Product not found in the cart, handle accordingly
//             echo "Product not found in the cart.";
//             // Redirect or display an error message as per your requirement
//         }

//     } else {
//         echo "Product with ID $productId does not exist.";
//     }
// } else {
//     // echo 'Invalid request.';
//     $conn->close();
// }


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

        // Check if $cartCount is null, indicating no items in the cart
        if ($cartCount === null) {
            $cartCount = 0; // Set cart count to 0
        }

        echo $cartCount;
    } else {
        // User is not logged in, return 0
        echo "0";
    }
}


// function getSubTotal()
// {
//     include "../settings/connection.php";

//     if (isset($_SESSION['user_id'])) {
//         $userId = $_SESSION['user_id'];

//         $cartCountQuery = "SELECT SUM(total) as total FROM Carts WHERE user_id = ?";
//         $cartCountStmt = $conn->prepare($cartCountQuery);
//         $cartCountStmt->bind_param("i", $userId);
//         $cartCountStmt->execute();
//         $result = $cartCountStmt->get_result();
//         $cartCount = $result->fetch_assoc()['total'] ?? 0;

//         $cartCountStmt->close();

//         return $cartCount;
//     }

//     return 0;
// }
