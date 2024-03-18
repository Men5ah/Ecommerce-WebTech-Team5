<?php
$servername = "localhost";
$username = "root";
$password =  "cs341webtech";
$database = "KRMBJ";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
