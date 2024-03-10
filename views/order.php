<?php
include "../settings/connection.php";

// Get data from the form
$billing_first_name = $_POST['billing_first_name'];
$billing_last_name = $_POST['billing_last_name'];
$billing_email = $_POST['billing_email'];
$billing_mobile_no = $_POST['billing_mobile_no'];
$billing_address_line1 = $_POST['billing_address_line1'];
$billing_address_line2 = $_POST['billing_address_line2'];
// $billing_country = $_POST['billing_country'];
$billing_country = "Ghana";
$billing_city = $_POST['billing_city'];
$billing_state = $_POST['billing_state'];
$billing_zip_code = $_POST['billing_zip_code'];
// ... (repeat for other form fields)

// Calculate total amount (example, adjust this based on your logic)
// $subtotal = $_POST['product1_price'] + $_POST['product2_price'] + $_POST['product3_price'];
// $shipping_cost = $_POST['shipping_cost'];
// $total_amount = $subtotal + $shipping_cost;

// Insert data into the Orders table
$sql = "INSERT INTO Orders (
    billing_first_name,
    billing_last_name,
    billing_email,
    billing_mobile_no,
    billing_address_line1,
    billing_address_line2,
    billing_country,
    billing_city,
    billing_state,
    billing_zip_code,
    status
) VALUES (
    '$billing_first_name',
    '$billing_last_name',
    '$billing_email',
    '$billing_mobile_no',
    '$billing_address_line1',
    '$billing_address_line2',
    '$billing_country',
    '$billing_city',
    '$billing_state',
    '$billing_zip_code',
    'Pending'
)";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
