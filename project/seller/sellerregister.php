<?php
include "db.php";

$fullname = $email = "";
$success = "";

$fullnameErr = $emailErr = $passwordErr = $confirmErr = "";

function showError($msg) {
    if ($msg != "") return '<span class="auth-error">'.$msg.'</span>';
    return "";
}

function showSuccess($msg) {
    if ($msg != "") return '<span class="auth-success">'.$msg.'</span>';
    return "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
    if (empty($_POST["fullname"])) {
        $fullnameErr = "Full name is required";
    } else {
        $fullname = test_input($_POST["fullname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
            $fullnameErr = "Only letters and white space allowed";
        }
    }

   
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!preg_match("/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]{2,}$/", $email)) {
            $emailErr = "Invalid email format (example: emran@gmail.com)";
        }
    }

    
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    }

   
    if (empty($_POST["confirm_password"])) {
        $confirmErr = "Confirm password is required";
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $confirmErr = "Password and Confirm Password do not match";
    }

    
    if (empty($fullnameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmErr)) {
        $hashPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $sql = "INSERT INTO seller (fullname, email, password)
                VALUES ('$fullname', '$email', '$hashPassword')";

        if ($conn->query($sql)) {
            $success = "Registration complete";
        }
    }
}

function test_input($data) {
    return trim($data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Seller Registration</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<div class="auth-box">
    <h2>Seller Registration</h2>

    <form method="POST" action="">

        <input type="text" name="fullname" placeholder="Full Name" value="<?php echo $fullname; ?>">
        <?php echo showError($fullnameErr); ?>

        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
        <?php echo showError($emailErr); ?>

        <input type="password" name="password" placeholder="Password">
        <?php echo showError($passwordErr); ?>

        <input type="password" name="confirm_password" placeholder="Confirm Password">
        <?php echo showError($confirmErr); ?>

        <?php echo showSuccess($success); ?>

        <button type="submit">Register</button>
    </form>

    <p class="link-text">
        <a href="index.php?page=sellerlogin">Login</a>
    </p>
</div>

</body>
</html>
