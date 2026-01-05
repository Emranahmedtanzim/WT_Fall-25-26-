<?php
include "db.php";

$email = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email and password are required";
    } else {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM seller WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (!password_verify($password, $row['password'])) {
                $error = "Invalid password";
            }
            
        } else {
            $error = "Seller not found";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Login</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<div class="auth-box">
    <h2>Seller Login</h2>

    <form method="POST">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">

        <?php if ($error) echo '<span class="auth-error">'.$error.'</span>'; ?>

        <button type="submit" name="login">Login</button>
    </form>

    <p class="link-text">
        New seller? <a href="index.php?page=sellerregister">Register</a>
    </p>
</div>

</body>
</html>
