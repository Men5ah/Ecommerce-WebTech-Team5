<?php
include "../settings/connection.php";

// Get user input
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['Password']; // Assuming the password is plain text here
$phoneNumber = $_POST['phone'];
$location = $_POST['location'];
$role = 2;

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Use prepared statement for insertion
$sql = "INSERT INTO Person (fname, lname, Email, Password, Phone_Number, City, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $location, $role);

if ($stmt->execute()) {
    // echo "User registered successfully";
    header("Location: ../views/login.php");
    exit;
} else {
    error_log("SQL Error: " . $sql . " - " . $stmt->error);
    echo "Something went wrong. Please try again later.";
}

$stmt->close();
$conn->close();
