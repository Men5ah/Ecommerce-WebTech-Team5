<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category_id = $_POST["category"];

    $sql = "INSERT INTO Product (name, description, price, quantity_available, category_id, image_path)
    VALUES ('$name', '$description', $price, $quantity, $category_id, '../img/default image.jpg')";

    if ($conn->query($sql) === TRUE) {
        // Insert successful, determine redirection based on category
        switch ($category_id) {
            case 1:
                header("Location: ../categories/shop electronics.php");
                exit;
            case 2:
                header("Location: ../categories/shop fashion.php");
                exit;
            case 3:
                header("Location: ../categories/shop stationery.php");
                exit;
            case 4:
                header("Location: ../categories/shop skincare.php");
                exit;
            case 5:
                header("Location: ../categories/shop fruits and veggies.php");
                exit;
            case 6:
                header("Location: ../categories/shop hygiene.php");
                exit;
            default:
                // Handle other categories or provide a default redirection
                if ($_SESSION['role_id'] == 1)
                {
                    header("Location: ../views/sellerhome.php");
                } 
                else
                {
                    header("Location: ../views/userhome.php");
                }
                exit;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} elseif (isset($_GET["skip"]) && $_GET["skip"] == "true") {
    header("Location: ../views/home.php?No additions=true");
    exit();
} else {
    echo "POST REQUEST WAS NOT SENT";
}

// Issue