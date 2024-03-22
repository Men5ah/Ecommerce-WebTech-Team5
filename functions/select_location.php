<?php
include "../settings/connection.php";

function getLocations() {
    global $conn;

    $sql = "SELECT * FROM Locations";
    $result = $conn->query($sql);

    $locations = [];

    if ($result->num_rows > 0) {
        $locations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    $conn->close();

    return $locations;
}

?>
