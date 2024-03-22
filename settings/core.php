<?php
session_start();

function checkLogin()
{
    if (!isset($_SESSION['person_id'])) {
        header("Location: ../login/login_view.php");
        die();
    }
}
?>