<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('checkLogin')) {
    function checkLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../views/login.php?msg=Yes");
            die();
        }
    }
}


// http://localhost/Web Technologies Team Folder/GitHub/Ecommerce-WebTech-Team5/FrontendEcomXpress/settings/core.php
