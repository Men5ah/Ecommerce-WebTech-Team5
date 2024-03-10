<?php
include "../actions/display_search_action.php";

if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
} else {
    echo "Product ID not provided in the URL.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Adding to Cart</title>
</head>

<body>

    <!-- Confirmation form -->
    <form id="addToCart" action="../actions/cart_action.php" method="POST">
        <!-- Include the hidden input field for productId -->
        <input type="hidden" name="productId" value="<?php echo $productId; ?>">

        <!-- Button to trigger confirmation -->
        <button type="submit" class="btn btn-outline-dark btn-square" name="addToCart">Add to Cart</button>
    </form>
</body>

</html>