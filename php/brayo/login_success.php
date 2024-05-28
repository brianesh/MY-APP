<?php
session_start();
include("connection.php");
include("functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container3">
        <h1>Login Successful</h1>
        <p>Welcome! You have successfully logged in.</p>
        <div class="links">
            <a href="dashboard.php">Go to Dashboard</a>
        </div>
    </div>
</body>
</html>
