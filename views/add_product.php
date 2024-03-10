<?php
include "../settings/core.php";
include "../functions/select_category.php";
redirectID();
checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../css/add_product.css">
</head>

<body>
    <h1>Add Product</h1>
    <form action="../actions/add_product_action.php" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <label for="category">Category:</label>
        <select name="category" required>
            <?php
            foreach ($results as $item_index => $item_value) {
                echo "<option value=" . $item_value['category_id'] . ">" . $item_value['name'] . "</option>";
            }
            ?>
        </select><br>

        <label for="quantity">Quantity Available:</label>
        <input type="text" name="quantity" required><br>

        <input type="submit" value="Add Product">
        <a href="../actions/add_product_action.php?skip=true">SKIP</a>
    </form>
</body>

</html>

<!-- http://localhost/Web Technologies Team Folder/GitHub/Ecommerce-WebTech-Team5/FrontendEcomXpress/views/add_product.php -->