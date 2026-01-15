<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "db.php";


$result = $conn->query("SELECT * FROM properties ORDER BY id DESC");


if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php?page=buyerlogin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buyer Dashboard</title>
    <link rel="stylesheet" href="buyerdashboard.css">
</head>
<body>

<div class="auth-box">

    <h1>Available Properties</h1>

    <form method="post">
        <button type="submit" name="logout" class="btn-delete">Logout</button>
    </form>

    <?php if ($result && $result->num_rows > 0) { ?>
        <table>
            <tr>
                <th>Title</th>
                <th>Location</th>
                <th>Price</th>
                <th>Description</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p class="no-data">No properties available.</p>
    <?php } ?>

</div>

</body>
</html>
