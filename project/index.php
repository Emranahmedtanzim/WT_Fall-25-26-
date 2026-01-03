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

<main>
<section class="content">
<?php
if ($page == 'buyer-login') {
    include "buyer/buyerlogin.php";
} elseif ($page == 'buyer-register') {
    include "buyer/buyerregister.php";
} elseif ($page == 'seller-login') {
    include "seller/sellerlogin.php";
} elseif ($page == 'seller-register') {
    include "seller/sellerregister.php";
} else {
    
    ?>
    <div class="hero">
        <h1>Find Your Perfect Home</h1>
        <p>
            HomeFinder helps you discover the best houses, apartments, and properties
            in your desired location. Whether you are buying, selling, or managing properties,
            we make the process simple and secure.
        </p>
        <a href="index.php?page=buyer-login" class="explore-btn">Explore Homes</a>
    </div>
    <?php
}
?>
</section>
</main>

<footer class="footer">
    <p>Your trusted partner in finding the perfect home.</p>
</footer>

</body>
</html>
