<?php
include "../settings/core.php";
include "../settings/connection.php";
// include "../actions/login_action.php";


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    // Your other code
} else {
    // Handle the case when the user is not logged in
    echo "User not logged in.";
}

function displayCartItems()
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

    if ($cartResult->num_rows > 0) {
        while ($row = $cartResult->fetch_assoc()) {
            $cartId = $row['cart_id'];
            $productId = $row['product_id'];
            $productName = $row['product_name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $subtotal = $price * $quantity;

            // <button type="submit" class="btn btn-sm btn-primary btn-minus" name="cart_id" value="' . $cartId . '">
            // <button type="submit" class="btn btn-sm btn-primary btn-plus" name="cart_id" value="' . $cartId . '">
            echo '<tr>';
            echo '<td class="align-middle"><img src="img/product-' . $productId . '.jpg" alt="" style="width: 50px;"> ' . $productName . '</td>';
            echo '<td class="align-middle">$' . $price . '</td>';
            echo '<td class="align-middle">
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                        <form action="../actions/reduce_quantity_action.php" method="post">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-primary btn-minus" name="product_id" value="' . $productId . '">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </form>
                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="' . $quantity . '">
                        <form action="../actions/increase_quantity_action.php" method="post">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-primary btn-minus" name="product_id" value="' . $productId . '">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </td>';
            echo '<td class="align-middle">$' . $subtotal . '</td>';
            echo '<form action="../actions/delete_item_action.php" method="POST">';
            // echo '<input type="hidden" name="cart_id" value="' . $cartId . '">';
            echo '<input type="hidden" name="product_id" value="' . $productId . '">';
            echo '<td class="align-middle">
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fa fa-times"></i>
                    </button>
                  </td>';
            echo '</form>';

            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5" class="text-center">No items in the cart</td></tr>';
    }

    $cartStmt->close();
}
