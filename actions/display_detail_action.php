<?php
include "../settings/core.php";
include "../settings/connection.php";

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    function displayDetailItems()
    {
        include "../settings/connection.php";
        $userId = $_SESSION['user_id'];

        $cartQuery = "SELECT c.cart_id, p.product_id, p.name AS product_name, p.price, c.quantity
                      FROM Carts c
                      INNER JOIN Product p ON c.product_id = p.product_id
                      WHERE c.user_id = ?";

        $cartStmt = $conn->prepare($cartQuery);
        $cartStmt->bind_param("i", $userId);
        $cartStmt->execute();
        $cartResult = $cartStmt->get_result();

        if ($cartResult->num_rows >= 0) {
            while ($row = $cartResult->fetch_assoc()) {
                $cartId = $row['cart_id'];
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $subtotal = $price * $quantity;
                $condition = "Return to the details page";

                echo '<div class="input-group quantity mr-3" style="width: 130px;">';
                echo '<div class="input-group-btn">';
                echo '<form action="../actions/reduce_quantity_action.php" method="post">';
                echo '<input type="hidden" name="condition" value="' . $condition . '">';
                echo '<button class="btn btn-primary btn-minus" type="submit" name="product_id" value="' . $productId . '">';
                echo '<i class="fa fa-minus"></i>';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '<input type="text" class="form-control bg-secondary border-0 text-center" value="' . $quantity . '">';
                echo '<div class="input-group-btn">';
                echo '<form action="../actions/increase_quantity_action.php" method="post">';
                echo '<input type="hidden" name="condition" value="' . $condition . '">';
                echo '<button class="btn btn-primary btn-plus" type="submit" name="product_id" value="' . $productId . '">';
                echo '<i class="fa fa-plus"></i>';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '<div>';
                echo '-----------------------------';
                echo '</div>';
                echo '<form action="../actions/cart_action.php" method="post">';
                echo '<input type="hidden" name="product_id" value="' . $productId . '">';
                echo '<input type="hidden" name="condition" value="' . $quantity . '">'; // Assuming you need this input for the backend
                echo '<button class="btn btn-primary px-3" type="submit"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>';
                echo '</form>';
                echo '</div>';
            
            }
        } else {
            echo '<tr><td colspan="5" class="text-center">No items in the cart</td></tr>';
        }

        $cartStmt->close();
    }

} else {
    echo "User not logged in.";
}
?>
