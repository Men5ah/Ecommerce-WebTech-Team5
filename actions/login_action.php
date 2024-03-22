<?php
include "../settings/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$LoginError = "";

if (isset($_POST['email']) && isset($_POST['Password'])) {
    $email = $_POST['email'];
    $password = $_POST['Password'];

    // Use prepared statement for SELECT
    $sql = "SELECT * FROM Person WHERE email = ?";
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
            $_SESSION['user_id'] = $current_user['person_id'];
            $_SESSION['role_id'] = $current_user['role_id'];

            if ($_SESSION['role_id']  == 1){
                echo ($_SESSION['role_id']);
                header('Location: ../views/sellerhome.php');      
            } else {
                echo $_SESSION['role_id'];
                header("Location: ../views/userhome.php");
                exit();
            }
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
