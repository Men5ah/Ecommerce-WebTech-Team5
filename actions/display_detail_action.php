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
        $quantity_chosen = isset($row["quantity_chosen"]) ? $row["quantity_chosen"] : 0; // Set quantity to 0 if not found in cart
        $imageData = $row["image_data"];

        // Display product details
        echo '<div class="container-fluid pb-5">';
        echo '<div class="row px-xl-5">';
        echo '<div class="col-lg-5 mb-30">';
        echo '<div id="product-carousel" class="carousel slide" data-ride="carousel">';
        echo '<div class="carousel-inner bg-light">';
        echo '<div class="carousel-item active">';
        // echo '<img class="w-100 h-100" src="../img/product-' . $productId . '.jpeg" alt="Image">';
        echo '<img class="img-fluid w-100" src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="' . $productName . '">';

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-7 h-auto mb-30">';
        echo '<div class="h-100 bg-light p-30">';
        echo '<h3>' . $productName . '</h3>';
        echo '<div class="d-flex mb-3">';
        echo '<div class="text-primary mr-2">';
        echo '<small class="fas fa-star"></small>';
        echo '<small class="fas fa-star"></small>';
        echo '<small class="fas fa-star"></small>';
        echo '<small class="fas fa-star-half-alt"></small>';
        echo '<small class="far fa-star"></small>';
        echo '</div>';
        echo '<small class="pt-1">(99 Reviews)</small>';
        echo '</div>';
        echo '<h3 class="font-weight-semi-bold mb-4">' . $productPrice . '</h3>';
        echo '<p class="mb-4">' . $productDescription . '</p>';
        echo '<input type="hidden" name="product_id" value="' . $productId . '">';
        echo '<div class="d-flex mb-3">';
        echo '<strong class="text-dark mr-3">Sizes:</strong>';
        echo '<form>';
        for ($i = 1; $i <= 5; $i++) {
            echo '<div class="custom-control custom-radio custom-control-inline">';
            echo '<input type="radio" class="custom-control-input" id="size-' . $i . '" name="size">';
            echo '<label class="custom-control-label" for="size-' . $i . '">' . strtoupper(chr(64 + $i)) . 'S</label>';
            echo '</div>';
        }
        echo '</form>';
        echo '</div>';
        echo '<div class="d-flex mb-4">';
        echo '<strong class="text-dark mr-3">Colors:</strong>';
        echo '<form>';
        $colors = ["Black", "White", "Red", "Purple", "Green"];
        foreach ($colors as $index => $color) {
            echo '<div class="custom-control custom-radio custom-control-inline">';
            echo '<input type="radio" class="custom-control-input" id="color-' . ($index + 1) . '" name="color">';
            echo '<label class="custom-control-label" for="color-' . ($index + 1) . '">' . $color . '</label>';
            echo '</div>';
        }
        echo '</form>';
        echo '</div>';
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
