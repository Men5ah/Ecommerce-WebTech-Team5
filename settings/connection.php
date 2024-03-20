<?php

$SERVER = "localhost";
$USERNAME = "root";
$PSSWRD = "";
$DATABASE = "commerce";

$conn = new mysqli($SERVER, $USERNAME, $PSSWRD, $DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
