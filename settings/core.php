<?php
session_start();

function checkLogin()
{
    if (!($_SESSION['user_id'])) {
        header("Location: ../login/login_view.php");
        die();
    }
}
