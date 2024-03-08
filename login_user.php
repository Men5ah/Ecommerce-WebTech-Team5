<?php
include "connection.php";
session_start();

$LoginError = "";

if (isset($_POST['email']) && isset($_POST['Password'])) {
    $email = $_POST['email'];
    $password = $_POST['Password'];

    // Use prepared statement for SELECT
    $sql = "SELECT * FROM person WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $current_user = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $current_user["Password"])) {
            $_SESSION['user_ID'] = $current_user['person_id'];

            header("Location: ../Ecommerce-WebTech-Team5/FrontendEcomXpress/home.php");
            exit();
        } else {
            echo "Invalid Email or Password!";
        }

        $stmt->close();
    } else {
        $LoginError = "That email does not exist in our database.";
        echo $LoginError;
    }
} else {
    $LoginError = "Email or Password not provided.";
    echo $LoginError;
}
