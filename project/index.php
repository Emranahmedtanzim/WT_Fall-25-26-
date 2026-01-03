<?php
session_start();


$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html>
<head>
    <title>HomeFinder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="navbar">
        <div class="logo">
            <a href="index.php" style="color:white; text-decoration:none;">HomeFinder</a>
        </div>
        <div class="login-links">
            <a href="index.php?page=seller-login">Seller Login</a>
            <a href="index.php?page=buyer-login">Buyer Login</a>
        </div>
    </div>
</header>
