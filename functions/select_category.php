<?php
include "../settings/connection.php";

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $results;
}


$conn->close();
?>
