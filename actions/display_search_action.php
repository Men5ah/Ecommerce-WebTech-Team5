<?php

function displayElectronicProducts()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE category_id = 1";

    $result = $conn->query($sql);

    // Display products and their images
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["category_id"] == 1) {
                $productId = $row["product_id"];
                $productName = $row["name"];
                $productDescription = $row["description"];
                $productPrice = $row["price"];
                $imagePath = $row["image_path"];

                echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<img class="img-fluid w-100" src="' . $imagePath . '" alt="' . $productName . '">';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="../views/confirm_action.php?productId=' . $productId . '"><i class="fa fa-shopping-cart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" href="">' . $productName . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h5>$' . $productPrice . '</h5>';
                echo '</div>';
                echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                echo '<small>(99)</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No products found in the database for the specified category.";
    }

    // Close connection
    $conn->close();
}


function displayFashionProducts()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE category_id = 2";

    $result = $conn->query($sql);

    // Display products and their images
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["category_id"] == 2) {
                $productId = $row["product_id"];
                $productName = $row["name"];
                $productDescription = $row["description"];
                $productPrice = $row["price"];
                $imagePath = $row["image_path"];

                echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<img class="img-fluid w-100" src="' . $imagePath . '" alt="' . $productName . '">';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="../views/confirm_action.php?productId=' . $productId . '"><i class="fa fa-shopping-cart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" href="">' . $productName . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h5>$' . $productPrice . '</h5>';
                echo '</div>';
                echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                echo '<small>(99)</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No products found in the database for the specified category.";
    }

    // Close connection
    $conn->close();
}


function displayStationeryProducts()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE category_id = 3";

    $result = $conn->query($sql);

    // Display products and their images
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["category_id"] == 3) {
                $productId = $row["product_id"];
                $productName = $row["name"];
                $productDescription = $row["description"];
                $productPrice = $row["price"];
                $imagePath = $row["image_path"];

                echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<img class="img-fluid w-100" src="' . $imagePath . '" alt="' . $productName . '">';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="../views/confirm_action.php?productId=' . $productId . '"><i class="fa fa-shopping-cart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" href="">' . $productName . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h5>$' . $productPrice . '</h5>';
                echo '</div>';
                echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                echo '<small>(99)</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No products found in the database for the specified category.";
    }

    // Close connection
    $conn->close();
}


function displaySkincareProducts()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE category_id = 4";

    $result = $conn->query($sql);

    // Display products and their images
    if ($result->num_rows > 0) {
        while (($row = $result->fetch_assoc())) {
            if ($row["category_id"] == 4) {
                $productId = $row["product_id"];
                $productName = $row["name"];
                $productDescription = $row["description"];
                $productPrice = $row["price"];
                $imagePath = $row["image_path"];

                echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<img class="img-fluid w-100" src="' . $imagePath . '" alt="' . $productName . '">';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="../views/confirm_action.php?productId=' . $productId . '"><i class="fa fa-shopping-cart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" href="">' . $productName . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h5>$' . $productPrice . '</h5>';
                echo '</div>';
                echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                echo '<small>(99)</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No products found in the database for the specified category.";
    }

    // Close connection
    $conn->close();
}


function displayFoodProducts()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE category_id = 5";

    $result = $conn->query($sql);

    // Display products and their images
    if ($result->num_rows > 0) {
        while (($row = $result->fetch_assoc())) {
            if ($row["category_id"] == 5) {
                $productId = $row["product_id"];
                $productName = $row["name"];
                $productDescription = $row["description"];
                $productPrice = $row["price"];
                $imagePath = $row["image_path"];

                echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<img class="img-fluid w-100" src="' . $imagePath . '" alt="' . $productName . '">';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="../views/confirm_action.php?productId=' . $productId . '"><i class="fa fa-shopping-cart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" href="">' . $productName . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h5>$' . $productPrice . '</h5>';
                echo '</div>';
                echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                echo '<small>(99)</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No products found in the database for the specified category.";
    }

    // Close connection
    $conn->close();
}


function displayHygieneProducts()
{
    include "../settings/connection.php";

    $sql = "SELECT * FROM Product WHERE category_id = 6";

    $result = $conn->query($sql);

    // Display products and their images
    if ($result->num_rows > 0) {
        while (($row = $result->fetch_assoc())) {
            if ($row["category_id"] == 6) {
                $productId = $row["product_id"];
                $productName = $row["name"];
                $productDescription = $row["description"];
                $productPrice = $row["price"];
                $imagePath = $row["image_path"];

                echo '<div class="col-lg-4 col-md-6 col-sm-6 pb-1">';
                echo '<div class="product-item bg-light mb-4">';
                echo '<div class="product-img position-relative overflow-hidden">';
                echo '<img class="img-fluid w-100" src="' . $imagePath . '" alt="' . $productName . '">';
                echo '<div class="product-action">';
                echo '<a class="btn btn-outline-dark btn-square" href="../views/confirm_action.php?productId=' . $productId . '"><i class="fa fa-shopping-cart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>';
                echo '<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="text-center py-4">';
                echo '<a class="h6 text-decoration-none text-truncate" href="">' . $productName . '</a>';
                echo '<div class="d-flex align-items-center justify-content-center mt-2">';
                echo '<h5>$' . $productPrice . '</h5>';
                echo '</div>';
                echo '<div class="d-flex align-items-center justify-content-center mb-1">';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star text-primary mr-1"></small>';
                echo '<small class="fa fa-star-half-alt text-primary mr-1"></small>';
                echo '<small>(99)</small>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    } else {
        echo "No products found in the database for the specified category.";
    }

    // Close connection
    $conn->close();
}
