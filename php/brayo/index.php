<?php
session_start();

include("connection.php");
include("functions.php");

$user = check_login($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container1">
        <?php if ($user): ?>
            <h1>Welcome, <?= htmlspecialchars($user['username']) ?>!</h1>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <h1>Welcome to our website!</h1>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </div>
</body>
</html>
