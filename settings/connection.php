<?php
// $SERVER = 'localhost';
// $USERNAME = 'root';
// $PSSWRD =  'cs341webtech';
// $DATABASE = 'Commerce';
$SERVER = 'localhost';
$USERNAME = 'root';
$PSSWRD =  '';
$DATABASE = 'Commerce';
$conn = new mysqli($SERVER, $USERNAME, $PSSWRD, $DATABASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
