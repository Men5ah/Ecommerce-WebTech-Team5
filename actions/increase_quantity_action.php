<?php

include "../settings/connection.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['product_id'])) {
        $productID = $_POST['product_id'];

        // Perform the update in the database
        $updateQuery = "UPDATE Product SET quantity_chosen = quantity_chosen + 1 WHERE product_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("i", $productID);
        $updateStmt->execute();

        // Close the statement
        $updateStmt->close();

        header('Location: ../details/detail 1.php?product_id=' . $productID);
        exit();
    } else {
        echo "Error";
    }
} else {
    echo "Error";
}

// include "../settings/connection.php";

// session_start();

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //     if (isset($_POST['product_id'])) {
        //         $productID = $_POST['product_id'];
        //         $userID = $_SESSION['user_id'];
        
        //         // Perform the reduction in the database
        //         $reduceQuery = "UPDATE Carts SET quantity = quantity + 1 WHERE product_id = ? AND user_id = ?";
        //         $reduceStmt = $conn->prepare($reduceQuery);
        //         $reduceStmt->bind_param("ii", $productID, $userID);
        //         $reduceStmt->execute();
        
        //         // Close the statement
        //         $reduceStmt->close();
        
        //         header('Location: ../details/detail 1.php?product_id=' . $productID);
        //         exit();
        //     } else {
            //         echo "Error";
            //     }
            // }
            // else {
                //     echo "Error";
                // }
    ?>