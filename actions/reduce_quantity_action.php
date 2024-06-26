<?php
// include "../settings/connection.php";

// session_start();
// echo "Something";
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if (isset($_POST['product_id'])) {
//         $productID = $_POST['product_id'];
//         $userID = $_SESSION['user_id'];

//         $reduceQuery = "UPDATE Carts SET quantity = quantity - 1 WHERE product_id = ? AND user_id = ?";
//         $reduceStmt = $conn->prepare($reduceQuery);
//         $reduceStmt->bind_param("ii", $productID, $userID);
//         $reduceStmt->execute();

//         $reduceStmt->close();

//         echo $_POST['condition'];
//         // Redirect back to the cart page
//         if (isset($_POST['condition'])) {
//             header('Location: ../details/detail 1.php?product_id=' . $productID);
//         } else {
//             // header('Location: ../views/cart.php');
//         }
//         exit();

//         // header('Location: ../views/cart.php');
//         // exit();
//     } else {
//         echo "Error";
//     }
// }
// else {
//     echo "Error";
// }


include "../settings/connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'])) {
        $productID = $_POST['product_id'];
        $userID = $_SESSION['user_id'];

        // Perform the reduction in the database
        $reduceQuery = "UPDATE Carts SET quantity = quantity - 1 WHERE product_id = ? AND user_id = ?";
        $reduceStmt = $conn->prepare($reduceQuery);
        $reduceStmt->bind_param("ii", $productID, $userID);
        $reduceStmt->execute();

        // Close the statement
        $reduceStmt->close();

        // echo $_POST['condition'];
        // Redirect back to the cart page
        if (isset($_POST['condition'])) {
            header('Location: ../details/detail 1.php?product_id=' . $productID);
        } else {
            header('Location: ../views/cart.php');
        }
        // header('Location: ../details/detail 1.php');
        exit();
    } else {
        echo "Error";
    }
}
else {
    echo "Error";
}