<?php
// include_once "../settings/connection.php";

// // Get user input
// $firstName = $_POST['firstName'];
// $lastName = $_POST['lastName'];
// $email = $_POST['email'];
// $password = $_POST['Password']; // Assuming the password is plain text here
// $phoneNumber = $_POST['phone'];
// $location = $_POST['location'];
// $role = $_POST['role'];

// // Hash the password
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// // Use prepared statement for insertion
// $sql = "INSERT INTO Person (fname, lname, Email, Password, Phone_Number, City, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("sssssss", $firstName, $lastName, $email, $hashedPassword, $phoneNumber, $location, $role);

// if ($stmt->execute()) {
//     // echo "User registered successfully";
//     header("Location: ../views/login.php");
//     exit;
// } else {
//     error_log("SQL Error: " . $sql . " - " . $stmt->error);
//     echo "Something went wrong. Please try again later.";
// }

// $stmt->close();
// $conn->close();

include_once "../settings/connection.php";

// Get user input
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['Password']; // Assuming the password is plain text here
$phoneNumber = $_POST['phone'];
$location = $_POST['location'];
$role = $_POST['role'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Use prepared statement for insertion
$sql = "INSERT INTO Person (fname, lname, Email, Password, Phone_Number, City, role_id) VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$phoneNumber', '$location', '$role')";

if ($conn->query($sql) === TRUE) {
    // echo "User registered successfully";
    header("Location: ../views/login.php");
    exit;
} else {
    // Handle error
    error_log("SQL Error: " . $conn->error);
    echo "Something went wrong. Please try again later.";
}

$conn->close();
?>
