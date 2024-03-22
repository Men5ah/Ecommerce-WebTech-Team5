<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// function redirectID()
// {
//     if (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 1) {
//         $currentPage = basename($_SERVER['PHP_SELF']);
//         if ($currentPage !== "add_product.php") {
//             header("Location: ../views/add_product.php");
//             die();
//         }
//     } elseif (isset($_SESSION['role_id']) && $_SESSION['role_id'] === 2) {
//         $currentPage = basename($_SERVER['PHP_SELF']);
//         if ($currentPage !== "home.php") {
//             header("Location: ../views/home.php");
//             die();
//         }
//     } else {
//         header("Location: ../views/login.php?msg=You aren't being logged in");
//         die();
//     }
// }

if (!function_exists('checkLogin')) {
    function checkLogin()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../views/login.php?msg=Yes");
            die();
        }
    }
}


// http://localhost/Web Technologies Team Folder/GitHub/Ecommerce-WebTech-Team5/settings/core.php
