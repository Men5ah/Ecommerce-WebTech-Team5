<?php
include "../settings/connection.php";

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];

    $sql = "SELECT p.*, c.name as category_name FROM Product p
            INNER JOIN Categories c ON p.category_id = c.category_id
            WHERE p.name LIKE ?";
    $stmt = $conn->prepare($sql);

    // '%' has been added around the search query for a partial match
    $searchParam = '%' . $searchQuery . '%';
    $stmt->bind_param("s", $searchParam);

    $stmt->execute();

    $result = $stmt->get_result();

    // Display the search results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<p>' . $row['name'] . '</p>';
            // Redirect the user to the category page
            header("Location: ../categories/shop {$row['category_name']}.php");
            exit();
        }
    } else {
        echo 'No results found.';
    }

    $stmt->close();
} else {
    echo 'Please enter a search query.';
}

$conn->close();
