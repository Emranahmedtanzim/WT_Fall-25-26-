<!DOCTYPE html>
<html>
<head>
    <title>Buyer Registration</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<div class="auth-box">
    <h2>Buyer Registration</h2>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <p class="link-text">
        Already have an account?
        <a href="buyerlogin.php">Login</a>
    </p>
</div>

</body>
</html>
