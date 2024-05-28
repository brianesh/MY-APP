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
    <title>Login Failed</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container3">
        <h1>Login Failed</h1>
        <p>Invalid username or password. Please try again.</p>
        <div class="links">
            <a href="index.php">Back to Login</a>
        </div>
    </div>
</body>
</html>
