<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity_available = $_POST["quantity"];
    $quantity_chosen = 0;
    $categoryID = $_POST["category"];
    // $imageData = $_POST["image_data"];

    // Process image upload
    $imageData = file_get_contents($_FILES["image_path"]["tmp_name"]);
    $imageData = mysqli_real_escape_string($conn, $imageData);

    $sql = "INSERT INTO Product (name, description, price, quantity_available, quantity_chosen, category_id, image_data)
    VALUES ('$name', '$description', '$price', '$quantity_available', '$quantity_chosen', '$categoryID', '$imageData')";

    if ($conn->query($sql) === TRUE) {
        switch ($categoryID) {
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
                if ($_SESSION['role_id'] == 1) {
                    header("Location: ../views/sellerhome.php");
                } else {
                    header("Location: ../views/userhome.php");
                }
                exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} elseif (isset($_GET["skip"]) && $_GET["skip"] == "true") {
    header("Location: ../views/sellerhome.php?No additions=true");
    exit();
} else {
    echo "POST REQUEST WAS NOT SENT";
}

// Issue