<?php
include "../FrontendEcomXpress/settings/core.php";
include "../FrontendEcomXpress/settings/connection.php";
// include "../FrontendEcomXpress/actions/login_action.php";


if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    // Your other code
} else {
    // Handle the case when the user is not logged in
    echo "User not logged in.";
}

function displayCartItems()
{

    include "../FrontendEcomXpress/settings/connection.php";
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

            echo '<tr>';
            echo '<td class="align-middle"><img src="img/product-' . $productId . '.jpg" alt="" style="width: 50px;"> ' . $productName . '</td>';
            echo '<td class="align-middle">$' . $price . '</td>';
            echo '<td class="align-middle">
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary btn-minus" data-cart-id="' . $cartId . '">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="' . $quantity . '">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary btn-plus" data-cart-id="' . $cartId . '">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </td>';
            echo '<td class="align-middle">$' . $subtotal . '</td>';
            echo '<td class="align-middle">
                    <button class="btn btn-sm btn-danger" onclick="removeFromCart(' . $cartId . ')">
                        <i class="fa fa-times"></i>
                    </button>
                </td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="5" class="text-center">No items in the cart</td></tr>';
    }

    $cartStmt->close();
}

// Example usage
// $userId = 1; // Replace with the actual user ID
// displayCartItems();
