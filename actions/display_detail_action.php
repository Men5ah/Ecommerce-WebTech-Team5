<?php
include "../settings/core.php";

function displayProductDetails($productId)
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE product_id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productName = $row["name"];
        $productDescription = $row["description"];
        $productPrice = $row["price"];
        $imagePath = $row["image_path"];
        $quantity_chosen = isset($row["quantity_chosen"]) ? $row["quantity_chosen"] : 0; // Set quantity to 0 if not found in cart

        // Display product details
        echo '<div class="d-flex align-items-center mb-4 pt-2">';
        echo '<div class="input-group quantity mr-3" style="width: 130px;">';
        echo '<div class="input-group-btn">';
        echo '<form action="../actions/reduce_quantity_action.php" method="post">';
        echo '<button class="btn btn-primary btn-minus" type="submit" name="product_id" value="' . $productId . '">';
        echo '<i class="fa fa-minus"></i>';
        echo '</button>';
        echo '</form>';
        echo '</div>';
        echo '<input type="text" id="quantityInput" class="form-control bg-secondary border-0 text-center" value="' . $quantity_chosen . '">';
        echo '<div class="input-group-btn">';
        echo '<form action="../actions/increase_quantity_action.php" method="post">';
        echo '<button class="btn btn-primary btn-plus" type="submit" name="product_id" value="' . $productId . '">';
        echo '<i class="fa fa-plus"></i>';
        echo '</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '<form action="../actions/cart_action.php" method="post">';
        echo '<input type="hidden" name="product_id" value="' . $productId . '">';
        echo '<button class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>';
        echo '</form>';
        echo '</div>';
    } else {
        echo "Product not found.";
    }
    $conn->close();
}
