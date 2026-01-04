<!DOCTYPE html>
<html>
<head>
    <title>Buyer Login</title>
    <link rel="stylesheet" href="auth.css">
</head>

<body>

<div class="auth-box">
    <h2>Buyer Login</h2>

    <form method="POST" action="">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required minlength="6">

        <button type="submit" name="login">Login</button>
    </form>

    <p class="link-text">
        New buyer?
        <a href="index.php?page=buyerregister">Register</a>
    </p>
</div>

</body>
</html>

