<?php
include "../settings/connection.php";

<<<<<<< HEAD
$sql = "SELECT * FROM Categories";
=======
$sql = "SELECT * FROM categories";
>>>>>>> cf0269fa4fcb7ad59311f49d900845c208b548a7
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $results;
}


$conn->close();
<<<<<<< HEAD
=======
?>
>>>>>>> cf0269fa4fcb7ad59311f49d900845c208b548a7
