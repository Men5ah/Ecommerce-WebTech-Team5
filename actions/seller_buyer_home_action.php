<?php
include "../settings/connection.php";
include "../settings/core.php";

echo $_SESSION['role_id'];
echo gettype($_SESSION['role_id']) . "<br>";

if ($_SESSION['role_id'] == 1) {
    // echo $_SESSION['role_id'];
    header("Location: ../views/sellerhome.php");
} else {
    // echo $_SESSION['role_id'];
    header("Location: ../views/userhome.php");
}
