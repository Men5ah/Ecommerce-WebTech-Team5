<?php
$servername = 'localhost';
$username = 'root';
$password =  'cs341webtech';
$database = 'Commerce';

$conn = new mysqli($SERVER, $USERNAME, $PSSWRD, $DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
